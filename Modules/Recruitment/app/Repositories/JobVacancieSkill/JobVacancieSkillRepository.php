<?php

namespace Modules\Recruitment\Repositories\JobVacancieSkill;

use Modules\Recruitment\Repositories\JobVacancieSkill\JobVacancieSkillRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Recruitment\Models\JobVacancieSkill;

class JobVacancieSkillRepository extends BaseRepository implements JobVacancieSkillRepositoryInterface
{
    public function __construct(JobVacancieSkill $model)
    {
        parent::__construct($model);
    }
}
