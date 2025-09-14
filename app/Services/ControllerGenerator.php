<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ControllerGenerator
{
    public static function make(string $module, string $model)
    {
        $controllerDir  = module_path($module, "app/Http/Controllers/{$model}");
        $controllerPath = $controllerDir . "/{$model}Controller.php";

        $namespaceRepo = "Modules\\{$module}\\Repositories\\{$model}\\{$model}RepositoryInterface";
        $namespaceResource = "Modules\\{$module}\\Transformers\\{$model}\\{$model}Resource";

        if (!File::isDirectory($controllerDir)) {
            File::makeDirectory($controllerDir, 0755, true);
        }

        if (File::exists($controllerPath)) {
            return "{$model}Controller already exists!";
        }

        $storeRequestClass  = "Modules\\{$module}\\Http\\Requests\\{$model}\\{$model}StoreRequest";
        $updateRequestClass = "Modules\\{$module}\\Http\\Requests\\{$model}\\{$model}UpdateRequest";

        $controllerStub = "<?php

namespace Modules\\{$module}\\Http\\Controllers\\{$model};

use {$namespaceRepo};
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use {$storeRequestClass};
use {$updateRequestClass};
use {$namespaceResource};

class {$model}Controller extends Controller
{
    use ApiResponseTrait;

    protected \${$model}Repository;

    public function __construct({$model}RepositoryInterface \${$model}Repository)
    {
        \$this->{$model}Repository = \${$model}Repository;
    }

    public function index()
    {
        \$data = \$this->{$model}Repository->all();
        return \$this->successResponse({$model}Resource::collection(\$data), '{$model} list retrieved successfully');
    }

    public function show(\$id)
    {
        \$data = \$this->{$model}Repository->find(\$id);
        if (!\$data) {
            return \$this->errorResponse('{$model} not found', 404);
        }
        return \$this->successResponse(new {$model}Resource(\$data), '{$model} retrieved successfully');
    }

    public function store({$model}StoreRequest \$request)
    {
        \$data = \$this->{$model}Repository->create(\$request->validated());
        return \$this->successResponse(new {$model}Resource(\$data), '{$model} created successfully', 201);
    }

    public function update({$model}UpdateRequest \$request, \$id)
    {
        \$data = \$this->{$model}Repository->update(\$id, \$request->validated());
        return \$this->successResponse(new {$model}Resource(\$data), '{$model} updated successfully');
    }

    public function destroy(\$id)
    {
        \$this->{$model}Repository->delete(\$id);
        return \$this->successResponse(null, '{$model} deleted successfully');
    }
}
";

        File::put($controllerPath, $controllerStub);

        return "{$model}Controller created successfully in folder {$model}.";
    }
}
