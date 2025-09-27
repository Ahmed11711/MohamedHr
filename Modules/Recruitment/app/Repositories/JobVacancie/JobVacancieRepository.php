<?php

namespace Modules\Recruitment\Repositories\JobVacancie;

use Modules\Recruitment\Repositories\JobVacancie\JobVacancieRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Recruitment\Models\JobVacancie;

class JobVacancieRepository extends BaseRepository implements JobVacancieRepositoryInterface
{
    public function __construct(JobVacancie $model)
    {
        parent::__construct($model);
    }
}
