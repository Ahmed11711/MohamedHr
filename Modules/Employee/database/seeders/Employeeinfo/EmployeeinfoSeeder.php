<?php

namespace Modules\Employee\Database\Seeders\Employeeinfo;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\Employeeinfo;
use Faker\Factory as Faker;

class EmployeeinfoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        Employeeinfo::create([
            'facility_id'       => 1,
            'saudi_national'    => 1,
            'firstName'         => ['en' => 'Ahmed', 'ar' => 'أحمد'],
            'secondName'        => ['en' => 'Samir', 'ar' => 'سمير'],
            'thirdName'         => ['en' => 'Ali', 'ar' => 'علي'],
            'lastName'          => ['en' => 'Hassan', 'ar' => 'حسن'],
            'dob'               => '1995-09-22',
            'country_id'        => 1,
            'national_id'       => $faker->unique()->numerify('##########'),
            'ex_national_id'    => '2030-01-01',
            'marital_status_id' => 1,
            'gender'            => 'male',
            'professional_email'=> $faker->unique()->safeEmail,
            'personal_email'    => $faker->unique()->safeEmail,
            'nationality_id'    => 1,
            'religion_id'       => 1,
            'passport_number'   => $faker->unique()->bothify('A#######'),
            'passport_type'     => 'regular',
            'issuance_location' => 'Cairo',
            'passport_expiry_date' => '2030-12-31',
            'personal_photo'    => 'photos/' . $faker->word . '.png',
            'last_date_update_personal_photo' => now(),
            'attachment'        => 'files/' . $faker->word . '.pdf',
        ]);
    }
}
