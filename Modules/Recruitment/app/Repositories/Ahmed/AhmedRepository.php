<?php

namespace Modules\Recruitment\Repositories\Ahmed;

use Modules\Recruitment\Repositories\Ahmed\AhmedRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Recruitment\Models\Ahmed;

class AhmedRepository extends BaseRepository implements AhmedRepositoryInterface
{
    public function __construct(Ahmed $model)
    {
        parent::__construct($model);
    }
}
