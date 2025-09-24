<?php

namespace Modules\Recruitment\Database\Seeders;

use Illuminate\Database\Seeder;
 use Modules\Recruitment\Models\InfoRecruitment;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'infoable_type' => 'Ahmed',
                'title' => ['en' => 'Ahmed', 'ar' => 'أحمد'],
                'desc'  => ['en' => 'Description for Ahmed', 'ar' => 'وصف أحمد'],
            ],
        ];

        foreach ($records as $record) {
            InfoRecruitment::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}
