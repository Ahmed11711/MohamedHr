<?php

namespace Modules\Performance\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns =[
        'Goal' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['employeeinfo', 'الموظف', 'Employeeinfo', 'الموظف'],
            ['goal_name', 'الهدف', 'Goal Name', 'اسم الهدف'],
            ['goal_description', 'الهدف _description', 'Goal Description', 'وصف الهدف'],
            ['goal_measure', 'الهدف', 'Goal Measure', 'مقياس الهدف'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['goal_status', 'الهدف_ستاتوس', 'Goal Status', 'حالة الهدف'],
            ['goal_priority', 'الهدف', 'Goal Priority', 'أولوية الهدف']
        ],
];

        foreach ($columns as $model => $fields) {
            $exists = DB::table('column_performances')->where('model', $model)->exists();
            if ($exists) {
                continue;
            }

            foreach ($fields as $field) {
                DB::table('column_performances')->insert([
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
