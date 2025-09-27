<?php

namespace Modules\Recruitment\Http\Requests\ApplicationScreen;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseUpdateRequest;

class ApplicationScreenUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'job_vacancy_id' => 'sometimes|required|integer|exists:job_vacancies,id',
            'candidate_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|max:255',
            'phone_number' => 'nullable|sometimes|string|max:255',
            'application_date' => 'nullable|sometimes|date',
            'application_status' => 'sometimes|required|in:pending,accepted,rejected',
            'application_source' => 'nullable|sometimes|string|max:255',
            'match_score' => 'nullable|sometimes|integer',
            'nationality_id' => 'sometimes|required|integer|exists:nationalities,id',
        ]);
    }
}
