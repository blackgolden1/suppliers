<?php

namespace App\Modules\Invitations\Adapters\Out;

use App\Modules\Invitations\Domain\Ports\Out\IInvitationRepository;
use Illuminate\Support\Facades\DB;

class InvitationMysqlRepository implements IInvitationRepository
{

    public function create($name, $date_start, $date_finish, $active, $description): void
    {
        DB::table('invitations')->insert(['name'=>$name,'date_start'=>$date_start,'date_finish'=>$date_finish,'active'=>$active,'description'=>$description ]);
    }
}
