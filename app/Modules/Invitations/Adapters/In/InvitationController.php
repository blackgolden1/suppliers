<?php

namespace App\Modules\Invitations\Adapters\In;

use App\Http\Controllers\Controller;
use App\Modules\Invitations\Domain\InvitationService;
use App\Modules\Invitations\Domain\Ports\In\IInvitationService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvitationController extends Controller
{
    private IInvitationService $invitationService;

    public function __construct()
    {
        $this->invitationService = new InvitationService();
    }


    public function create(Request $request): void
    {
        $this->invitationService->create($request->name, $request->date_start, $request->date_finish, $request->active, $request->description, $request->requirements);
    }

    public function edit(Request $request, $id): void
    {
       // $this->invitationService->create($request->name, $request->date_start, $request->date_finish, $request->active, $request->description, $id);
        $this->invitationService->create('hola', 2024/02/02, 2024/02/02, 1, 'helo', 1);
    }

    public function search(): \Inertia\Response
    {
        $invitations = $this->invitationService->search();
        //dd($suppliers);
        return Inertia::render('Convocatorias', ['invitations' => $invitations]);
    }

    public function index(): array
    {
        return $this->invitationService->index();
    }

    public function delete($id): void
    {
        $this->invitationService->delete($id);
    }
    public function find($id):\Inertia\Response{
        $invitation = $this->invitationService->find($id);
        return Inertia::render('ConvocatoriasPerfil', ['invitation' => $invitation]);

    }

}
