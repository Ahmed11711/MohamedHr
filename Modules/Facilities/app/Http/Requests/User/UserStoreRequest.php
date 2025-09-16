<?php

namespace Modules\Facilities\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'userName' => 'required',
            'email' => 'required|unique:users,email',
            'fullName' => 'required|string',
            'password' => 'required',
            'mobileNumber' => 'required',
            'security_questions' => 'required',
            'security_answer' => 'required',
            'gender' => 'required',
            'nationality_id' => 'required|integer',
            'language_id' => 'required|integer',
            'termsAccepted' => 'required',
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
