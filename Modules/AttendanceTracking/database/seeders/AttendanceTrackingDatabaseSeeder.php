<?php

namespace Modules\AttendanceTracking\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Database\Seeders\AttendanceTrackingAttachment\AttendanceTrackingAttachmentSeeder;

class AttendanceTrackingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(ShiftSchedule\ShiftScheduleSeeder::class);
        $this->call(LeaveBalance\LeaveBalanceSeeder::class);
        $this->call(LeaveRequest\LeaveRequestSeeder::class);
        $this->call(AttendanceTracking\AttendanceTrackingSeeder::class);
           $this->call([
             ColumnsSeeder::class,
            InfoSeeder::class,
            AttendanceTrackingAttachmentSeeder::class

         ]);
    }
}
