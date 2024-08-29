<?php

namespace App\Modules\Invitations\Adapters\Out;

use App\Models\Requirement;
use App\Modules\Invitations\Domain\InvitationEntity;
use App\Modules\Invitations\Domain\Ports\Out\IInvitationRepository;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class InvitationMysqlRepository implements IInvitationRepository
{

    public function create($name, $date_start, $date_finish, $active, $description, $requirements): void
    {
        $invitation = Invitation::create(['name' => $name, 'date_start' => $date_start, 'date_finish' => $date_finish, 'active' => $active, 'description' => $description]);
        $invitationId = $invitation->id;
        foreach ($requirements as $req) {
             Requirement::create(['invitation_id' => $invitationId, 'type' => $req['type'], 'description' => $req['description']]);

        }
    }

    public function edit($name, $date_start, $date_finish, $active, $description, $id): void
    {
        DB::table('invitations')->where('id', equalTo($id))->update(['name' => $name, 'date_start' => $date_start, 'date_finish' => $date_finish, 'active' => $active, 'description' => $description]);
    }

    public function search(): array
    {
        return Invitation::get()->all();
    }

    public function index(): array
    {
        return DB::table('invitations')->get()->all();
    }

    public function delete($id): void
    {
        Invitation::destroy($id);
    }

    public function find($id): InvitationEntity
    {
        $invitation = Invitation::find($id);
        return new InvitationEntity($invitation->toArray());
    }
}
