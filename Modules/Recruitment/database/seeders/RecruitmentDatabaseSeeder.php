<?php

namespace Modules\Recruitment\Database\Seeders;

use Illuminate\Database\Seeder;

class RecruitmentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CandidateSkill\CandidateSkillSeeder::class);
        $this->call(ApplicationPreviousExperience\ApplicationPreviousExperienceSeeder::class);
        $this->call(JobOffer\JobOfferSeeder::class);
        $this->call(EmployeeReferral\EmployeeReferralSeeder::class);
        $this->call(Onboarding\OnboardingSeeder::class);
        $this->call(Interview\InterviewSeeder::class);
        $this->call(Application\ApplicationSeeder::class);
        $this->call(JobVacancy\JobVacancySeeder::class);
        // $this->call([]);
    }
}
