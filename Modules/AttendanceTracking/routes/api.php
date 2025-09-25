<?php

use Illuminate\Support\Facades\Route;
use Modules\AttendanceTracking\Http\Controllers\ShiftSchedule\ShiftScheduleController;
use Modules\AttendanceTracking\Http\Controllers\LeaveBalance\LeaveBalanceController;
use Modules\AttendanceTracking\Http\Controllers\LeaveRequest\LeaveRequestController;
use Modules\AttendanceTracking\Http\Controllers\AttendanceTracking\AttendanceTrackingController;

Route::prefix('v1')->group(function () {
     Route::apiResource('attendance_trackings', AttendanceTrackingController::class)->names('attendance_tracking');
    Route::apiResource('leave_requests', LeaveRequestController::class)->names('leave_request');
    Route::apiResource('leave_balances', LeaveBalanceController::class)->names('leave_balance');
    Route::apiResource('shift_schedules', ShiftScheduleController::class)->names('shift_schedule');
});
