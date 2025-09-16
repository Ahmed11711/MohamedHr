<?php

namespace Modules\Facilities\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'userName' => 'sometimes|required',
            'email' => 'sometimes|required|unique:users,email,'.$this->route('user').',id',
            'fullName' => 'sometimes|required|string',
            'password' => 'sometimes|required',
            'mobileNumber' => 'sometimes|required',
            'securityQuestion_id' => 'sometimes|required|exists:security_questions,id',
            'security_answer' => 'sometimes|required',
            'gender' => 'sometimes|required',
            'nationality_id' => 'sometimes|required|integer',
            'language_id' => 'sometimes|required|integer',
            'termsAccepted' => 'sometimes|required',
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
