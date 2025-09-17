<?php

namespace Modules\Employee\Repositories\Employeeinfo;

use Modules\Employee\Repositories\Employeeinfo\EmployeeinfoRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\Employeeinfo;

class EmployeeinfoRepository extends BaseRepository implements EmployeeinfoRepositoryInterface
{
    public function __construct(Employeeinfo $model)
    {
        parent::__construct($model);
    }
}
