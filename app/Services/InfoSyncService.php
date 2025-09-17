<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class InfoSyncService
{
    /**
     * Sync info columns and insert to model-specific infos table
     *
     * @param string $model  Model name (e.g., 'Product')
     * @return string
     */
    public static function make(string $model)
    {
        // جدول الأعمدة: info_{model_plural_snake_case}
        $columnsTable = 'info_' . Str::snake(Str::pluralStudly($model));
        // جدول تخزين infos الخاص بالموديل: infos_{model_plural_snake_case}
        $infosTable = 'info_' . Str::snake(Str::pluralStudly($model));
 
        // التحقق من وجود جداول الأعمدة و جداول البيانات
        if (!Schema::hasTable($columnsTable)) {
            return "Columns table '{$columnsTable}' does not exist!";
        }

        if (!Schema::hasTable($infosTable)) {
            return "Infos table '{$infosTable}' does not exist!";
        }

        // جلب الأعمدة من جدول الأعمدة (info_{model})
        $columns = Schema::getColumnListing($columnsTable);

        // الأعمدة التي لا نحتاجها
        $ignore = ['id', 'created_at', 'updated_at', 'deleted_at'];

        // مهيئ Google Translate إلى العربية
        $tr = new GoogleTranslate('ar');

        foreach ($columns as $col) {
            if (in_array($col, $ignore)) {
                continue; // تجاهل الأعمدة النظامية
            }

            // الترجمة العربية للعنوان
            $arabicTitle = $tr->translate(Str::title(str_replace('_', ' ', $col)));

            // وصف عربي إضافي (يمكن تعديله حسب حاجتك)
            $arabicDesc = $arabicTitle . " وصف إضافي للعمود";

            // تجميع العنوان والشرح (العربي والإنجليزي)
            $title = [
                'en' => Str::title(str_replace('_', ' ', $col)),
                'ar' => $arabicTitle,
            ];

            $desc = [
                'en' => 'Description for ' . Str::title(str_replace('_', ' ', $col)),
                'ar' => $arabicDesc,
            ];

            // التحقق إذا السجل موجود مسبقًا في جدول infos_{model}
            $exists = DB::table($infosTable)
                ->where('infoable_type', 'App\\Models\\' . $model)
                ->whereJsonContains('title->en', $title['en'])
                ->exists();

            if (!$exists) {
                // إدخال السجل الجديد
                DB::table($infosTable)->insert([
                    'infoable_type' => 'App\\Models\\' . $model,
                    'title'         => json_encode($title, JSON_UNESCAPED_UNICODE),
                    'desc'          => json_encode($desc, JSON_UNESCAPED_UNICODE),
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
        }

        return "Info synced for model '{$model}'";
    }
}
