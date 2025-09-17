<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ColumnSyncService
{
    public static function make(string $module, string $model)
    {
        $resourceClass = "Modules\\{$module}\\Transformers\\{$model}\\{$model}Resource";

        if (strtolower($model) === 'user') {
            $modelClass = "App\\Models\\User";
        } else {
            $modelClass = "Modules\\{$module}\\Models\\{$model}";
        }

        if (!class_exists($resourceClass)) {
            return "Resource class '{$resourceClass}' not found!";
        }

        if (!class_exists($modelClass)) {
            return "Model class '{$modelClass}' not found!";
        }

        $dummyModel = new $modelClass;
        $resource   = new $resourceClass($dummyModel);

        $columns = array_keys($resource->toArray(request()));

        $tr   = new GoogleTranslate('ar');
        $skip = ['id', 'created_at', 'updated_at', 'deleted_at'];

        $data = [];

        foreach ($columns as $col) {
            if (in_array($col, $skip)) {
                continue;
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

            $data[] = [
                'model'      => $model,
                'key'        => $key,
                'label'      => $label,
                'sortable'   => true,
                'filterable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $path = module_path($module, "Database/Seeders");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $seederName = "ColumnsSeeder.php";
        $filePath   = $path . '/' . $seederName;

        $namespace  = "Modules\\{$module}\\Database\\Seeders";

        $arrayString = self::buildArrayString($data);

        if (!File::exists($filePath)) {
            $seederContent = <<<PHP
<?php

namespace {$namespace};

use Illuminate\\Database\\Seeder;
use Illuminate\\Support\\Facades\\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('columns_facilities')->insert(
            {$arrayString}
        );
    }
}
PHP;
            File::put($filePath, $seederContent);
        } else {
            $oldContent = File::get($filePath);

            $newInsert = "        DB::table('columns_facilities')->insert(\n            {$arrayString}\n        );\n";

            if (strpos($oldContent, "'model' => '{$model}'") === false) {
                $newContent = preg_replace(
                    '/\}\s*\}\s*$/',
                    $newInsert . "    }\n}",
                    $oldContent
                );

                File::put($filePath, $newContent);
            }
        }

        return "Seeder updated: {$filePath}";
    }

    private static function buildArrayString(array $data): string
    {
        $rows = collect($data)->map(function ($row) {
            $items = [];
            foreach ($row as $k => $v) {
                if (in_array($k, ['key', 'label'])) {
                    // نخليهم json_encode صح
                    $v = "json_encode(" . var_export($v, true) . ", JSON_UNESCAPED_UNICODE)";
                } elseif (is_string($v)) {
                    $v = "'" . addslashes($v) . "'";
                } elseif (is_bool($v)) {
                    $v = $v ? 'true' : 'false';
                } elseif ($v instanceof \DateTimeInterface) {
                    $v = "'" . $v->format('Y-m-d H:i:s') . "'";
                }
                $items[] = "'{$k}' => {$v}";
            }
            return '[' . implode(', ', $items) . ']';
        })->implode(",\n            ");

        return "[\n            {$rows}\n        ]";
    }
}
