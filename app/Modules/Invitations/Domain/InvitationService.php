<?php

namespace App\Modules\Invitations\Domain;

use App\Modules\Invitations\Adapters\Out\InvitationMysqlRepository;
use App\Modules\Invitations\Domain\Ports\In\IInvitationService;
use App\Modules\Invitations\Domain\Ports\Out\IInvitationRepository;
use App\Modules\Suppliers\Domain\SupplierEntity;
use Inertia\Inertia;

class InvitationService implements IInvitationService
{
private IInvitationRepository $invitationRepository;
    public function __construct()
    {
        $this->invitationRepository = new InvitationMysqlRepository();
    }

    public function create($name, $date_start, $date_finish, $active, $description,$requirements,$files): void
    {
        $this->invitationRepository->create($name, $date_start, $date_finish, $active, $description,$requirements,$files);
    }

    public function edit($name, $date_start, $date_finish, $active, $description,$id): void
    {
        $this->invitationRepository->edit($name, $date_start, $date_finish, $active, $description, $id);
    }

    public function search(): array
    {
        return $this->invitationRepository->search();

    }

    public function index(): array
    {
       return $this->invitationRepository->index();
    }
    public function delete($id):void{
        $this->invitationRepository->delete($id);
    }
    public function find($id): InvitationEntity
    {
        return $this->invitationRepository->find($id);
    }
}
