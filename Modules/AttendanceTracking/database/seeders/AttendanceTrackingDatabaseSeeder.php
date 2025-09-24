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
        $this->call(Test\TestSeeder::class);
          $this->call([
             ColumnsSeeder::class,
            InfoSeeder::class,
            AttendanceTrackingAttachmentSeeder::class

         ]);
    }
}
