<?php

namespace Modules\AttendanceTracking\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\InfoAttendanceTracking;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'infoable_type' => 'ShiftSchedule',
                'title' => ['en' => 'Shiftschedule', 'ar' => 'التحولات'],
                'desc'  => ['en' => 'Description for Shiftschedule', 'ar' => 'الوصف لطرح التحول'],
            ],            [
                'infoable_type' => 'LeaveBalance',
                'title' => ['en' => 'Leavebalance', 'ar' => 'تركية'],
                'desc'  => ['en' => 'Description for Leavebalance', 'ar' => 'وصف لليغ'],
            ],            [
                'infoable_type' => 'LeaveRequest',
                'title' => ['en' => 'Leaverequest', 'ar' => 'leaverequest'],
                'desc'  => ['en' => 'Description for Leaverequest', 'ar' => 'الوصف لـ leaverequest'],
            ],            [
                'infoable_type' => 'AttendanceTracking',
                'title' => ['en' => 'Attendancetracking', 'ar' => 'تتبع الحضور'],
                'desc'  => ['en' => 'Description for Attendancetracking', 'ar' => 'وصف لتتبع الحضور'],
            ],
        ];

        foreach ($records as $record) {
            InfoAttendanceTracking::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}
