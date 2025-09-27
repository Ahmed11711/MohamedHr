<?php

namespace Modules\Recruitment\Repositories\ApplicationPreviousExperience;

use Modules\Recruitment\Repositories\ApplicationPreviousExperience\ApplicationPreviousExperienceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Recruitment\Models\ApplicationPreviousExperience;

class ApplicationPreviousExperienceRepository extends BaseRepository implements ApplicationPreviousExperienceRepositoryInterface
{
    public function __construct(ApplicationPreviousExperience $model)
    {
        parent::__construct($model);
    }
}
