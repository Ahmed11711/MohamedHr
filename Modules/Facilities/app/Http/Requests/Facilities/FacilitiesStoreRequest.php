<?php

namespace Modules\Facilities\Http\Requests\Facilities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class FacilitiesStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img' => 'nullable|max:255|file',
            'unified_national_number' => 'nullable',
            'company_name_ar' => 'required',
            'company_name_en' => 'required',
            'company_type_id' => 'required|exists:company_types,id',
            'company_size_id' => 'required',
            'company_headquarters_id' => 'required|exists:company_headquarters,id',
            'company_activities_id' => 'required|exists:company_activities,id',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'error' => $validator->errors()
        ], 422));
    }
}
