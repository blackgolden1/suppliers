<?php

namespace App\Modules\Invitations\Domain\Ports\In;

interface IInvitationService
{
public function create($name, $date_start, $date_finish, $active, $description):void;
}
