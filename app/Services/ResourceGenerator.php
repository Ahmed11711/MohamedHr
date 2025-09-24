<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ResourceGenerator
{
    public static function make(string $module, string $model)
    {
        $table = Str::snake(Str::pluralStudly($model));

        if (!Schema::hasTable($table)) {
            return "Table '{$table}' does not exist in database!";
        }

        $baseFolder  = module_path($module, "app/Transformers");
        $modelFolder = $baseFolder . "/{$model}";

        if (!File::exists($modelFolder)) {
            File::makeDirectory($modelFolder, 0755, true);
        }

        $resourcePath = "{$modelFolder}/{$model}Resource.php";

        if (!File::exists($resourcePath)) {
            $columns = Schema::getColumnListing($table);
            $resourceStub = self::generateStub($module, $model, $columns);
            File::put($resourcePath, $resourceStub);
        }

        self::updateModelRelations($module, $model, $table);

        return "{$model}Resource + Relations updated successfully inside Module {$module}.";
    }

 private static function generateStub($module, $model, $columns)
{
    $fieldsString = "";
    $table = Str::snake(Str::pluralStudly($model));

     $skipCols = ['id', 'created_at', 'updated_at', 'deleted_at', 'employee','employee_id','Attachments','attendanceAttachments'];

    foreach ($columns as $col) {
         if (in_array($col, $skipCols)) {
            continue;
        }

        $type = Schema::getColumnType($table, $col);

        if (Str::endsWith($col, '_id')) {
            $relation = Str::camel(Str::replaceLast('_id', '', $col));
            $relatedTable = Str::snake(Str::pluralStudly(Str::replaceLast('_id', '', $col)));

            if (Schema::hasTable($relatedTable)) {
                $relatedCols = Schema::getColumnListing($relatedTable);
                $firstCol = collect($relatedCols)
                    ->reject(fn($c) => in_array($c, ['id', 'created_at', 'updated_at', 'deleted_at', 'employee_id', 'employee','Attachments','attendanceAttachments']))
                    ->first();
                $priorityCols = ['name', 'title', 'full_name', 'company_name'];
                $preferredCol = collect($priorityCols)->first(fn($pc) => in_array($pc, $relatedCols));
                $colToUse = $preferredCol ?? $firstCol ?? null;

                if ($colToUse) {
                    $relatedType = Schema::getColumnType($relatedTable, $colToUse);
                    if ($relatedType === 'json') {
                        $fieldsString .= "            '{$relation}' => \$resource->{$relation} ? \$resource->{$relation}->getTranslation('{$colToUse}', app()->getLocale()) : null,\n";
                    } else {
                        $fieldsString .= "            '{$relation}' => \$resource->{$relation}?->{$colToUse},\n";
                    }
                } else {
                    $fieldsString .= "            '{$relation}' => null,\n";
                }
            } else {
                $fieldsString .= "            '{$relation}' => null,\n";
            }
        } elseif ($type === 'json') {
            $fieldsString .= "            '{$col}' => \$resource->getTranslation('{$col}', app()->getLocale()),\n";
        } else {
            $fieldsString .= "            '{$col}' => \$resource->{$col},\n";
        }
    }

    return "<?php

namespace Modules\\{$module}\\Transformers\\{$model};

use Modules\\{$module}\\Transformers\\BaseResource\\BaseResource;

class {$model}Resource extends BaseResource
{
    public function toArray(\$request)
    {
        \$resource = \$this->resource;

        return array_merge(
            \$this->baseArray(),
            [
{$fieldsString}            ],
            \$this->timestampsArray()
        );
    }
}
";
}

    private static function updateModelRelations($module, $model, $table)
    {
        $modelPath = module_path($module, "app/Models/{$model}.php");

        if (!File::exists($modelPath)) {
            return;
        }

        $content = File::get($modelPath);
        $columns = Schema::getColumnListing($table);

         $skipFunctions = ['attendanceAttachments', 'employee'];

        foreach ($columns as $col) {
            if (Str::endsWith($col, '_id')) {
                $relation = Str::camel(Str::replaceLast('_id', '', $col));

                 if (in_array($relation, $skipFunctions)) {
                    continue;
                }

                $relatedModel = Str::studly(Str::replaceLast('_id', '', $col));

                if (Str::contains($content, "function {$relation}(")) {
                    continue;
                }

                $relationCode = "

    public function {$relation}()
    {
        return \$this->belongsTo({$relatedModel}::class, '{$col}');
    }
";

                $content = preg_replace('/}\s*$/', $relationCode . "\n}", $content);
            }
        }

        File::put($modelPath, $content);
    }
}
