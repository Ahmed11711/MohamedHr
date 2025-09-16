<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;

class CmsErpDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(BloodType\BloodTypeSeeder::class);
        $this->call(Allowance\AllowanceSeeder::class);
        $this->call(SecurityQuestions\SecurityQuestionsSeeder::class);
        // $this->call([]);
    }
}
