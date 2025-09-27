<?php

namespace Modules\Recruitment\Database\Seeders\Ahmed;

use Illuminate\Database\Seeder;
use Modules\Recruitment\Models\Ahmed;

class AhmedSeeder extends Seeder
{
    public function run(): void
    {
        $ahmeds = [
            [
                'employee_id' => 1,
                'test' => 'Sample test 1',
                'key' => 865,
                'status' => 'Sample status 1',
                'recruitment_attachments_id' => 1,
            ],
            [
                'employee_id' => 2,
                'test' => 'Sample test 2',
                'key' => 512,
                'status' => 'Sample status 2',
                'recruitment_attachments_id' => 2,
            ],
            [
                'employee_id' => 2,
                'test' => 'Sample test 3',
                'key' => 772,
                'status' => 'Sample status 3',
                'recruitment_attachments_id' => 2,
            ],
            [
                'employee_id' => 2,
                'test' => 'Sample test 4',
                'key' => 298,
                'status' => 'Sample status 4',
                'recruitment_attachments_id' => 2,
            ],
            [
                'employee_id' => 1,
                'test' => 'Sample test 5',
                'key' => 823,
                'status' => 'Sample status 5',
                'recruitment_attachments_id' => 1,
            ],
        ];

        foreach ($ahmeds as $data) {
            Ahmed::firstOrCreate($data);
        }
    }
}
