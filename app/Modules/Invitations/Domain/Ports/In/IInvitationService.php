<?php

namespace App\Modules\Invitations\Domain\Ports\In;

use App\Modules\Invitations\Domain\InvitationEntity;

interface IInvitationService
{
public function create($name, $date_start, $date_finish, $active,$quantity, $description,$requirements,$files):void;
    public function edit($name, $date_start, $date_finish, $active,$quantity, $description, $requirements,$files,$id): void;
    public function getActiveInvitations(): array;
    public function filter($name): array;
    public function myPostulations(): array;

    public function index(): array;
//    public function find($id): InvitationEntity;
    public function find($id): array;

    public function delete($id): void;
}
