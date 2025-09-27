<?php

namespace Modules\Recruitment\Transformers\ApplicationPreviousExperience;

use Modules\Recruitment\Transformers\BaseResource\BaseResource;

class ApplicationPreviousExperienceResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'application' => null,
            'job_title' => $resource->job_title,
            'experience_count' => $resource->experience_count,
            ],
            $this->timestampsArray()
        );
    }
}
