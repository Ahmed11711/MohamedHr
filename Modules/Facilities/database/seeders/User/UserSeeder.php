<?php

namespace Modules\Facilities\Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate([
                'userName' => 'Sample userName 1',
                'email' => 'user1@example.com',
                'fullName' => 'Sample fullName 1',
                'password' => bcrypt('password123'),
                'mobileNumber' => '010100001',
                'securityQuestion_id' => '1',
                'security_answer' => 'Sample security_answer 1',
                'gender' => 'Female',
                'nationality_id' => '1',
                'language_id' => '1',
                'termsAccepted' => true,
        ]);

        User::firstOrCreate([
                'userName' => 'Sample userName 2',
                'email' => 'user2@example.com',
                'fullName' => 'Sample fullName 2',
                'password' => bcrypt('password123'),
                'mobileNumber' => '010100002',
                'securityQuestion_id' => '2',
                'security_answer' => 'Sample security_answer 2',
                'gender' => 'Male',
                'nationality_id' => '2',
                'language_id' => '2',
                'termsAccepted' => true,
        ]);




    }
}
