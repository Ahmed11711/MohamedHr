<?php

namespace Modules\Recruitment\Http\Requests\JobVacancieSkill;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseStoreRequest;

class JobVacancieSkillStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'job_vacancie_id' => 'required|integer|exists:job_vacancies,id',
            'skill' => 'required|string|max:255',
            'proficiency_level' => 'nullable|in:beginner,intermediate,fluent,expert',
        ]);
    }
}
