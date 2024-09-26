<?php

namespace App\Modules\Users\Domain\Ports\Out;

use App\Modules\Users\Adapters\Out\User;
use App\Modules\Users\Domain\UserEntity;

interface IUserRepository
{
    public function create($id, $email, $user, $password, $role): UserEntity;

    public function find($id): UserEntity;
}
