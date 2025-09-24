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
                'infoable_type' => 'Test',
                'title' => ['en' => 'Test', 'ar' => 'امتحان'],
                'desc'  => ['en' => 'Description for Test', 'ar' => 'وصف للاختبار'],
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