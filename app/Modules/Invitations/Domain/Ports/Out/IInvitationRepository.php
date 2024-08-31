<?php

namespace App\Modules\Invitations\Domain\Ports\Out;

use App\Modules\Invitations\Domain\InvitationEntity;

interface IInvitationRepository
{
    public function create($name, $date_start, $date_finish, $active, $description,$requirements,$files):void;
    public function edit($name, $date_start, $date_finish, $active, $description,$id): void;
    public function search(): array;
    public function index(): array;
    public function find($id): InvitationEntity;
    public function delete($id): void;

}
