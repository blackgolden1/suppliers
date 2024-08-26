<?php

namespace App\Modules\Invitations\Domain\Ports\Out;

interface IInvitationRepository
{
    public function create($name, $date_start, $date_finish, $active, $description):void;
}
