<?php

namespace Modules\Recruitment\Http\Requests\ApplicationPreviousExperience;

use Modules\Recruitment\Http\Requests\BaseRequest\BaseUpdateRequest;

class ApplicationPreviousExperienceUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'application_id' => 'sometimes|required|integer',
            'job_title' => 'sometimes|required|string|max:255',
            'experience_count' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
