<?php

namespace App\Modules\Invitations\Domain\Ports\Out;

use App\Modules\Invitations\Domain\InvitationEntity;

interface IInvitationRepository
{
    public function create($name, $date_start, $date_finish, $active,$quantity, $description,$requirements,$files,$invitedSuppliers):array;
    public function edit($name, $date_start, $date_finish, $active,$quantity, $description, $requirements,$files,$id): void;
    public function getActiveInvitations(): array;
    public function myPostulations(): array;
    public function filter($name): array;
    public function index(): array;
//    public function find($id): InvitationEntity;
    public function find($id): array;
    public function delete($id): void;

}
