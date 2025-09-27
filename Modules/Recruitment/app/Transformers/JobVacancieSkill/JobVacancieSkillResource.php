<?php

namespace Modules\Recruitment\Transformers\JobVacancieSkill;

use Modules\Recruitment\Transformers\BaseResource\BaseResource;

class JobVacancieSkillResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'jobVacancie' => $resource->jobVacancie?->job_title,
            'skill' => $resource->skill,
            'proficiency_level' => $resource->proficiency_level,
            ],
            $this->timestampsArray()
        );
    }
}
