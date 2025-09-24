<?php

namespace Modules\AttendanceTracking\Database\Seeders\AttendanceTrackingAttachment;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\AttendanceTrackinAttachment;

class AttendanceTrackingAttachmentSeeder extends Seeder
{
    public function run(): void
    {
        $attachments = [
            ['file' => 'Sample file 1', 'reference_number' => '123'],
            ['file' => 'Sample file 2', 'reference_number' => '123'],
            ['file' => 'Sample file 3', 'reference_number' => '123'],
            ['file' => 'Sample file 4', 'reference_number' => '123'],
            ['file' => 'Sample file 5', 'reference_number' => '123'],
        ];

        foreach ($attachments as $attachment) {
            AttendanceTrackinAttachment::firstOrCreate($attachment);
        }
    }
}
