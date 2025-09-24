<?php

namespace Modules\Recruitment\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns = [
        'Ahmed' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachment', 'مرفق', 'Attachment', 'مرفق'],
            ['test', 'امتحان', 'Test', 'امتحان'],
            ['key', 'مفتاح', 'Key', 'مفتاح'],
            ['status', 'حالة', 'Status', 'حالة'],
            ['recruitmentAttachments', 'التوظيف', 'Recruitmentattachments', 'التوظيف']
        ],


        ];

        foreach ($columns as $model => $fields) {
            foreach ($fields as $field) {
                DB::table('columns_recruitments')->insert([
                    'model' => $model,
                    'key' => json_encode(['en' => $field[0], 'ar' => $field[1]], JSON_UNESCAPED_UNICODE),
                    'label' => json_encode(['en' => $field[2], 'ar' => $field[3]], JSON_UNESCAPED_UNICODE),
                    'sortable' => true,
                    'filterable' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
