<?php

namespace App\Modules\Invitations\Domain;

use App\Modules\Invitations\Adapters\Out\InvitationMysqlRepository;
use App\Modules\Invitations\Domain\Ports\In\IInvitationService;
use App\Modules\Invitations\Domain\Ports\Out\IInvitationRepository;

class InvitationService implements IInvitationService
{
private IInvitationRepository $invitationRepository;
    public function __construct()
    {
        $this->invitationRepository = new InvitationMysqlRepository();
    }

    public function create($name, $date_start, $date_finish, $active, $description): void
    {
        $this->invitationRepository->create($name, $date_start, $date_finish, $active, $description);
    }
}
