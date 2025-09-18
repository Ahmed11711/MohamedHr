<?php

namespace Modules\Facilities\Transformers\Facilities;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilitiesResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'img' => $resource->img,
            'unified_national_number' => $resource->unified_national_number,
            'company_name_ar' => $resource->company_name_ar,
            'company_name_en' => $resource->company_name_en,
            'companyType' => $resource->companyType?->name,
            // 'companySize' => $resource->companySize?->name,
            'companyHeadquarters' => $resource->companyHeadquarters?->name,
            'companyActivities' => $resource->companyActivities?->name,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
