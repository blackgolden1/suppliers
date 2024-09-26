<?php

namespace App\Modules\Invitations\Adapters\In;

use App\Http\Controllers\Controller;
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

        $paths = [];
        //dd($request->all());
        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                $filename = $file->getClientOriginalName();
                $filename = str_replace(' ', '_', $filename);
                $path = $file->storeAs('public/convocatorias/' . $request->name, $filename);
                $paths[] = $path;
            }
        };

        $this->invitationService->create($request->name, $request->date_start, $request->date_finish, $request->active, $request->quantity, $request->description, $request->requirements, $paths);

    }

    public function edit(Request $request, $id): void

    {

        $paths = [];

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                $filename = $file->getClientOriginalName();
                $filename = str_replace(' ', '_', $filename);
                $path = $file->storeAs('public/convocatorias/' . $request->name, $filename);
                $paths[] = $path;
            }
        };
        ///dd($paths);
        $this->invitationService->edit($request->name, $request->date_start, $request->date_finish, $request->active, $request->quantity, $request->description, $request->requirements, $paths, $id);
    }

    public function search(): \Inertia\Response
    {
        $invitations = $this->invitationService->search();
        $isAdmin = Auth::user()->isAdmin();
        $user = Auth::user()->isAdmin();
        $isSupplier = Auth::user()->isSupplier();

        if (!$isAdmin) {
            if (!$isSupplier) {
                return Inertia::render('ProveedoresRegistro');
            }
            return Inertia::render('ConvocatoriasIframe', ['invitations' => $invitations]);
        }
        return Inertia::render('Convocatorias', ['invitations' => $invitations]);

    }

    public function deleteFile($id, $index): void
    {
        $invitation = Invitation::find($id);
        $files = json_decode($invitation->files);
        array_splice($files, $index, 1);
        $invitation->files = $files;
        $invitation->save();
    }

    public function show(): \Inertia\Response //convo-iframe
    {
        $invitations = $this->invitationService->search();
        $isAdmin = Auth::user()->isAdmin();
        $isSupplier = Auth::user()->isSupplier();
        //dd($isSupplier);
        if (!$isAdmin) {
            if (!$isSupplier) {
                return Inertia::render('ProveedoresRegistro');
            }
            return Inertia::render('ConvocatoriasIframe', ['invitations' => $invitations]);
        }
        return Inertia::render('Convocatorias', ['invitations' => $invitations]);
    }

    public function myPostulations(): \Inertia\Response
    {
        $postulations = $this->invitationService->myPostulations();
        return Inertia::render('MisConvocatorias', ['postulations' => $postulations]);
    }

    public function iframe(): \Inertia\Response
    {
        $invitations = $this->invitationService->search();
        $authh = Auth::user();

        return Inertia::render('ConvoIframe', ['invitations' => $invitations]);
    }

    public function index(): array
    {
        return $this->invitationService->index();
    }

    public function delete($id): void
    {
        $this->invitationService->delete($id);
    }

    public function find($id): \Inertia\Response
    {
        $invitation = $this->invitationService->find($id);
        $invitations = $this->invitationService->search();
        $user = Auth::user()->isAdmin();

        if ($user) {
            return Inertia::render('ConvocatoriasPerfil', ['invitation' => $invitation]);
        } else return Inertia::render('ConvocatoriasIframe', ['invitations' => $invitations]);


    }

    public function filter(Request $request): array
    {
        return $this->invitationService->filter($request->name);
    }

    /**
     * @param Request $request
     * @return array
     */

}
