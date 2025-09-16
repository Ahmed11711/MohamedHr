<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ColumnSyncService
{
    public static function make(string $module, string $model)
    {
        $table = Str::snake(Str::pluralStudly($model));

        if (!Schema::hasTable($table)) {
            return "Table '{$table}' does not exist!";
        }

        $columns = Schema::getColumnListing($table);

        // الأعمدة اللي هنتجاهلها
        $ignore = ['id', 'created_at', 'updated_at', 'deleted_at'];

        foreach ($columns as $col) {
            if (in_array($col, $ignore)) {
                continue; // skip system columns
            }

            // key JSON (عربي + إنجليزي)
            $key = [
                'en' => $col,
                'ar' => $col, // هنا ممكن تضيف ترجمة عربية لو عندك
            ];

            // label JSON (عربي + إنجليزي)
            $label = [
                'en' => Str::title(str_replace('_', ' ', $col)),
                'ar' => Str::title(str_replace('_', ' ', $col)), // ممكن تستخدم ترجمة هنا
            ];

            // check if already exists
            $exists = DB::table('columns')->where([
                'module' => $module,
                'model'  => $model,
            ])->whereJsonContains('key->en', $col)->exists();

            if (!$exists) {
                DB::table('columns')->insert([
                    'module'     => $module,
                    'model'      => $model,
                    'key'        => json_encode($key, JSON_UNESCAPED_UNICODE),
                    'label'      => json_encode($label, JSON_UNESCAPED_UNICODE),
                    'sortable'   => true,
                    'filterable' => true,
                    // 'created_at' => now(),
                    // 'updated_at' => now(),
                ]);
            }
        }

        return "Columns synced for {$model}";
    }
}
