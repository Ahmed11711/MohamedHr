<?php

namespace Modules\Recruitment\Http\Requests\Ahmed;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseUpdateRequest;

class AhmedUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'test' => 'sometimes|required|string|max:255',
            'key' => 'sometimes|required|integer',
            'status' => 'sometimes|required|string|max:255',
        ]);
    }
}
