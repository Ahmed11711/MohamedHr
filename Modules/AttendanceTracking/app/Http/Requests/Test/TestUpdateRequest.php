<?php

namespace Modules\AttendanceTracking\Http\Requests\Test;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class TestUpdateRequest extends BaseUpdateRequest
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
