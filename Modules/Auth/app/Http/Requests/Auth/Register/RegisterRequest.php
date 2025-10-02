<?php

namespace Modules\Auth\Http\Requests\Auth\Register;

use App\Http\Requests\BaseValidation;
 
class RegisterRequest extends BaseValidation
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'userName' => 'required|string|max:255',
            'fullName' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }

   

}
