<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ColumnSyncService
{
    public static function make(string $module, string $model)
    {
        $table = Str::snake(Str::pluralStudly($model));

        if (!Schema::hasTable($table)) {
            return "Table '{$table}' does not exist!";
        }

        $columns = Schema::getColumnListing($table);

        $ignore = ['id', 'created_at', 'updated_at', 'deleted_at'];

        $tr = new GoogleTranslate('ar');  

        foreach ($columns as $col) {
            if (in_array($col, $ignore)) {
                continue; // skip system columns
            }

             $arabicKey   = $tr->translate($col);
            $arabicLabel = $tr->translate(Str::title(str_replace('_', ' ', $col)));

            $key = [
                'en' => $col,
                'ar' => $arabicKey,
            ];

            $label = [
                'en' => Str::title(str_replace('_', ' ', $col)),
                'ar' => $arabicLabel,
            ];

            // check if already exists for the same model
            $exists = DB::table('columns_facilities')
                ->where('model', $model)
                ->whereJsonContains('key->en', $col)
                ->exists();

            if (!$exists) {
                DB::table('columns_facilities')->insert([
                    'model'      => $model,
                    'key'        => json_encode($key, JSON_UNESCAPED_UNICODE),
                    'label'      => json_encode($label, JSON_UNESCAPED_UNICODE),
                    'sortable'   => true,
                    'filterable' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return "Columns synced for {$model}";
    }
}
