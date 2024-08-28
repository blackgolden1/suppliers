<?php

namespace App\Modules\Suppliers\Adapters\In;

use App\Http\Controllers\Controller;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use App\Modules\Suppliers\Domain\Ports\In\ISupplierService;
use App\Modules\Suppliers\Domain\SupplierEntity;
use App\Modules\Suppliers\Domain\SupplierService;
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

    public function create(Request $request): SupplierEntity
    {
        return $this->supplierService->create($request->name,$request->ciuu, $request->phone, $request->address, $request->userId);
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
        $supplier = $this->supplierService->find(1);
        return Inertia::render('ProveedorPerfil', ['supplier'=>$supplier]);
    }
    public function apply($invitation_id, $supplier_id, $status, $description):void{
        $this->supplierService->apply(1,1,'pending','yei');
    }

}
