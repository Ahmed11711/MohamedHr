<?php

namespace Modules\Recruitment\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('columns_facilities')->insert(
            [
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'job_title',
  'ar' => 'مسمى وظيفي',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Job Title',
  'ar' => 'مسمى وظيفي',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:46', 'updated_at' => '2025-09-21 16:49:46'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'dpartment',
  'ar' => 'قسم',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Dpartment',
  'ar' => 'قسم',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:46', 'updated_at' => '2025-09-21 16:49:46'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'required_skills',
  'ar' => 'مطلوبة _skills',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Required Skills',
  'ar' => 'المهارات المطلوبة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:47', 'updated_at' => '2025-09-21 16:49:47'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'qualification',
  'ar' => 'مؤهل',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Qualification',
  'ar' => 'مؤهل',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:47', 'updated_at' => '2025-09-21 16:49:47'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'expected_salary',
  'ar' => 'المتوقع _salary',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Expected Salary',
  'ar' => 'الراتب المتوقع',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:48', 'updated_at' => '2025-09-21 16:49:48'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'posting_date',
  'ar' => 'posting_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Posting Date',
  'ar' => 'تاريخ النشر',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:49', 'updated_at' => '2025-09-21 16:49:49'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'closing_date',
  'ar' => 'Closing_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Closing Date',
  'ar' => 'تاريخ الإغلاق',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:49', 'updated_at' => '2025-09-21 16:49:49'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'job_status',
  'ar' => 'job_status',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Job Status',
  'ar' => 'حالة الوظيفة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:50', 'updated_at' => '2025-09-21 16:49:50'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'job_source',
  'ar' => 'Job_Source',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Job Source',
  'ar' => 'مصدر الوظيفة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:50', 'updated_at' => '2025-09-21 16:49:50'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'job_type',
  'ar' => 'job_type',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Job Type',
  'ar' => 'نوع الوظيفة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:50', 'updated_at' => '2025-09-21 16:49:50'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'workLocation',
  'ar' => 'تحديد الموقع',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Worklocation',
  'ar' => 'تحديد الموقع',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:51', 'updated_at' => '2025-09-21 16:49:51'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'number_of_vacancies',
  'ar' => 'number_of_vacancies',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Number Of Vacancies',
  'ar' => 'عدد الوظائف الشاغرة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:51', 'updated_at' => '2025-09-21 16:49:51'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'hiringManager',
  'ar' => 'مدير التوظيف',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Hiringmanager',
  'ar' => 'مدير التوظيف',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:51', 'updated_at' => '2025-09-21 16:49:51'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'experience_level',
  'ar' => 'Experience_level',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Experience Level',
  'ar' => 'مستوى الخبرة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:52', 'updated_at' => '2025-09-21 16:49:52'],
            ['model' => 'JobVacancy', 'key' => json_encode(array (
  'en' => 'job_description',
  'ar' => 'المسمى الوظيفي',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Job Description',
  'ar' => 'المسمى الوظيفي',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 16:49:52', 'updated_at' => '2025-09-21 16:49:52']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'Application', 'key' => json_encode(array (
  'en' => 'jobVacancy',
  'ar' => 'الوظيفة الشاغرة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Jobvacancy',
  'ar' => 'الوظيفة الشاغرة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:00:28', 'updated_at' => '2025-09-21 17:00:28'],
            ['model' => 'Application', 'key' => json_encode(array (
  'en' => 'candidate_name',
  'ar' => 'المرشح',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Candidate Name',
  'ar' => 'اسم المرشح',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:00:29', 'updated_at' => '2025-09-21 17:00:29'],
            ['model' => 'Application', 'key' => json_encode(array (
  'en' => 'email',
  'ar' => 'بريد إلكتروني',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Email',
  'ar' => 'بريد إلكتروني',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:00:29', 'updated_at' => '2025-09-21 17:00:29'],
            ['model' => 'Application', 'key' => json_encode(array (
  'en' => 'phone_number',
  'ar' => 'رقم التليفون',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Phone Number',
  'ar' => 'رقم التليفون',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:00:29', 'updated_at' => '2025-09-21 17:00:29'],
            ['model' => 'Application', 'key' => json_encode(array (
  'en' => 'application_date',
  'ar' => 'application_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Application Date',
  'ar' => 'تاريخ الطلب',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:00:30', 'updated_at' => '2025-09-21 17:00:30'],
            ['model' => 'Application', 'key' => json_encode(array (
  'en' => 'application_status',
  'ar' => 'application_status',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Application Status',
  'ar' => 'حالة التطبيق',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:00:31', 'updated_at' => '2025-09-21 17:00:31'],
            ['model' => 'Application', 'key' => json_encode(array (
  'en' => 'application_source',
  'ar' => 'application_source',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Application Source',
  'ar' => 'مصدر التطبيق',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:00:31', 'updated_at' => '2025-09-21 17:00:31'],
            ['model' => 'Application', 'key' => json_encode(array (
  'en' => 'match_score',
  'ar' => 'match_score',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Match Score',
  'ar' => 'درجة المباراة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:00:32', 'updated_at' => '2025-09-21 17:00:32'],
            ['model' => 'Application', 'key' => json_encode(array (
  'en' => 'nationality',
  'ar' => 'جنسية',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Nationality',
  'ar' => 'جنسية',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:00:32', 'updated_at' => '2025-09-21 17:00:32']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'application',
  'ar' => 'طلب',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Application',
  'ar' => 'طلب',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:42', 'updated_at' => '2025-09-21 17:03:42'],
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'candidate_name',
  'ar' => 'المرشح',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Candidate Name',
  'ar' => 'اسم المرشح',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:43', 'updated_at' => '2025-09-21 17:03:43'],
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'interview_date',
  'ar' => 'مقابلة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Interview Date',
  'ar' => 'تاريخ المقابلة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:43', 'updated_at' => '2025-09-21 17:03:43'],
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'interview_type',
  'ar' => 'مقابلة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Interview Type',
  'ar' => 'نوع المقابلة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:44', 'updated_at' => '2025-09-21 17:03:44'],
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'interviewer_name',
  'ar' => 'المقابلة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Interviewer Name',
  'ar' => 'اسم المقابلة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:45', 'updated_at' => '2025-09-21 17:03:45'],
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'interview_result',
  'ar' => 'مقابلة _result',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Interview Result',
  'ar' => 'نتيجة المقابلة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:46', 'updated_at' => '2025-09-21 17:03:46'],
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'interview_round',
  'ar' => 'مقابلة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Interview Round',
  'ar' => 'جولة المقابلة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:47', 'updated_at' => '2025-09-21 17:03:47'],
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'interviewer_rating',
  'ar' => 'المقابلة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Interviewer Rating',
  'ar' => 'تصنيف المقابلة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:48', 'updated_at' => '2025-09-21 17:03:48'],
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'interview_link',
  'ar' => 'مقابلة _link',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Interview Link',
  'ar' => 'رابط المقابلة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:49', 'updated_at' => '2025-09-21 17:03:49'],
            ['model' => 'Interview', 'key' => json_encode(array (
  'en' => 'notes',
  'ar' => 'ملحوظات',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Notes',
  'ar' => 'ملحوظات',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:03:50', 'updated_at' => '2025-09-21 17:03:50']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'Onboarding', 'key' => json_encode(array (
  'en' => 'employee',
  'ar' => 'موظف',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Employee',
  'ar' => 'موظف',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:07:12', 'updated_at' => '2025-09-21 17:07:12'],
            ['model' => 'Onboarding', 'key' => json_encode(array (
  'en' => 'employee_name',
  'ar' => 'الموظف',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Employee Name',
  'ar' => 'اسم الموظف',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:07:13', 'updated_at' => '2025-09-21 17:07:13'],
            ['model' => 'Onboarding', 'key' => json_encode(array (
  'en' => 'contract_start_date',
  'ar' => 'Contract_start_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Contract Start Date',
  'ar' => 'تاريخ بدء العقد',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:07:13', 'updated_at' => '2025-09-21 17:07:13'],
            ['model' => 'Onboarding', 'key' => json_encode(array (
  'en' => 'contract_end_date',
  'ar' => 'Contract_end_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Contract End Date',
  'ar' => 'تاريخ نهاية العقد',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:07:14', 'updated_at' => '2025-09-21 17:07:14'],
            ['model' => 'Onboarding', 'key' => json_encode(array (
  'en' => 'contract',
  'ar' => 'عقد',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Contract',
  'ar' => 'عقد',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:07:14', 'updated_at' => '2025-09-21 17:07:14'],
            ['model' => 'Onboarding', 'key' => json_encode(array (
  'en' => 'national',
  'ar' => 'وطني',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'National',
  'ar' => 'وطني',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:07:14', 'updated_at' => '2025-09-21 17:07:14'],
            ['model' => 'Onboarding', 'key' => json_encode(array (
  'en' => 'passport',
  'ar' => 'جواز سفر',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Passport',
  'ar' => 'جواز سفر',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:07:15', 'updated_at' => '2025-09-21 17:07:15'],
            ['model' => 'Onboarding', 'key' => json_encode(array (
  'en' => 'status',
  'ar' => 'حالة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Status',
  'ar' => 'حالة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 17:07:16', 'updated_at' => '2025-09-21 17:07:16']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'EmployeeReferral', 'key' => json_encode(array (
  'en' => 'referringEmployee',
  'ar' => 'الإحالة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Referringemployee',
  'ar' => 'الإحالة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:29:59', 'updated_at' => '2025-09-21 18:29:59'],
            ['model' => 'EmployeeReferral', 'key' => json_encode(array (
  'en' => 'candidate',
  'ar' => 'مُرَشَّح',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Candidate',
  'ar' => 'مُرَشَّح',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:30:00', 'updated_at' => '2025-09-21 18:30:00'],
            ['model' => 'EmployeeReferral', 'key' => json_encode(array (
  'en' => 'job',
  'ar' => 'وظيفة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Job',
  'ar' => 'وظيفة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:30:01', 'updated_at' => '2025-09-21 18:30:01'],
            ['model' => 'EmployeeReferral', 'key' => json_encode(array (
  'en' => 'referral_status',
  'ar' => 'endral_status',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Referral Status',
  'ar' => 'حالة الإحالة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:30:01', 'updated_at' => '2025-09-21 18:30:01'],
            ['model' => 'EmployeeReferral', 'key' => json_encode(array (
  'en' => 'referral_bonus',
  'ar' => 'endral_bonus',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Referral Bonus',
  'ar' => 'مكافأة الإحالة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:30:01', 'updated_at' => '2025-09-21 18:30:01']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'JobOffer', 'key' => json_encode(array (
  'en' => 'candidate',
  'ar' => 'مُرَشَّح',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Candidate',
  'ar' => 'مُرَشَّح',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:33:13', 'updated_at' => '2025-09-21 18:33:13'],
            ['model' => 'JobOffer', 'key' => json_encode(array (
  'en' => 'offered_salary',
  'ar' => 'العرض',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Offered Salary',
  'ar' => 'عرض الراتب',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:33:14', 'updated_at' => '2025-09-21 18:33:14'],
            ['model' => 'JobOffer', 'key' => json_encode(array (
  'en' => 'offer_date',
  'ar' => 'droft_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Offer Date',
  'ar' => 'تاريخ العرض',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:33:15', 'updated_at' => '2025-09-21 18:33:15'],
            ['model' => 'JobOffer', 'key' => json_encode(array (
  'en' => 'offer_status',
  'ar' => 'droft_status',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Offer Status',
  'ar' => 'تقديم الحالة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:33:16', 'updated_at' => '2025-09-21 18:33:16'],
            ['model' => 'JobOffer', 'key' => json_encode(array (
  'en' => 'additional_benefits',
  'ar' => 'oney_benefits',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Additional Benefits',
  'ar' => 'فوائد إضافية',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-21 18:33:17', 'updated_at' => '2025-09-21 18:33:17']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'ApplicationPreviousExperience', 'key' => json_encode(array (
  'en' => 'application',
  'ar' => 'طلب',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Application',
  'ar' => 'طلب',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-23 11:30:43', 'updated_at' => '2025-09-23 11:30:43'],
            ['model' => 'ApplicationPreviousExperience', 'key' => json_encode(array (
  'en' => 'job_title',
  'ar' => 'مسمى وظيفي',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Job Title',
  'ar' => 'مسمى وظيفي',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-23 11:30:43', 'updated_at' => '2025-09-23 11:30:43'],
            ['model' => 'ApplicationPreviousExperience', 'key' => json_encode(array (
  'en' => 'experience_count',
  'ar' => 'Experience_count',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Experience Count',
  'ar' => 'عدد الخبرة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-23 11:30:44', 'updated_at' => '2025-09-23 11:30:44']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'CandidateSkill', 'key' => json_encode(array (
  'en' => 'candidate',
  'ar' => 'مُرَشَّح',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Candidate',
  'ar' => 'مُرَشَّح',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-24 10:59:40', 'updated_at' => '2025-09-24 10:59:40'],
            ['model' => 'CandidateSkill', 'key' => json_encode(array (
  'en' => 'skill_name',
  'ar' => 'skill_name',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Skill Name',
  'ar' => 'اسم المهارة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-24 10:59:40', 'updated_at' => '2025-09-24 10:59:40'],
            ['model' => 'CandidateSkill', 'key' => json_encode(array (
  'en' => 'proficiency_level',
  'ar' => 'الكفاءة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Proficiency Level',
  'ar' => 'مستوى الكفاءة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-24 10:59:41', 'updated_at' => '2025-09-24 10:59:41']
        ]
        );
    }
}