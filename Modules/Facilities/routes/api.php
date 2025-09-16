<?php

use Illuminate\Support\Facades\Route;
use Modules\Facilities\Http\Controllers\User\UserController;
 use Modules\Facilities\Http\Controllers\FacilitiesController;

Route::prefix('v1')->group(function () {
    Route::apiResource('users', UserController::class)->names('user');
      Route::apiResource('facilities', FacilitiesController::class)->names('facilities');
});
