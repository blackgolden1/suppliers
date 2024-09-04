<?php

namespace App\Modules\Suppliers\Adapters\In;

use App\Http\Controllers\Controller;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use App\Modules\Suppliers\Domain\Ports\In\ISupplierService;
use App\Modules\Suppliers\Domain\SupplierEntity;
use App\Modules\Suppliers\Domain\SupplierService;
use App\Modules\Users\Adapters\Out\User;
use http\Message;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupplierController extends Controller
{
    private ISupplierService $supplierService;

    public function __construct()
    {
        $this->supplierService = new SupplierService();
    }

    public function create(Request $request): void
    {

        $rutPath = $request->file('rut')->storeAs(
            'proveedores/'. $request->name,  'RUT'.  '_' .$request->name . '-' . \Str::random(5) . '.pdf');
        $isoPath = $request->file('iso_9001')->storeAs(
            'proveedores/'. $request->name, 'ISO_9001'. '_' . $request->name . '-' . \Str::random(5) . '.pdf');
        $copyPath = $request->file('copy_doc_represent')->storeAs(
            'proveedores/'. $request->name, 'Copia_Documento_Representante'. '_' .  $request->name .'-'. \Str::random(5) . '.pdf');
        $bankPath = $request->file('bank_certification')->storeAs(
            'proveedores/'. $request->name, 'Certificado_Bancario'. '_' . $request->name .'-'. \Str::random(5) . '.pdf');
         $this->supplierService->create($request->name,$request->ciuu, $request->phone, $request->userId, $request->id_type,$request->identification_number,
            $request->person_type, $request->company_name, $request->comercial_name, $request->email, $request->web_page, $request->regimen, $request->retainer, $request->contributor, $request->ica, $rutPath, $copyPath,$bankPath,$isoPath );
    }

    public function search(): \Inertia\Response
    {
        $suppliers=$this->supplierService->search();
       // dd($suppliers);
        return Inertia::render('Proveedores', ['suppliers'=>$suppliers]);
    }
    public function index():array{
        return $this->supplierService->index();
    }
    public function edit(Request $request, $id):void{
         $this->supplierService->edit($request->name,$request->ciuu, $request->phone, $request->address, $request->userId, $id);
    }
    public function find($id):\Inertia\Response{
        $supplier = $this->supplierService->find($id);
        return Inertia::render('ProveedorPerfil', ['supplier'=>$supplier]);
    }
    public function apply($invitation_id, $supplier_id, $status, $description):void{
        $this->supplierService->apply(1,1,'pending','yei');
    }

}
