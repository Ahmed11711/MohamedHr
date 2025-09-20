<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'Facilities',
            'title' => '{"en":"Facilities","ar":"مرافق"}',
            'desc' => '{"en":"Description for Facilities","ar":"وصف للمرافق"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'User',
            'title' => '{"en":"User","ar":"مستخدم"}',
            'desc' => '{"en":"Description for User","ar":"وصف للمستخدم"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Facilities')->insert([
            [
            'infoable_type' => 'Owner',
            'title' => '{"en":"Owner","ar":"مالك"}',
            'desc' => '{"en":"Description for Owner","ar":"وصف للمالك"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}