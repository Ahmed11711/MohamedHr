<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;

class FacilitiesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(User\UserSeeder::class);
        // $this->call([]);
    }
}
