<?php

use Illuminate\Support\Facades\Route;
use Modules\CmsErp\Http\Controllers\CmsErpController;

Route::prefix('v1')->group(function () {
    Route::apiResource('cmserps', CmsErpController::class)->names('cmserp');
});
