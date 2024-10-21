<?php

namespace App\Modules\Suppliers\Adapters\In;

use App\Http\Controllers\Controller;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use App\Modules\Suppliers\Domain\Ports\In\ISupplierService;
use App\Modules\Suppliers\Domain\SupplierEntity;
use App\Modules\Suppliers\Domain\SupplierService;
use App\Modules\Users\Adapters\Out\User;
use Http;
use http\Message;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class SupplierController extends Controller
{
    private ISupplierService $supplierService;

    public function __construct()
    {
        $this->supplierService = new SupplierService();
    }

    public function create(Request $request): void
    {
        $currentTime = Carbon::now()->format('Ymd_His');;
        //$currentTime = '1';
//        dd($currentTime);
        $rutPath = $request->file('rut')->storeAs(
            'public/proveedores/' . $request->comercial_name, 'RUT' . '_' . $currentTime . '.pdf');
        $isoPath = $request->file('iso_9001')->storeAs(
            'public/proveedores/' . $request->comercial_name, 'ISO_9001' . '_' . $currentTime . '.pdf');
        $copyPath = $request->file('copy_doc_represent')->storeAs(
            'public/proveedores/' . $request->comercial_name, 'Copia_Documento_Representante' . '_' . $currentTime . '.pdf');
        $bankPath = $request->file('bank_certification')->storeAs(
            'public/proveedores/' . $request->comercial_name, 'Certificado_Bancario' . '_' . $currentTime . '.pdf');
        $this->supplierService->create($request->name, $request->ciuu, $request->phone, $request->userId, $request->id_type, $request->identification_number,
            $request->person_type, $request->company_name, $request->comercial_name, $request->email, $request->web_page, $request->regimen, $request->retainer, $request->contributor, $request->ica, $rutPath, $copyPath, $bankPath, $isoPath);
    }

    public function getToken()
    {
        $response = Http::post('https://siidesarrollo.confecamaras.co/librerias/wsRestSII/v1/solicitarToken', [
            'codigoempresa' => '16',
            'usuariows' => 'proveedor',
            'clavews' => 'p7Ts1%Vcq7+wH>K'
        ]);

// Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            return $response->json(); // Obtener la respuesta como JSON

        } else {
            echo 'Error: ' . $response->status();
        }
    }
    public function directorioAfiliados(Request $request)
    {
        $token = $request->header('Authorization');
        $response = Http::post('https://siidesarrollo.confecamaras.co/librerias/wsRestSII/v1/directorioAfiliados', [
            'codigoempresa' => '16',
            'usuariows' => 'proveedor',
            'clavews' => 'p7Ts1%Vcq7+wH>K',
            'token' => $token,
            'registros_a_incluir' => 'afi'
        ]);
        if ($response->successful()) {
            return $response->json(); // Obtener la respuesta como JSON

        } else {
            echo 'Error: ' . $response->status();
        }
    }

    public function search(): \Inertia\Response
    {
        $suppliers = $this->supplierService->search();
        // dd($suppliers);
        return Inertia::render('Proveedores/Proveedores', ['suppliers' => $suppliers]);
    }

    public function index(): array
    {
        return $this->supplierService->index();
    }

    public function edit(Request $request, $id): void
    {
        $this->supplierService->edit($request->name, $request->ciuu, $request->phone, $request->address, $request->userId, $id);
    }

    public function find($id): \Inertia\Response
    {
        $supplier = $this->supplierService->find($id);
        return Inertia::render('Proveedores/ProveedorPerfil', ['supplier' => $supplier]);
    }

    public function apply($invitation_id, $supplier_id, $status, $description, $payload): void
    {
        $this->supplierService->apply(1, 1, 'pending', 'yei', ['uno', 'dos']);
    }

}
