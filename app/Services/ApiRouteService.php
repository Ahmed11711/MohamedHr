<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ApiRouteService
{
    public static function make(string $module, string $model)
    {
        $apiFile = module_path($module, "Routes/api.php");

         if (!File::exists($apiFile)) {
            $content = "<?php\n\nuse Illuminate\Support\Facades\Route;\n\n";
            $content .= "Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {\n";
            $content .= "    // API Resources\n";
            $content .= "});\n";
            File::put($apiFile, $content);
        }

        $content = File::get($apiFile);

        // Plural & name
        $plural   = Str::plural(Str::snake($model));   // ex: Language -> languages
        $name     = Str::snake($model);                // ex: Language -> language

        // Controller namespace with folder
        $controllerNamespace = "Modules\\{$module}\\Http\\Controllers\\{$model}\\{$model}Controller";
        $controllerUse = "use {$controllerNamespace};";

        // لو الـ use مش موجود نضيفه
        if (!str_contains($content, $controllerUse)) {
            $content = preg_replace(
                '/(use Illuminate\\\\Support\\\\Facades\\\\Route;)/',
                "$1\n{$controllerUse}",
                $content,
                1
            );
        }

        // Route line
        $routeLine = "    Route::apiResource('{$plural}', {$model}Controller::class)->names('{$name}');";

        if (!str_contains($content, $routeLine)) {
            // regex يمسك أي بلوك v1 (بـ middleware أو من غير)
            $pattern = "/(Route::(?:middleware\(\['auth:sanctum'\]\)->)?prefix\('v1'\)->group\(function \(\) \{)/";

            if (preg_match($pattern, $content)) {
                // لو لقى بلوك v1
                $content = preg_replace(
                    $pattern,
                    "$1\n{$routeLine}",
                    $content
                );
            } else {
                // لو معندوش أي بلوك v1 خالص
                $content .= "\nRoute::middleware(['auth:sanctum'])->prefix('v1')->group(function () {\n";
                $content .= "{$routeLine}\n";
                $content .= "});\n";
            }
        }

        File::put($apiFile, $content);

        return "Route for {$model} added successfully in {$module}/Routes/api.php";
    }
}
