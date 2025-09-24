<?php

namespace Modules\AttendanceTracking\Http\Requests\Test;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class TestStoreRequest extends BaseStoreRequest
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
