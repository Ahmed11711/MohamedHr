<?php

use Illuminate\Support\Facades\Route;
use Modules\AttendanceTracking\Http\Controllers\Test\TestController;

Route::prefix('v1')->group(function () {
     Route::apiResource('tests', TestController::class)->names('test');
});
