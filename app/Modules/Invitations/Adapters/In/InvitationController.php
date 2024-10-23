<?php

namespace App\Modules\Invitations\Adapters\In;

use App\Http\Controllers\Controller;
use App\Mail\MiCorreoMailable;
use App\Modules\Invitations\Adapters\Out\Invitation;
use App\Modules\Invitations\Domain\InvitationEntity;
use App\Modules\Invitations\Domain\InvitationService;
use App\Modules\Invitations\Domain\Ports\In\IInvitationService;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class InvitationController extends Controller
{
    private IInvitationService $invitationService;

    public function __construct()
    {
        $this->invitationService = new InvitationService();
    }

    public function getToken()
    {
        $response = Http::post('https://siidesarrollo.confecamaras.co/librerias/wsRestSII/v1/solicitarToken', [
            'codigoempresa' => '16',
            'usuariows' => 'proveedor',
            'clavews' => 'p7Ts1%Vcq7+wH>K'
        ]);

        if ($response->successful()) {
            if ($response['codigoerror'] === '0000') {
                return ($response['token']);
            };
            return $response->json();

        } else {
            echo 'Error: ' . $response->status();
        }
    }

    public function getSuppliersList()
    {
        $response = Http::post('https://siidesarrollo.confecamaras.co/librerias/wsRestSII/v1/construirRelacionInscritos', [
            'codigoempresa' => '16',
            'usuariows' => 'proveedor',
            'token' => $this->getToken(),
            'semilla' => '',
            'limite' => '200',
            'afiliado' => '',
            'ciiucodigo' => 'I5611',
            'ciiuletra' => '',
            'estadomatricula' => 'MA,IA',
            'organizacion' => '01, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12, 13, 14, 15, 16, 17, 99',
            'activos' => '',
            'municipio' => '',
            'fechasmatricula' => '',
            'fechasrenovacion' => '20240101,20240911',
            'fechascancelacion' => '',
            'empleados' => '',
            'exporta' => '',
            'generaarchivo' => '',
        ]);
        if ($response->successful()) {
            $data = json_decode($response, true);
            $result = [];
            if (isset($data['expedientes']) && is_array($data['expedientes'])) {
                foreach ($data['expedientes'] as $expediente) {
                    $correoelectronico = $expediente['correoelectronico'] ?? null;
                    $razonsocial = $expediente['razonsocial'] ?? null;

                    $result[] = [
                        'correoelectronico' => $correoelectronico,
                        'razonsocial' => $razonsocial
                    ];
                }
            }
            return json_encode($result);
        } else {
            echo 'Error: ' . $response->status();
        }
    }

    public function create(Request $request): void
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
        foreach ($request->invitedSuppliers as $invitedSupplier) {
            Mail::to($invitedSupplier['correoelectronico'])->send(new MiCorreoMailable($request->name, $request->date_start, $request->date_finish));
        }
        $this->invitationService->create($request->name, $request->date_start, $request->date_finish, $request->active, $request->quantity, $request->description, $request->requirements, $paths, $request->invitedSuppliers);

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

    public function getActiveInvitations(): \Inertia\Response
    {
        $allInvitations = $this->invitationService->index();
        $activeInvitations = $this->invitationService->getActiveInvitations();
        $isAdmin = Auth::user()->isAdmin();

        if (!$isAdmin) {
            return Inertia::render('Convocatorias/ConvocatoriasIframe', ['invitations' => $activeInvitations]);
        }
        return Inertia::render('Convocatorias/Convocatorias', ['invitations' => $allInvitations]);

    }

    public function deleteFile($id, $index): void
    {
        $invitation = Invitation::find($id);
        $files = json_decode($invitation->files);
        array_splice($files, $index, 1);
        $invitation->files = $files;
        $invitation->save();
    }

    public function myPostulations(): \Inertia\Response
    {
        $postulations = $this->invitationService->myPostulations();
        return Inertia::render('Convocatorias/MisConvocatorias', ['postulations' => $postulations]);
    }

    public function iframe(): \Inertia\Response
    {
        $activeInvitations = $this->invitationService->getActiveInvitations();

        return Inertia::render('Convocatorias/ConvoIframe', ['invitations' => $activeInvitations]);
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
        $invitations = $this->invitationService->getActiveInvitations();
        $user = Auth::user()->isAdmin();

        if ($user) {
            return Inertia::render('Convocatorias/ConvocatoriasPerfil', ['invitation' => $invitation]);
        } else return Inertia::render('Convocatorias/ConvocatoriasIframe', ['invitations' => $invitations]);

    }

    public function filter(Request $request): array
    {
        return $this->invitationService->filter($request->name);
    }

    public function viewCreation(): \Inertia\Response
    {
        // $suppliers = Supplier::select(['name', 'email'])->get();
        $suppliers = $this->getSuppliersList();
        return Inertia::render('Convocatorias/ConvocatoriasCreacion', ['suppliers' => $suppliers]);
    }
    /**
     * @param Request $request
     * @return array
     */

}
