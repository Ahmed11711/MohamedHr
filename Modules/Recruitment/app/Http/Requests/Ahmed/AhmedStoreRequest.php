<?php

namespace Modules\Recruitment\Http\Requests\Ahmed;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseStoreRequest;

class AhmedStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'test' => 'required|string|max:255',
            'key' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);
    }
}
