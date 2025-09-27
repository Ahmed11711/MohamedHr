<?php

namespace Modules\Recruitment\Repositories\Recruitment;

use Modules\Recruitment\Repositories\Recruitment\RecruitmentRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Recruitment\Models\Recruitment;

class RecruitmentRepository extends BaseRepository implements RecruitmentRepositoryInterface
{
    public function __construct(Recruitment $model)
    {
        parent::__construct($model);
    }
}
