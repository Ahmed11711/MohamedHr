<?php

namespace Modules\Recruitment\Transformers\Ahmed;

use Modules\Recruitment\Transformers\BaseResource\BaseResource;

class AhmedResource extends BaseResource
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
            'recruitmentAttachments' => $resource->recruitmentAttachments?->file,
            ],
            $this->timestampsArray()
        );
    }
}
