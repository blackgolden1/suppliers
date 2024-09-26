<?php

namespace App\Modules\Users\Adapters\In;

use App\Http\Controllers\Controller;
use App\Modules\Users\Adapters\Out\UserMysqlRepository;
use App\Modules\Users\Domain\Ports\In\IUserService;
use App\Modules\Users\Domain\Ports\Out\IUserRepository;
use App\Modules\Users\Domain\UserService;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{
    private IUserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function find()
    {
        dd ($this->userService->find(1));
    }







}
