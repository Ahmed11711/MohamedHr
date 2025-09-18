<?php

use Illuminate\Support\Facades\Route;
use Modules\Facilities\Http\Controllers\Facilities\FacilitiesController;
use Modules\Facilities\Http\Controllers\Fatama\FatamaController;
use Modules\Facilities\Http\Controllers\User\UserController;

Route::prefix('v1')->group(function () {
    Route::apiResource('facilities', FacilitiesController::class)->names('facilities');
     Route::apiResource('users', UserController::class)->names('user');
});
