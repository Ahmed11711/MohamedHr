<?php

namespace Modules\Recruitment\Transformers\ApplicationScreen;

use Modules\Recruitment\Transformers\ApplicationPreviousExperience\ApplicationPreviousExperienceResource;
use Modules\Recruitment\Transformers\BaseResource\BaseResource;

class ApplicationScreenResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
                'id' => $resource->id,
                'job_vacancie' => $resource->jobVacancie?->job_title, 
                'candidate_name' => $resource->candidate_name,
                'email' => $resource->email,
                'phone_number' => $resource->phone_number,
                'application_date' => $resource->application_date,
                'application_status' => $resource->application_status,
                'application_source' => $resource->application_source,
                'match_score' => $resource->match_score,
                'country' => $resource->country?->getTranslation('name', app()->getLocale()),
                // 'application_previous_experiences' => ApplicationPreviousExperienceResource::collection($resource->applicationPreviousExperiences),
            ],
            $this->timestampsArray()
        );
    }
}
