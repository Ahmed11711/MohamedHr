<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class ModuleSeederService
{
    public static function make(string $module, string $model)
    {
        $table = Str::snake(Str::pluralStudly($model));

        if (!Schema::hasTable($table)) {
            return "Table '{$table}' does not exist in database!";
        }

        $modelSeederFolder = module_path($module, "Database/Seeders/{$model}");
        if (!File::exists($modelSeederFolder)) {
            File::makeDirectory($modelSeederFolder, 0755, true);
        }

        $seederPath = "{$modelSeederFolder}/{$model}Seeder.php";

        if (File::exists($seederPath)) {
            return "{$model}Seeder already exists!";
        }

        $columns = Schema::getColumnListing($table);

        $seederStub = self::generateStub($module, $model, $columns, $table);

        File::put($seederPath, $seederStub);

         self::updateModuleSeeder($module, $model);

         $seederClass = "Modules\\{$module}\\Database\\Seeders\\{$model}\\{$model}Seeder";
        Artisan::call('db:seed', [
            '--class' => $seederClass,
            '--force' => true
        ]);

         $moduleSeederClass = "Modules\\{$module}\\Database\\Seeders\\{$module}DatabaseSeeder";
        Artisan::call('db:seed', [
            '--class' => $moduleSeederClass,
            '--force' => true
        ]);

        return "{$model}Seeder created and seeded successfully inside Module {$module}.";
    }

    private static function generateStub($module, $model, $columns, $table)
    {
        $rows = "";

        for ($i = 1; $i <= 5; $i++) {
            $dataString = "";

            foreach ($columns as $col) {
                if (in_array($col, ['id', 'created_at', 'updated_at'])) continue;

                $columnType = self::getColumnType($table, $col);

                 if ($columnType === 'json') {
                    $value = "json_encode(['sample' => 'Sample {$col} {$i}'])";
                } elseif (str_ends_with($col, '_id')) {
                    $relatedTable = Str::snake(Str::plural(Str::replaceLast('_id', '', $col)));
                    if (Schema::hasTable($relatedTable)) {
                        $ids = DB::table($relatedTable)->pluck('id')->toArray();
                        $value = count($ids) ? $ids[array_rand($ids)] : $i;
                    } else {
                        $value = $i;
                    }
                } elseif ($col === 'name') {
                    $value = "Sample {$col} {$i}";
                } elseif (str_contains($col, 'email')) {
                    $value = "user{$i}@example.com";
                } elseif (str_contains($col, 'mobile')) {
                    $value = "01010000{$i}";
                } elseif ($col === 'username') {
                    $value = "user{$i}";
                } elseif ($col === 'full_name') {
                    $value = "Sample Name {$i}";
                } elseif ($col === 'password') {
                    $value = "bcrypt('password123')";
                } elseif ($col === 'gender') {
                    $value = $i % 2 === 0 ? 'Male' : 'Female';
                } else {
                    $value = "Sample {$col} {$i}";
                }

                 if ($columnType === 'json' || $col === 'password') {
                    $dataString .= "                '{$col}' => {$value},\n";
                } else {
                    $dataString .= "                '{$col}' => '{$value}',\n";
                }
            }

            $rows .= "        {$model}::firstOrCreate([\n{$dataString}        ]);\n\n";
        }

        $namespace = "Modules\\{$module}\\Database\\Seeders\\{$model}";

        return "<?php

namespace {$namespace};

use Illuminate\Database\Seeder;
use Modules\\{$module}\\Models\\{$model};

class {$model}Seeder extends Seeder
{
    public function run(): void
    {
{$rows}    }
}
";
    }

    private static function updateModuleSeeder($module, $model)
    {
        $moduleSeederPath = module_path($module, "Database/Seeders/{$module}DatabaseSeeder.php");

        if (!File::exists($moduleSeederPath)) {
            $stub = "<?php

namespace Modules\\{$module}\\Database\\Seeders;

use Illuminate\\Database\\Seeder;

class {$module}DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeders will be added here
    }
}
";
            File::put($moduleSeederPath, $stub);
        }

        $content = File::get($moduleSeederPath);
        $seederClass = "{$model}\\{$model}Seeder::class";

        if (!str_contains($content, $seederClass)) {
            if (preg_match('/public function run\(\): void\s*\{/', $content, $matches, PREG_OFFSET_CAPTURE)) {
                $pos = $matches[0][1] + strlen($matches[0][0]);
                $content = substr_replace($content, "\n        \$this->call({$seederClass});", $pos, 0);
                File::put($moduleSeederPath, $content);
            }
        }
    }

    private static function getColumnType($table, $column)
    {
        return DB::getSchemaBuilder()->getColumnType($table, $column);
    }
}
