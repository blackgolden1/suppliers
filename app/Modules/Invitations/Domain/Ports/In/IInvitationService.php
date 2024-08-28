<?php

namespace App\Modules\Invitations\Domain\Ports\In;

use App\Modules\Invitations\Domain\InvitationEntity;

interface IInvitationService
{
public function create($name, $date_start, $date_finish, $active, $description):void;
    public function edit($name, $date_start, $date_finish, $active, $description,$id): void;
    public function search(): array;
    public function index(): array;
    public function find($id): InvitationEntity;

    public function delete($id): void;
}