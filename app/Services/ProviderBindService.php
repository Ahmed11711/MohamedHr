<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ProviderBindService
{
    public static function make(string $module, string $model)
    {
        $providerPath = module_path($module, "app/Providers/{$module}ServiceProvider.php");

        if (!File::exists($providerPath)) {
            return "ServiceProvider for {$module} not found!";
        }

        $content = File::get($providerPath);

        // Namespaces (حسب الـ RepositoryGenerator)
        $interfaceNamespace  = "Modules\\{$module}\\Repositories\\{$model}\\{$model}RepositoryInterface";
        $repositoryNamespace = "Modules\\{$module}\\Repositories\\{$model}\\{$model}Repository";

        // Use statements
        $interfaceUse  = "use {$interfaceNamespace};";
        $repositoryUse = "use {$repositoryNamespace};";

        // ✅ إضافة Use statements لو مش موجودة
        if (!str_contains($content, $interfaceUse)) {
            $content = preg_replace(
                '/(namespace\s+Modules\\\\' . $module . '\\\\Providers;)/',
                "$1\n\n{$interfaceUse}\n{$repositoryUse}",
                $content,
                1
            );
        }

        // Bind line
        $bindLine = "        \$this->app->bind({$model}RepositoryInterface::class, {$model}Repository::class);";

        // ✅ إضافة Bind line لو مش موجودة
        if (!str_contains($content, $bindLine)) {
            // نبحث عن function register() ونضيف السطر قبل نهاية function
            $content = preg_replace_callback(
                '/public function register\(\): void\s*\{(.*?)\}/s',
                function ($matches) use ($bindLine) {
                    $body = trim($matches[1]);

                    // لو الـ bind موجودة داخل الـ function بالفعل
                    if (str_contains($body, $bindLine)) {
                        return $matches[0];
                    }

                    // نضيف bind line قبل نهاية function
                    $body .= "\n{$bindLine}";
                    return "public function register(): void {\n{$body}\n}";
                },
                $content
            );
        }

        File::put($providerPath, $content);

        return "Bind + imports for {$model}Repository added successfully in {$module}ServiceProvider.";
    }
}
