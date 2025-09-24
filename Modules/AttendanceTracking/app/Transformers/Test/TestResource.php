<?php

namespace Modules\AttendanceTracking\Transformers\Test;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class TestResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'test' => $resource->test,
            'key' => $resource->key,
            'status' => $resource->status,
            'attendanceAttachments' => null,
            ],
            $this->timestampsArray()
        );
    }
}
