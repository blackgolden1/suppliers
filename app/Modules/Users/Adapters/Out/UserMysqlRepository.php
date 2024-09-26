<?php

namespace App\Modules\Users\Adapters\Out;

use App\Modules\Users\Domain\ports\Out\IUserRepository;
use App\Modules\Users\Adapters\Out\User;
use App\Modules\Users\Domain\UserEntity;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class UserMysqlRepository implements IUserRepository
{
    public function create( $id,$email,$user,$password,$role): UserEntity
    {
        User::create([
            'id' => $id,
            'user' => $user,
            'email' => $email,
            'password' => $password,
            'role_id' => $role,

        ]);
    }

    public function find($id): UserEntity
    {

     $user = DB::table('users')->find($id);
     return new UserEntity(get_object_vars($user));

    }
}
