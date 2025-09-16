<?php

namespace Modules\Facilities\Database\Seeders\User;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\User;

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
                'termsAccepted' => 'Sample termsAccepted 1',
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
                'termsAccepted' => 'Sample termsAccepted 2',
        ]);

        User::firstOrCreate([
                'userName' => 'Sample userName 3',
                'email' => 'user3@example.com',
                'fullName' => 'Sample fullName 3',
                'password' => bcrypt('password123'),
                'mobileNumber' => '010100003',
                'securityQuestion_id' => '3',
                'security_answer' => 'Sample security_answer 3',
                'gender' => 'Female',
                'nationality_id' => '3',
                'language_id' => '3',
                'termsAccepted' => 'Sample termsAccepted 3',
        ]);

        User::firstOrCreate([
                'userName' => 'Sample userName 4',
                'email' => 'user4@example.com',
                'fullName' => 'Sample fullName 4',
                'password' => bcrypt('password123'),
                'mobileNumber' => '010100004',
                'securityQuestion_id' => '4',
                'security_answer' => 'Sample security_answer 4',
                'gender' => 'Male',
                'nationality_id' => '4',
                'language_id' => '4',
                'termsAccepted' => 'Sample termsAccepted 4',
        ]);

        User::firstOrCreate([
                'userName' => 'Sample userName 5',
                'email' => 'user5@example.com',
                'fullName' => 'Sample fullName 5',
                'password' => bcrypt('password123'),
                'mobileNumber' => '010100005',
                'securityQuestion_id' => '5',
                'security_answer' => 'Sample security_answer 5',
                'gender' => 'Female',
                'nationality_id' => '5',
                'language_id' => '5',
                'termsAccepted' => 'Sample termsAccepted 5',
        ]);

    }
}
