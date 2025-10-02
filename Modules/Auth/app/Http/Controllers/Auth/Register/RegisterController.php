<?php

namespace Modules\Auth\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Services\TwoFactorService\TwoFactorService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\Auth\Register\RegisterRequest;
 use Modules\Auth\Repositories\Auth\AuthRepositoryInterface;
use Modules\Auth\Transformers\Auth\RegisterResource;
  class RegisterController extends Controller
{
    use ApiResponseTrait;
     public function __construct(protected AuthRepositoryInterface $authRepository,
     protected TwoFactorService $twoFactorService,
      )
    {
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user= $this->authRepository->create($data);
        $sendTwoFactorCode=$this->twoFactorService->generateAllFactors($user->id);
        $user->two_factor = $sendTwoFactorCode;
        return $this->successData(new RegisterResource($user), 'User registered successfully', 201);
    }

    




}