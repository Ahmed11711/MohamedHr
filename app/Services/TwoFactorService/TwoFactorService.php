<?php

namespace App\Services\TwoFactorService;

use App\Models\UserTwoFactor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Modules\Auth\Repositories\UserTwoFactor\UserTwoFactorRepositoryInterface;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorService
{
    protected Google2FA $google2fa;

    public function __construct(protected UserTwoFactorRepositoryInterface $userTwoFactorRepository)
    {
        $this->google2fa = new Google2FA();
    }

    public function generateAllFactors(int $userId, int $ttlMinutes = 5): array
    {
        $otpEmail = random_int(100000, 999999);
        $otpSms   = random_int(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes($ttlMinutes);
        $secret = $this->google2fa->generateSecretKey();


        $now = now();

        $records = [
            [
                'user_id'        => $userId,
                'method'         => 'email',
                'otp_code'       => bcrypt((string)$otpEmail),
                'otp_expires_at' => $expiresAt,
                'secret'         => null,
                'is_verified'    => false,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'user_id'        => $userId,
                'method'         => 'sms',
                'otp_code'       => bcrypt((string)$otpSms),
                'otp_expires_at' => $expiresAt,
                'secret'         => null,
                'is_verified'    => false,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'user_id'        => $userId,
                'method'         => 'app',
                'otp_code'       => null,
                'otp_expires_at' => null,
                'secret'         => $secret,
                'is_verified'    => false,
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
        ];

        UserTwoFactor::insert($records);

        return [
            'email_otp'  => $otpEmail,
            'sms_otp'    => $otpSms,
            'app_secret' => $secret,
        ];
    }


    public function resendCode(int $userId, string $method, int $ttlMinutes = 5, $type='resend'): array
    {
        $record = $this->userTwoFactorRepository->getByUserAndMethod($userId, $method);

        if (!$record) {
            return [
                'success' => false,
                'message' => 'No verification record found.'
            ];
        }

        if ($record->is_verified && $type=='resend') {
            return [
                'success' => false,
                'message' => 'This method is already verified.'
            ];
        }

        if ($method === 'email' || $method === 'sms') {
            $otp = random_int(100000, 999999);
            $record->update([
                'otp_code' => bcrypt((string)$otp),
                'otp_expires_at' => now()->addMinutes($ttlMinutes),
                'is_verified' => false,
            ]);

            return [
                'success' => true,
                'otp' => (string)$otp,
                'message' => 'Verification code resent successfully.'
            ];
        }

        return [
            'success' => false,
            'message' => 'Invalid method for resending code.'
        ];
    }


   
}
