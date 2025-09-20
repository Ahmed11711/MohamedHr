<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
  public function run(): void
  {
    DB::table('columns_facilities')->insert(
      [
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'userName',
          'ar' => 'اسم المستخدم',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Username',
          'ar' => 'اسم المستخدم',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:01', 'updated_at' => '2025-09-17 22:16:01'],
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'email',
          'ar' => 'بريد إلكتروني',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Email',
          'ar' => 'بريد إلكتروني',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:01', 'updated_at' => '2025-09-17 22:16:01'],
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'fullName',
          'ar' => 'fullname',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Fullname',
          'ar' => 'fullname',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:05', 'updated_at' => '2025-09-17 22:16:05'],
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'mobileNumber',
          'ar' => 'رقم الهاتف المحمول',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Mobilenumber',
          'ar' => 'رقم الهاتف المحمول',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:05', 'updated_at' => '2025-09-17 22:16:05'],
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'securityQuestion',
          'ar' => 'مسألة أمان',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Securityquestion',
          'ar' => '.مسألة أمان',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:06', 'updated_at' => '2025-09-17 22:16:06'],
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'security_answer',
          'ar' => 'Security_answer',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Security Answer',
          'ar' => 'إجابة أمنية',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:06', 'updated_at' => '2025-09-17 22:16:06'],
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'gender',
          'ar' => 'جنس',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Gender',
          'ar' => 'جنس',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:06', 'updated_at' => '2025-09-17 22:16:06'],
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'nationality',
          'ar' => 'جنسية',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Nationality',
          'ar' => 'جنسية',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:06', 'updated_at' => '2025-09-17 22:16:06'],
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'language',
          'ar' => 'لغة',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Language',
          'ar' => 'لغة',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:07', 'updated_at' => '2025-09-17 22:16:07'],
        ['model' => 'User', 'key' => json_encode(array(
          'en' => 'termsAccepted',
          'ar' => 'مصطلح',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Termsaccepted',
          'ar' => 'مصطلح',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:07', 'updated_at' => '2025-09-17 22:16:07']
      ]
    );
    DB::table('columns_facilities')->insert(
      [
        ['model' => 'Facilities', 'key' => json_encode(array(
          'en' => 'img',
          'ar' => 'IMG',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Img',
          'ar' => 'IMG',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:25', 'updated_at' => '2025-09-17 22:16:25'],
        ['model' => 'Facilities', 'key' => json_encode(array(
          'en' => 'unified_national_number',
          'ar' => 'unified_national_number',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Unified National Number',
          'ar' => 'الرقم الوطني الموحد',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:25', 'updated_at' => '2025-09-17 22:16:25'],
        ['model' => 'Facilities', 'key' => json_encode(array(
          'en' => 'company_name_ar',
          'ar' => 'company_name_ar',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Company Name Ar',
          'ar' => 'اسم الشركة AR',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:25', 'updated_at' => '2025-09-17 22:16:25'],
        ['model' => 'Facilities', 'key' => json_encode(array(
          'en' => 'company_name_en',
          'ar' => 'Company_name_en',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Company Name En',
          'ar' => 'اسم الشركة في',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:26', 'updated_at' => '2025-09-17 22:16:26'],
        ['model' => 'Facilities', 'key' => json_encode(array(
          'en' => 'companyType',
          'ar' => 'CompanyType',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Companytype',
          'ar' => 'CompanyType',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:26', 'updated_at' => '2025-09-17 22:16:26'],
        ['model' => 'Facilities', 'key' => json_encode(array(
          'en' => 'companySize',
          'ar' => 'حجم الشركة',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Companysize',
          'ar' => 'حجم الشركة',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:26', 'updated_at' => '2025-09-17 22:16:26'],
        ['model' => 'Facilities', 'key' => json_encode(array(
          'en' => 'companyHeadquarters',
          'ar' => 'مقر الشركة',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Companyheadquarters',
          'ar' => 'مقر الشركة',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:27', 'updated_at' => '2025-09-17 22:16:27'],
        ['model' => 'Facilities', 'key' => json_encode(array(
          'en' => 'companyActivities',
          'ar' => 'شركة CompanyActivities',
        ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
          'en' => 'Companyactivities',
          'ar' => 'شركة CompanyActivities',
        ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:28', 'updated_at' => '2025-09-17 22:16:28']
      ]
    );
          DB::table('columns_facilities')->insert(
            [
            ['model' => 'Owner', 'key' => json_encode(array (
  'en' => 'full_name',
  'ar' => 'full_name',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Full Name',
  'ar' => 'الاسم الكامل',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:14', 'updated_at' => '2025-09-20 00:13:14'],
            ['model' => 'Owner', 'key' => json_encode(array (
  'en' => 'ownerType',
  'ar' => 'Owntype',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Ownertype',
  'ar' => 'Owntype',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:14', 'updated_at' => '2025-09-20 00:13:14'],
            ['model' => 'Owner', 'key' => json_encode(array (
  'en' => 'national_id_number',
  'ar' => 'national_id_number',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'National Id Number',
  'ar' => 'رقم الهوية الوطني',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:15', 'updated_at' => '2025-09-20 00:13:15'],
            ['model' => 'Owner', 'key' => json_encode(array (
  'en' => 'jobTitle',
  'ar' => 'مسمى وظيفي',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Jobtitle',
  'ar' => 'مسمى وظيفي',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:17', 'updated_at' => '2025-09-20 00:13:17'],
            ['model' => 'Owner', 'key' => json_encode(array (
  'en' => 'date_of_birth',
  'ar' => 'تاريخ الميلاد',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Date Of Birth',
  'ar' => 'تاريخ الميلاد',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:18', 'updated_at' => '2025-09-20 00:13:18'],
            ['model' => 'Owner', 'key' => json_encode(array (
  'en' => 'gender',
  'ar' => 'جنس',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Gender',
  'ar' => 'جنس',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:18', 'updated_at' => '2025-09-20 00:13:18'],
            ['model' => 'Owner', 'key' => json_encode(array (
  'en' => 'country',
  'ar' => 'دولة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Country',
  'ar' => 'دولة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:19', 'updated_at' => '2025-09-20 00:13:19'],
            ['model' => 'Owner', 'key' => json_encode(array (
  'en' => 'city',
  'ar' => 'مدينة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'City',
  'ar' => 'مدينة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:19', 'updated_at' => '2025-09-20 00:13:19'],
            ['model' => 'Owner', 'key' => json_encode(array (
  'en' => 'company_details',
  'ar' => 'company_details',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Company Details',
  'ar' => 'تفاصيل الشركة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:20', 'updated_at' => '2025-09-20 00:13:20']
        ]
        );
    }
}