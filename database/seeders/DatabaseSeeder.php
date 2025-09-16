<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\CmsErp\Database\Seeders\CmsErpDatabaseSeeder;
use Modules\Facilities\Database\Seeders\FacilitiesDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     $this->call([
        CmsErpDatabaseSeeder::class,
        FacilitiesDatabaseSeeder::class,

     ]);

    }
}
