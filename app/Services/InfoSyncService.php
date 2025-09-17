<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class InfoSyncService
{
    /**
     * Generate/Update InfoSeeder file instead of inserting in DB
     *
     * @param string $module     Module name (e.g., Facilities)
     * @param string $modelClass Full model class (e.g., App\Models\User)
     * @param string $modelName  Name to store in infoable_type (e.g., 'User')
     * @return string
     */
    public static function make(string $module, string $modelName)
    {
        $tr = new GoogleTranslate('ar');

        $englishTitle = Str::title(str_replace('_', ' ', $modelName));
        $arabicTitle  = $tr->translate($englishTitle);

        $englishDesc = "Description for {$englishTitle}";
        $arabicDesc  = $tr->translate($englishDesc);

        $title = json_encode(['en' => $englishTitle, 'ar' => $arabicTitle], JSON_UNESCAPED_UNICODE);
        $desc  = json_encode(['en' => $englishDesc, 'ar' => $arabicDesc], JSON_UNESCAPED_UNICODE);

        $path = module_path($module, "Database/Seeders");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $seederName = "InfoSeeder.php";
        $filePath   = $path . '/' . $seederName;

        $namespace  = "Modules\\{$module}\\Database\\Seeders";

        $arrayString = "[\n            'infoable_type' => '{$modelName}',\n" .
            "            'title' => '{$title}',\n" .
            "            'desc' => '{$desc}',\n" .
            "            'created_at' => now(),\n" .
            "            'updated_at' => now(),\n        ]";

        if (!File::exists($filePath)) {
            $seederContent = <<<PHP
<?php

namespace {$namespace};

use Illuminate\\Database\\Seeder;
use Illuminate\\Support\\Facades\\DB;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('info_{$module}')->insert([
            {$arrayString}
        ]);
    }
}
PHP;
            File::put($filePath, $seederContent);
        } else {
            $oldContent = File::get($filePath);

            if (strpos($oldContent, "infoable_type' => '{$modelName}'") === false) {
                $newInsert = "        DB::table('info_{$module}')->insert([\n            {$arrayString}\n        ]);\n";

                $newContent = preg_replace(
                    '/\}\s*\}\s*$/',
                    $newInsert . "    }\n}",
                    $oldContent
                );

                File::put($filePath, $newContent);
            }
        }

        return "InfoSeeder updated: {$filePath}";
    }
}
