<?php

namespace Modules\Facilities\Database\Seeders\Facilities;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitiesColumnSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('columns_facilities')->insert(
            [
            ['model' => 'Facilities', 'key' => '{\"en\":\"img\",\"ar\":\"IMG\"}', 'label' => '{\"en\":\"Img\",\"ar\":\"IMG\"}', 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:08:02', 'updated_at' => '2025-09-17 22:08:02'],
            ['model' => 'Facilities', 'key' => '{\"en\":\"unified_national_number\",\"ar\":\"unified_national_number\"}', 'label' => '{\"en\":\"Unified National Number\",\"ar\":\"الرقم الوطني الموحد\"}', 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:08:03', 'updated_at' => '2025-09-17 22:08:03'],
            ['model' => 'Facilities', 'key' => '{\"en\":\"company_name_ar\",\"ar\":\"company_name_ar\"}', 'label' => '{\"en\":\"Company Name Ar\",\"ar\":\"اسم الشركة AR\"}', 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:08:03', 'updated_at' => '2025-09-17 22:08:03'],
            ['model' => 'Facilities', 'key' => '{\"en\":\"company_name_en\",\"ar\":\"Company_name_en\"}', 'label' => '{\"en\":\"Company Name En\",\"ar\":\"اسم الشركة في\"}', 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:08:03', 'updated_at' => '2025-09-17 22:08:03'],
            ['model' => 'Facilities', 'key' => '{\"en\":\"companyType\",\"ar\":\"CompanyType\"}', 'label' => '{\"en\":\"Companytype\",\"ar\":\"CompanyType\"}', 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:08:04', 'updated_at' => '2025-09-17 22:08:04'],
            ['model' => 'Facilities', 'key' => '{\"en\":\"companySize\",\"ar\":\"حجم الشركة\"}', 'label' => '{\"en\":\"Companysize\",\"ar\":\"حجم الشركة\"}', 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:08:04', 'updated_at' => '2025-09-17 22:08:04'],
            ['model' => 'Facilities', 'key' => '{\"en\":\"companyHeadquarters\",\"ar\":\"مقر الشركة\"}', 'label' => '{\"en\":\"Companyheadquarters\",\"ar\":\"مقر الشركة\"}', 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:08:04', 'updated_at' => '2025-09-17 22:08:04'],
            ['model' => 'Facilities', 'key' => '{\"en\":\"companyActivities\",\"ar\":\"شركة CompanyActivities\"}', 'label' => '{\"en\":\"Companyactivities\",\"ar\":\"شركة CompanyActivities\"}', 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:08:04', 'updated_at' => '2025-09-17 22:08:04']
        ]
        );
    }
}