<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RelationSyncService
{
    /**
     * Sync relations from Resource to Model
     */
    public static function make(string $module, string $model)
    {
        $modelClass    = "Modules\\{$module}\\Models\\{$model}";
        $resourceClass = "Modules\\{$module}\\Transformers\\{$model}\\{$model}Resource";

        $modelPath    = module_path($module, "Models/{$model}.php");
        $resourcePath = module_path($module, "Transformers/{$model}/{$model}Resource.php");

        // ✅ تأكيد وجود الملفات
        if (!File::exists($modelPath)) {
            return "Model file not found: " . realpath($modelPath);
        }
        if (!File::exists($resourcePath)) {
            return "Resource file not found: " . realpath($resourcePath);
        }

        // قراءة المحتوى
        $resourceContent = File::get($resourcePath);
        $modelContent    = File::get($modelPath);

        // استخراج العلاقات: أي شيء فيه $resource->relation?-> أو $resource->relation-> 
        preg_match_all('/\$resource->(\w+)\??->/', $resourceContent, $matches);
        $relations = $matches[1] ?? [];

        if (empty($relations)) {
            return "No relations found in resource!";
        }

        // ✅ Debug: شوف كل العلاقات اللي لاقاها
        // dd($modelPath, $resourcePath, $relations);

        foreach ($relations as $relation) {
            $methodName = Str::camel($relation);   // companyType
            $className  = Str::studly($relation);  // CompanyType
            $namespace  = "Modules\\{$module}\\Models\\{$className}";

            // إضافة use لو مش موجود
            if (!Str::contains($modelContent, "use {$namespace};")) {
                $modelContent = preg_replace(
                    '/namespace\s+[^\s;]+;\s*/',
                    "namespace " . self::getNamespace($modelClass) . ";\n\nuse {$namespace};\n",
                    $modelContent,
                    1
                );
            }

            $relationMethod = <<<PHP

    public function {$methodName}()
    {
        return \$this->belongsTo({$className}::class, '{$relation}_id');
    }

PHP;

            if (!Str::contains($modelContent, "function {$methodName}(")) {
                $modelContent = preg_replace(
                    '/}\s*$/',
                    $relationMethod . "}",
                    $modelContent
                );
            }
        }

        File::put($modelPath, $modelContent);

        return "Relations synced into {$modelClass}";
    }

    private static function getNamespace(string $class)
    {
        return Str::beforeLast($class, '\\');
    }
}
