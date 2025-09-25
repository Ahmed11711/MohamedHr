<?php

namespace Modules\AttendanceTracking\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns = [
        'ShiftSchedule' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['shift_type', 'Shift_type', 'Shift Type', 'نوع التحول'],
            ['shift_date', 'Shift_date', 'Shift Date', 'تاريخ التحول'],
            ['start_time', 'start_time', 'Start Time', 'وقت البدء'],
            ['end_time', 'end_time', 'End Time', 'وقت الانتهاء']
        ],

        'LeaveBalance' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachment', 'مرفق', 'Attachment', 'مرفق'],
            ['holidaysList', 'العطلات', 'Holidayslist', 'العطلات'],
            ['available_balance', 'Available_Balance', 'Available Balance', 'التوازن المتاح'],
            ['used_balance', 'use_balance', 'Used Balance', 'التوازن المستخدم'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور']
        ],

        'LeaveRequest' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachment', 'مرفق', 'Attachment', 'مرفق'],
            ['holidaysList', 'العطلات', 'Holidayslist', 'العطلات'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['request_status', 'request_status', 'Request Status', 'طلب الحالة']
        ],

        'AttendanceTracking' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachment', 'مرفق', 'Attachment', 'مرفق'],
            ['attendance_date', 'الحضور', 'Attendance Date', 'تاريخ الحضور'],
            ['attendance_type', 'الحضور', 'Attendance Type', 'نوع الحضور'],
            ['check_in_time', 'check_in_time', 'Check In Time', 'تحقق في الوقت'],
            ['check_out_time', 'check_out_time', 'Check Out Time', 'تحقق من الوقت'],
            ['overtime_hours', 'العمل الإضافي', 'Overtime Hours', 'ساعات العمل الإضافي'],
            ['working_hours', 'works_hours', 'Working Hours', 'ساعات العمل']
        ],


        ];

        foreach ($columns as $model => $fields) {
            foreach ($fields as $field) {
                DB::table('columns_attendance_trackings')->insert([
                    'model' => $model,
                    'key' => json_encode(['en' => $field[0], 'ar' => $field[1]], JSON_UNESCAPED_UNICODE),
                    'label' => json_encode(['en' => $field[2], 'ar' => $field[3]], JSON_UNESCAPED_UNICODE),
                    'sortable' => true,
                    'filterable' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
