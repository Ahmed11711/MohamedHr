<?php

namespace Modules\Training\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\InfoPerformance;
use Modules\Training\Models\InfoTraining;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records =[

        ];

        foreach ($records as $record) {
            InfoTraining::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}
