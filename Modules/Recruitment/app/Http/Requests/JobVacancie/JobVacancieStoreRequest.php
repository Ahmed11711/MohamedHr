<?php

namespace Modules\Recruitment\Http\Requests\JobVacancie;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseStoreRequest;

class JobVacancieStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'job_title' => 'required|string|max:255',
            'department_id' => 'required|integer|exists:departments,id',
            'required_skills' => 'nullable|string',
            'qualification_id' => 'required|exists:qualifications,id',
            'expected_salary' => 'nullable|numeric',
            'posting_date' => 'nullable|date',
            'closing_date' => 'nullable|date',
            'job_status' => 'required|in:open,closed',
            'job_source' => 'nullable|string|max:255',
            'job_type' => 'required|in:full-time,part-time,contract',
            'work_location_id' => 'nullable',
            'number_of_vacancies' => 'required|integer',
            'hiring_manager_id' => 'nullable',
            'experience_level' => 'nullable|string|max:255',
            'job_description' => 'nullable',
            'recruitment_attachment_id' => 'nullable|integer|exists:recruitment_attachments,id',
        ]);
    }
}
