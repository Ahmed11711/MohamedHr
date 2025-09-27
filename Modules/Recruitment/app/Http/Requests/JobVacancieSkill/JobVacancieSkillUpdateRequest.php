<?php

namespace Modules\Recruitment\Http\Requests\JobVacancieSkill;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseUpdateRequest;

class JobVacancieSkillUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'job_vacancie_id' => 'sometimes|required|integer|exists:job_vacancies,id',
            'skill' => 'sometimes|required|string|max:255',
            'proficiency_level' => 'nullable|sometimes|in:beginner,intermediate,fluent,expert',
        ]);
    }
}
