<?php

namespace Modules\Performance\Database\Seeders;

use Illuminate\Database\Seeder;

class PerformanceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(Goal\GoalSeeder::class);
        $this->call([
            InfoSeeder::class,
            ColumnsSeeder::class,
        ]);
    }
}
