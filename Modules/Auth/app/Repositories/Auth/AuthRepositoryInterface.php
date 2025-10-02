<?php

namespace Modules\Auth\Repositories\Auth;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface AuthRepositoryInterface extends BaseRepositoryInterface
{
    public function verifyAccount($user_id);
    public function getByFiled($field, $value);
}
