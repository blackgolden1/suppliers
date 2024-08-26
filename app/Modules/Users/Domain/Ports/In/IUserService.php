<?php

namespace App\Modules\Users\Domain\Ports\In;

use App\Modules\Users\Adapters\Out\User;
use App\Modules\Users\Domain\UserEntity;

interface IUserService
{
    public function find($id):UserEntity;

}
