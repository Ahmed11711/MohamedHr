<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Auth\Login\LoginController;
use Modules\Auth\Http\Controllers\Auth\Register\RegisterController;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\Verification\VerificationController;

Route::prefix('v1/Auth')->group(function () {
    Route::apiResource('auths', AuthController::class)->names('auth');
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('register/confirm-verification', [VerificationController::class, 'confirmVerification']);
    Route::post('resend-code', [VerificationController::class, 'resendVerificationCode']);
    Route::post('send-code', [VerificationController::class, 'sendVerificationCode']);

    ////// Login Route
    Route::post('login', [LoginController::class, 'login']);
});

