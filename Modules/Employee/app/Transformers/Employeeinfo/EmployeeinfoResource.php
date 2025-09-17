<?php

namespace Modules\Employee\Transformers\Employeeinfo;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeinfoResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
