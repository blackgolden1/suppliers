<?php

namespace App\Modules\Invitations\Domain;

use App\Mail\MiCorreoMailable;
use App\Modules\Invitations\Adapters\Out\InvitationMysqlRepository;
use App\Modules\Invitations\Domain\Ports\In\IInvitationService;
use App\Modules\Invitations\Domain\Ports\Out\IInvitationRepository;
use App\Modules\Suppliers\Domain\SupplierEntity;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class InvitationService implements IInvitationService
{
private IInvitationRepository $invitationRepository;
    public function __construct()
    {
        $this->invitationRepository = new InvitationMysqlRepository();
    }

    public function create($name, $date_start, $date_finish, $active, $quantity,$description,$requirements,$files,$invitedSuppliers): array
    {
        return $this->invitationRepository->create($name, $date_start, $date_finish, $active,$quantity, $description,$requirements,$files,$invitedSuppliers);
    }
    public function filter($name): array
    {
        return $this->invitationRepository->filter($name);
    }
    public function edit($name, $date_start, $date_finish, $active,$quantity, $description, $requirements,$files,$id): void
    {
        $this->invitationRepository->edit($name, $date_start, $date_finish, $active,$quantity, $description, $requirements,$files,$id);
    }
//    public function sendEmailInvitation(): void{
//        $invitation = $this->create($name, $date_start, $date_finish, $active,$quantity, $description,$requirements,$files,$invitedSuppliers);
//        foreach ($invitedSuppliers as $invitedSupplier) {
//            Mail::to($invitedSupplier['email'] )->send(new MiCorreoMailable($request->name, $request->date_start, $request->date_finish));
//        }
//    }

    public function getActiveInvitations(): array
    {
        return $this->invitationRepository->getActiveInvitations();

    }
    public function myPostulations(): array
    {
        return $this->invitationRepository->myPostulations();
    }
    public function index(): array
    {
       return $this->invitationRepository->index();
    }
    public function delete($id):void{
        $this->invitationRepository->delete($id);
    }
//    public function find($id): InvitationEntity
//    {
//        return $this->invitationRepository->find($id);
//    }
    public function find($id): array
    {
        return $this->invitationRepository->find($id);
    }
}
