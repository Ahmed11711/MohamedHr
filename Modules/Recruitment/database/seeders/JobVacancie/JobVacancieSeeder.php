<?php

namespace Modules\Recruitment\Database\Seeders\JobVacancie;

use Illuminate\Database\Seeder;
use Modules\Recruitment\Models\JobVacancie;
use Modules\Recruitment\Models\JobVacancieSkill;

class JobVacancieSeeder extends Seeder
{
    public function run(): void
    {
        $job_vacancies = [
            [
                'job_title' => 'Backend Developer',
                'department_id' => 1,
                'required_skills' => 'PHP, Laravel, MySQL',
                'qualification_id' => 1,
                'expected_salary' => 12000.00,
                'posting_date' => now(),
                'closing_date' => now()->addMonth(),
                'job_status' => 'open',
                'job_source' => 'LinkedIn',
                'job_type' => 'full-time',
                'work_location_id' => 1,
                'number_of_vacancies' => 2,
                'hiring_manager_id' => 1,
                'experience_level' => 'Mid-Level',
                'job_description' => 'We are looking for a skilled Backend Developer with Laravel experience.',
                'skills' => [
                    ['skill' => 'PHP', 'proficiency_level' => 'expert'],
                    ['skill' => 'Laravel', 'proficiency_level' => 'expert'],
                    ['skill' => 'MySQL', 'proficiency_level' => 'intermediate'],
                ],
            ],
   
        ];

        foreach ($job_vacancies as $data) {
            $skills = $data['skills'] ?? [];
            unset($data['skills']);

            $job = JobVacancie::firstOrCreate(
                ['job_title' => $data['job_title']],
                $data
            );

            foreach ($skills as $skillData) {
                JobVacancieSkill::firstOrCreate([
                    'job_vacancie_id' => $job->id,
                    'skill' => $skillData['skill'],
                    'proficiency_level' => $skillData['proficiency_level'],
                ]);
            }
        }
    }
}
