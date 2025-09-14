<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RequestGenerator
{
    public static function make(string $module, string $model)
    {
        $table = Str::snake(Str::pluralStudly($model));

        $baseFolder  = module_path($module, "app/Http/Requests");
        $modelFolder = $baseFolder . "/{$model}";

        if (!File::isDirectory($baseFolder)) {
            File::makeDirectory($baseFolder, 0755, true);
        }

        if (!File::isDirectory($modelFolder)) {
            File::makeDirectory($modelFolder, 0755, true);
        }

        $storeRequestPath  = "{$modelFolder}/{$model}StoreRequest.php";
        $updateRequestPath = "{$modelFolder}/{$model}UpdateRequest.php";

        if (!Schema::hasTable($table)) {
            return "Table '{$table}' does not exist in database!";
        }

        $columns = Schema::getColumnListing($table);

        $generateRules = function ($isUpdate = false) use ($columns, $table, $model) {
            $rules = [];
            $routeParam = Str::camel($model); // ex: Nationality => nationality

            foreach ($columns as $column) {
                if (in_array($column, ['id','created_at','updated_at','deleted_at'])) continue;

                $type = DB::getSchemaBuilder()->getColumnType($table, $column);
                $nullable = DB::selectOne("
                    SELECT IS_NULLABLE
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = ? AND COLUMN_NAME = ?
                ", [$table, $column])->IS_NULLABLE ?? 'YES';

                $isNullable = $nullable === 'YES';

                switch ($type) {
                    case 'string': $rule = 'string|max:255'; break;
                    case 'text': $rule = 'string'; break;
                    case 'integer':
                    case 'bigint': $rule = 'integer'; break;
                    case 'boolean': $rule = 'boolean'; break;
                    case 'date':
                    case 'datetime':
                    case 'timestamp': $rule = 'date'; break;
                    default: $rule = ''; break;
                }

                if (Str::endsWith($column, '_id')) {
                    $relatedTable = Str::snake(Str::plural(Str::replaceLast('_id','',$column)));
                    if (Schema::hasTable($relatedTable)) {
                        $rule .= ($rule ? '|' : '') . "exists:{$relatedTable},id";
                    }
                }

                if (in_array($column, ['img','image','images','file'])) {
                    $rule .= ($rule ? '|' : '') . 'max:255|file';
                }

                $indexes = DB::select("SHOW INDEX FROM {$table} WHERE Column_name='{$column}' AND Non_unique=0");

                if (!empty($indexes) && !Str::endsWith($column,'_id')) {
                    if ($isUpdate) {
                         $rule .= ($rule ? '|' : '') . "unique:{$table},{$column},'.\$this->route('{$routeParam}').',id";
                    } else {
                        $rule .= ($rule ? '|' : '') . "unique:{$table},{$column}";
                    }
                }

                if ($isUpdate) {
                    $rule = $isNullable ? 'nullable|sometimes' . ($rule ? '|' . $rule : '') : ($rule ? 'sometimes|required|' . $rule : 'sometimes|required');
                } else {
                    $rule = $isNullable ? 'nullable' . ($rule ? '|' . $rule : '') : ($rule ? 'required|' . $rule : 'required');
                }

                $rules[$column] = $rule;
            }

            return $rules;
        };

        File::put($storeRequestPath, self::generateStub($module, $model.'StoreRequest', $generateRules(false), $model));
        File::put($updateRequestPath, self::generateStub($module, $model.'UpdateRequest', $generateRules(true), $model));

        return "Requests for {$model} created successfully inside Module {$module}.";
    }

    private static function generateStub($module, $className, $rules, $modelName)
    {
        $rulesString = "";
        foreach ($rules as $col => $r) {
            $rulesString .= "            '{$col}' => '{$r}',\n";
        }

        return "<?php

namespace Modules\\{$module}\\Http\\Requests\\{$modelName};

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class {$className} extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
{$rulesString}        ];
    }

    public function failedValidation(Validator \$validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'error' => \$validator->errors()
        ], 422));
    }
}
";
    }
}
