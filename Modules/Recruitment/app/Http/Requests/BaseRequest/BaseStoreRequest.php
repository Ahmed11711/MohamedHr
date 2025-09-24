<?php

namespace Modules\Recruitment\Http\Requests\BaseRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BaseStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function baseRules(): array
    {
        return [
            'employee_id' => 'required|integer|exists:employeeinfos,id',
            'recruitment_attachments_id' => 'required|integer|exists:recruitment_attachments,reference_number',

        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'error'   => $validator->errors()
        ], 422));
    }
}
