<?php

namespace Modules\AttendanceTracking\Database\Seeders\Test;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\Test;

class TestSeeder extends Seeder
{
    public function run(): void
    {
        $tests = [
            [
                'employee_id' => 1,
                'test' => 'Sample test 1',
                'key' => 430,
                'status' => 'Sample status 1',
                'attendance_attachments_id' => 1,
            ],
            [
                'employee_id' => 1,
                'test' => 'Sample test 2',
                'key' => 579,
                'status' => 'Sample status 2',
                'attendance_attachments_id' => 3,
            ],
            [
                'employee_id' => 1,
                'test' => 'Sample test 3',
                'key' => 372,
                'status' => 'Sample status 3',
                'attendance_attachments_id' => 2,
            ],
            [
                'employee_id' => 1,
                'test' => 'Sample test 4',
                'key' => 813,
                'status' => 'Sample status 4',
                'attendance_attachments_id' => 2,
            ],
            [
                'employee_id' => 2,
                'test' => 'Sample test 5',
                'key' => 896,
                'status' => 'Sample status 5',
                'attendance_attachments_id' => 3,
            ],
        ];

        foreach ($tests as $data) {
            Test::firstOrCreate($data);
        }
    }
}
