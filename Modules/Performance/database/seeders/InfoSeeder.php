<?php

namespace Modules\Performance\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\InfoPerformance;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records =[
            [
                'infoable_type' => 'Goal',
                'title' => ['en' => 'Goal', 'ar' => 'هدف'],
                'desc'  => ['en' => 'Description for Goal', 'ar' => 'وصف للهدف'],
            ],                [
                'infoable_type' => 'goals',
                'title' => ['en' => 'goals', 'ar' => 'goals'],
                'desc'  => ['en' => 'Description for goals', 'ar' => 'وصف goals للكشوف المرتبات'],
            ],
        ];

        foreach ($records as $record) {
            InfoPerformance::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}
