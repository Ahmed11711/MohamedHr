<?php

namespace Modules\Recruitment\Http\Requests\ApplicationPreviousExperience;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseStoreRequest;

class ApplicationPreviousExperienceStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'application_id' => 'required|integer',
            'job_title' => 'required|string|max:255',
            'experience_count' => 'nullable|string|max:255',
        ]);
    }
}
