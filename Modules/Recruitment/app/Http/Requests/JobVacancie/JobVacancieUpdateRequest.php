<?php

namespace Modules\Recruitment\Http\Requests\JobVacancie;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseUpdateRequest;

class JobVacancieUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'job_title' => 'sometimes|required|string|max:255',
            'department_id' => 'sometimes|required|integer|exists:departments,id',
            'required_skills' => 'nullable|sometimes|string',
            'qualification_id' => 'sometimes|required|exists:qualifications,id',
            'expected_salary' => 'nullable|sometimes|numeric',
            'posting_date' => 'nullable|sometimes|date',
            'closing_date' => 'nullable|sometimes|date',
            'job_status' => 'sometimes|required|in:open,closed',
            'job_source' => 'nullable|sometimes|string|max:255',
            'job_type' => 'sometimes|required|in:full-time,part-time,contract',
            'work_location_id' => 'nullable|sometimes',
            'number_of_vacancies' => 'sometimes|required|integer',
            'hiring_manager_id' => 'nullable|sometimes',
            'experience_level' => 'nullable|sometimes|string|max:255',
            'job_description' => 'nullable|sometimes',
            'recruitment_attachment_id' => 'nullable|sometimes|integer|exists:recruitment_attachments,id',
        ]);
    }
}
