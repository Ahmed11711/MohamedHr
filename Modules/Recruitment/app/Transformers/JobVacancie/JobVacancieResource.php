<?php

namespace Modules\Recruitment\Transformers\JobVacancie;

use Modules\Recruitment\Transformers\BaseResource\BaseResource;
use Modules\Recruitment\Transformers\JobVacancieSkill\JobVacancieSkillResource;

class JobVacancieResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'job_title' => $resource->job_title,
            'department' => $resource->department ? $resource->department->getTranslation('name', app()->getLocale()) : null,
            'required_skills' => $resource->required_skills,
            'qualification' => $resource->qualification?->employeeinfo_id,
            'expected_salary' => $resource->expected_salary,
            'posting_date' => $resource->posting_date,
            'closing_date' => $resource->closing_date,
            'job_status' => $resource->job_status,
            'job_source' => $resource->job_source,
            'job_type' => $resource->job_type,
            'workLocation' => null,
            'number_of_vacancies' => $resource->number_of_vacancies,
            'hiringManager' => null,
            'experience_level' => $resource->experience_level,
            'job_description' => $resource->job_description,
            'skills' => $resource->skills ? JobVacancieSkillResource::collection($resource->skills) : null,
            ],
            $this->timestampsArray()
        );
    }
}
