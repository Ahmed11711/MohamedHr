<?php

namespace Modules\Recruitment\Http\Requests\ApplicationScreen;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseStoreRequest;

class ApplicationScreenStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'job_vacancy_id' => 'required|integer|exists:job_vacancies,id',
            'candidate_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'application_date' => 'nullable|date',
            'application_status' => 'required|in:pending,accepted,rejected',
            'application_source' => 'nullable|string|max:255',
            'match_score' => 'nullable|integer',
            'nationality_id' => 'required|integer|exists:nationalities,id',
        ]);
    }
}
