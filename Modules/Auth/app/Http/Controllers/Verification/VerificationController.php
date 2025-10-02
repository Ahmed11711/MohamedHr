<?php

namespace Modules\Auth\Http\Controllers\Verification;

use App\Http\Controllers\Controller;
use App\Models\UserTwoFactor;
use App\Services\TwoFactorService\TwoFactorService;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Http\Requests\Auth\Verification\VerificationRequest;
use Modules\Auth\Http\Requests\Auth\Verification\ResendCodeRequest;
use Modules\Auth\Repositories\Auth\AuthRepositoryInterface;
use Modules\Auth\Repositories\UserTwoFactor\UserTwoFactorRepositoryInterface;
use PragmaRX\Google2FA\Google2FA;

class VerificationController extends Controller
{
    use ApiResponseTrait;
    public function __construct(
        protected AuthRepositoryInterface $userRepository,
        protected TwoFactorService $twoFactorService,
        protected UserTwoFactorRepositoryInterface $userTwoFactorRepository
    ) {}
    public function confirmVerification(VerificationRequest $request)
    {
        $data = $request->validated();
        $record = $this->userTwoFactorRepository->getForVerification($data['user_id'], $data['method']);

        if (! $record) {
            return $this->errorResponse('No verification record found', 404);
        }

        $response = $this->handelCaseVerification($record, $data['code']);

        if ($record->is_verified) {
            $this->markUserAsVerifiedIfAllMethodsDone($data['user_id']);
        }

        return $response;
    }


    public function handelCaseVerification($record, $value)
    {
        if ($record->method === 'email' || $record->method === 'sms') {
            return $this->verifyOtp($record, $value);
        } elseif ($record->method === 'app') {
            return $this->verifyAppCode($record, $value);
        } else {
            return $this->errorResponse('Invalid verification method', 422);
        }
    }

    /**
     * Verify Email/SMS OTP.
     */
    private function verifyOtp(UserTwoFactor $record, string $value)
    {
        if (!Hash::check($value, $record->otp_code)) {
            return $this->errorResponse('Invalid OTP', 422);
        }

        if (Carbon::parse($record->otp_expires_at)->isPast()) {
            return $this->errorResponse('OTP expired', 422);
        }

        $record->update(['is_verified' => true]);

        return $this->successResponse('OTP verified successfully');
    }

    /**
     * Verify Authenticator App code.
     */
    private function verifyAppCode(UserTwoFactor $record, string $value)
    {
        $google2fa = new Google2FA();

        $isValid = $google2fa->verifyKey($record->secret, $value, 2);

        if (! $isValid) {
            return $this->errorResponse('Invalid authenticator code', 422);
        }

        $record->update(['is_verified' => true]);

        return $this->successResponse('Authenticator app verified successfully');
    }

    protected function markUserAsVerifiedIfAllMethodsDone($user_id)
    {


        $allVerified = $this->userTwoFactorRepository->checkAllMethodsVerified($user_id);
        if ($allVerified) {
            $this->userRepository->verifyAccount($user_id);
        }
    }

    //////////////////////////////////////////////////////////////////
    //                      resend code
    //////////////////////////////////////////////////////////////////

    public function resendVerificationCode(ResendCodeRequest $request)
    {
        $data = $request->validated();


        $resend = $this->twoFactorService->resendCode($data['user_id'], $data['method']);

        if (!$resend['success']) {
            return $this->errorResponse($resend['message'], 422);
        }

        return $this->successData(['otp' => $resend['otp']], $resend['message']);
    }

    public function sendVerificationCode(ResendCodeRequest $request)
    {
        $data = $request->validated();

        $resend = $this->twoFactorService->resendCode($data['user_id'], $data['method'], 5, 'send');

        if (!$resend['success']) {
            return $this->errorResponse($resend['message'], 422);
        }

        return $this->successData(['otp' => $resend['otp']], $resend['message']);
    }
}
