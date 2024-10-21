<?php

namespace App\Modules\Invitations\Adapters\Out;

use App\Models\Requirement;
use App\Modules\Applications\Adapters\Out\Postulation;
use App\Modules\Invitations\Domain\InvitationEntity;
use App\Modules\Invitations\Domain\Ports\Out\IInvitationRepository;
use App\Modules\Users\Adapters\Out\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class InvitationMysqlRepository implements IInvitationRepository
{

    public function create($name, $date_start, $date_finish, $active, $quantity, $description, $requirements, $files): void
    {

        $invitation = Invitation::create(['name' => $name, 'date_start' => $date_start, 'date_finish' => $date_finish, 'active' => $active, 'quantity' => $quantity, 'description' => $description, 'files' => json_encode($files)]);
        $invitationId = $invitation->id;
        foreach ($requirements as $req) {
            Requirement::create(['invitation_id' => $invitationId, 'type' => $req['type'], 'description' => $req['description']]);
        }
    }


    public function edit($name, $date_start, $date_finish, $active, $quantity, $description, $requirements, $files, $id): void
    {
        $invitation = Invitation::find($id);
        $oldFiles = json_decode($invitation->files);
        array_push($oldFiles, ...$files);
        if (!$invitation) {
            error('Invitación no encontrada');
        }
        $invitation->name = $name;
        $invitation->date_start = $date_start;
        $invitation->date_finish = $date_finish;
        $invitation->active = $active;
        $invitation->quantity = $quantity;
        $invitation->description = $description;
        $invitation->files = json_encode($oldFiles);

        if (!empty($requirements)) {
            Requirement::where('invitation_id', $id)->delete();
            foreach ($requirements as $req) {
                Requirement::create([
                    'invitation_id' => $id,
                    'type' => $req['type'],
                    'description' => $req['description'],
                ]);
            }
        }
        $invitation->save();
    }

    public function getActiveInvitations(): array
    {
        $dateNow = Carbon::now()->toDateTimeString();
        return Invitation::where('date_finish', '>', $dateNow)
            ->with('requirements')
            ->with('postulations')
            ->get()
            ->toArray();
    }

    public function myPostulations(): array
    {
        $supplier = Auth::user()->supplier;
        $supplierId = $supplier->id;
        return Postulation::with('invitations')->where('supplier_id','=',$supplierId)->get()->toArray();
    }

    public function index(): array
    {
        return Invitation::with('requirements')->with('postulations')->get()->toArray();
    }

    public function filter($name): array
    {
        return (Invitation::where('name', 'LIKE', '%' . $name . '%')->with('requirements')->get()->toArray());
    }

    public function delete($id): void
    {
        Invitation::destroy($id);
    }

    public function find($id): array
    {
        $invitation = Invitation::with('postulations')->with('suppliers')->with('requirements')->find($id)->toArray();
        $invitation['files'] = json_decode($invitation['files']);
        return $invitation;
//        return new InvitationEntity($invitation->toArray());
    }
}
