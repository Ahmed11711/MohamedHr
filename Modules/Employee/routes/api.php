<?php

use Illuminate\Support\Facades\Route;
use Modules\Employee\Http\Controllers\Employeeinfo\EmployeeinfoController;
use Modules\Employee\Http\Controllers\EmployeeController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('employeeinfos', EmployeeinfoController::class)->names('employeeinfo');
    Route::apiResource('employees', EmployeeController::class)->names('employee');
});
