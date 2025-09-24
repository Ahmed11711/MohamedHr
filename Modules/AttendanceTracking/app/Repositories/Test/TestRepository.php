<?php

namespace Modules\AttendanceTracking\Repositories\Test;

use Modules\AttendanceTracking\Repositories\Test\TestRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\Test;

class TestRepository extends BaseRepository implements TestRepositoryInterface
{
    public function __construct(Test $model)
    {
        parent::__construct($model);
    }
}
