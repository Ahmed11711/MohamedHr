<?php

namespace Modules\Auth\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Http\Requests\Auth\Login\LoginRequest;
 use Modules\Auth\Repositories\Auth\AuthRepositoryInterface;
use Modules\Auth\Transformers\Auth\LoginResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    use ApiResponseTrait;
    public function __construct(protected AuthRepositoryInterface $authRepository)
    {
    }
    public function login(LoginRequest $request)
    {
         $data=$request->validated();
         $field = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'userName';   
         $user =$this->authRepository->getByFiled($field,$data['login']);

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return $this->errorResponse('The provided credentials are incorrect.', 401);
         }

        $token = JWTAuth::fromUser($user);
        $user->token = $token;
        return $this->successResponse( new LoginResource($user), 'Login successfully');

    }
}