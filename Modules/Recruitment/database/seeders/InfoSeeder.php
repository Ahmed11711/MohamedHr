<?php

namespace Modules\Recruitment\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'JobVacancy',
            'title' => '{"en":"Jobvacancy","ar":"الوظيفة الشاغرة"}',
            'desc' => '{"en":"Description for Jobvacancy","ar":"وصف الوظيفة الشاغرة"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'Application',
            'title' => '{"en":"Application","ar":"طلب"}',
            'desc' => '{"en":"Description for Application","ar":"وصف للتطبيق"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'Interview',
            'title' => '{"en":"Interview","ar":"مقابلة"}',
            'desc' => '{"en":"Description for Interview","ar":"وصف للمقابلة"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'Onboarding',
            'title' => '{"en":"Onboarding","ar":"على متن الطائرة"}',
            'desc' => '{"en":"Description for Onboarding","ar":"وصف على متن الطائرة"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'EmployeeReferral',
            'title' => '{"en":"Employeereferral","ar":"إحالة الموظف"}',
            'desc' => '{"en":"Description for Employeereferral","ar":"وصف لإحالة الموظف"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'RecruitmentAgency',
            'title' => '{"en":"Recruitmentagency","ar":"وكالة التوظيف"}',
            'desc' => '{"en":"Description for Recruitmentagency","ar":"وصف وكالة التوظيف"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'JobOffer',
            'title' => '{"en":"Joboffer","ar":"عرض العمل"}',
            'desc' => '{"en":"Description for Joboffer","ar":"وصف عرض الوظيفة"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'EmploymentContract',
            'title' => '{"en":"Employmentcontract","ar":"عقد التوظيف"}',
            'desc' => '{"en":"Description for Employmentcontract","ar":"وصف لعقد التوظيف"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'JobVacancySkill',
            'title' => '{"en":"Jobvacancyskill","ar":"JobVacancyskill"}',
            'desc' => '{"en":"Description for Jobvacancyskill","ar":"وصف لمهارة الوظائف الشاغرة"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'JobVacancyLanguage',
            'title' => '{"en":"Jobvacancylanguage","ar":"JobVacancyLanguage"}',
            'desc' => '{"en":"Description for Jobvacancylanguage","ar":"وصف لغة الوظائف الشاغرة"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'JobVacancyAttachment',
            'title' => '{"en":"Jobvacancyattachment","ar":"مرفق الوظائف الشاغرة"}',
            'desc' => '{"en":"Description for Jobvacancyattachment","ar":"وصف لمرفق الوظائف الشاغرة"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'ApplicationPreviousExperience',
            'title' => '{"en":"Applicationpreviousexperience","ar":"تطبيق الخبرة السابقة"}',
            'desc' => '{"en":"Description for Applicationpreviousexperience","ar":"وصف للتطبيق الخبرة السابقة"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'InterviewAttachment',
            'title' => '{"en":"Interviewattachment","ar":"مرفق المقابلة"}',
            'desc' => '{"en":"Description for Interviewattachment","ar":"وصف لمرفق المقابلة"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'CandidateAttachment',
            'title' => '{"en":"Candidateattachment","ar":"مرفق المرشح"}',
            'desc' => '{"en":"Description for Candidateattachment","ar":"وصف لمرفق المرشح"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
            DB::table('info_Recruitment')->insert([
            [
            'infoable_type' => 'CandidateSkill',
            'title' => '{"en":"Candidateskill","ar":"المرشحين"}',
            'desc' => '{"en":"Description for Candidateskill","ar":"وصف للمرشحين"}',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}