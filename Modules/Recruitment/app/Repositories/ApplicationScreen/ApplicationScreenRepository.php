<?php

namespace Modules\Recruitment\Repositories\ApplicationScreen;

use Modules\Recruitment\Repositories\ApplicationScreen\ApplicationScreenRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Recruitment\Models\ApplicationScreen;

class ApplicationScreenRepository extends BaseRepository implements ApplicationScreenRepositoryInterface
{
    public function __construct(ApplicationScreen $model)
    {
        parent::__construct($model);
    }
}
