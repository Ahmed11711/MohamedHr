<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ResourceGenerator
{
    public static function make(string $module, string $model)
    {
        $table = Str::snake(Str::pluralStudly($model)); // Example: Profile -> profiles

        if (!Schema::hasTable($table)) {
            return "Table '{$table}' does not exist in database!";
        }

        $baseFolder  = module_path($module, "app/Transformers");
        $modelFolder = $baseFolder . "/{$model}";

        if (!File::exists($modelFolder)) {
            File::makeDirectory($modelFolder, 0755, true);
        }

        $resourcePath = "{$modelFolder}/{$model}Resource.php";

        if (File::exists($resourcePath)) {
            return "{$model}Resource already exists!";
        }

        $columns = Schema::getColumnListing($table);

        $resourceStub = self::generateStub($module, $model, $columns);

        File::put($resourcePath, $resourceStub);

        return "{$model}Resource created successfully inside Module {$module}.";
    }

    private static function generateStub($module, $model, $columns)
    {
        $fieldsString = "";
        $table = Str::snake(Str::pluralStudly($model));

        foreach ($columns as $col) {
            $type = Schema::getColumnType($table, $col);

            if (Str::endsWith($col, '_id')) {
                $relation = Str::camel(Str::replaceLast('_id', '', $col));
                $fieldsString .= "            '{$relation}' => \$resource->{$relation}?->name,\n";
            } elseif ($type === 'json') {
                // ✅ Handle JSON columns as translatable
                $fieldsString .= "            '{$col}' => \$this->getTranslations('{$col}'),\n";
            } else {
                $fieldsString .= "            '{$col}' => \$resource->{$col},\n";
            }
        }

        return "<?php

namespace Modules\\{$module}\\Transformers\\{$model};

use Illuminate\Http\Resources\Json\JsonResource;

class {$model}Resource extends JsonResource
{
    public function toArray(\$request)
    {
        \$resource = \$this->resource;

        return [
{$fieldsString}        ];
    }
}
";
    }
}
