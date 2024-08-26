<?php

namespace App\Modules\Users\Domain;

use App\Modules\Users\Adapters\Out\User;
use App\Modules\Users\Adapters\Out\UserMysqlRepository;
use App\Modules\Users\Domain\Ports\In\IUserService;
use App\Modules\Users\Domain\Ports\Out\IUserRepository;

class UserService implements IUserService
{
private IUserRepository $userRepository ;

    /**
     * @param IUserRepository $userRepository
     */
    public function __construct()
    {
        $this->userRepository = new UserMysqlRepository();
    }

    public function find($id): UserEntity
    {
        return $this->userRepository->find($id);

    }
}
