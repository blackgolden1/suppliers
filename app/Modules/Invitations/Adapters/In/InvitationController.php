<?php

namespace App\Modules\Invitations\Adapters\In;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Requirement;
use App\Modules\Invitations\Adapters\Out\Invitation;
use App\Modules\Invitations\Domain\InvitationService;
use App\Modules\Invitations\Domain\Ports\In\IInvitationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $paths=[];
        if ($request->hasFile('files')){
            foreach ($request->file('files') as $file){

                $filename = $file->getClientOriginalName();
                $filename = str_replace(' ','_',$filename);
//                $destinationPath = 'storage/';
//                $file->move(public_path() . $destinationPath, $filename);
//                $paths[]= $destinationPath . $filename;

                $path = $file->storeAs('public/convocatorias/'.$request->name,   $filename );
                $paths[]= $path;
            }
        }
        $this->invitationService->create($request->name, $request->date_start, $request->date_finish, $request->active, $request->quantity, $request->description, $request->requirements, $paths);

    }

    public function edit(Request $request, $id): void

    {
       // $this->invitationService->create($request->name, $request->date_start, $request->date_finish, $request->active, $request->description, $id);
        $this->invitationService->create('hola', 2024/02/02, 2024/02/02, 1,56, 'helo', 1,'');
    }

    public function search(): \Inertia\Response
    {
        $invitations = $this->invitationService->search();

        //dd($suppliers);

        return Inertia::render('Convocatorias', ['invitations' => $invitations]);
    }
    public function show(): \Inertia\Response
    {
        $invitations = $this->invitationService->search();
        $authh = Auth::user();

        return Inertia::render('ConvocatoriasIframe', ['invitations' => $invitations]);
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
