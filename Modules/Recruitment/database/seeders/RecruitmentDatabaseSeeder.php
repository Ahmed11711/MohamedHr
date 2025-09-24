<?php

namespace Modules\Recruitment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Recruitment\Database\Seeders\RecruitmentAttachment\RecruitmentAttachmentSeeder;

class RecruitmentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(Ahmed\AhmedSeeder::class);
         $this->call([
            RecruitmentAttachmentSeeder::class,
            InfoSeeder::class,
            ColumnsSeeder::class,

]);
    }
}
