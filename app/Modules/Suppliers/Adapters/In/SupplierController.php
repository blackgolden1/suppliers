<?php

namespace App\Modules\Suppliers\Adapters\In;

use App\Http\Controllers\Controller;
use App\Modules\Suppliers\Domain\Ports\In\ISupplierService;
use App\Modules\Suppliers\Domain\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private ISupplierService $supplierService;

    public function __construct()
    {
        $this->supplierService = new SupplierService();
    }

    public function create(Request $request): void
    {
        $this->supplierService->create($request->name,$request->ciuu, $request->phone, $request->address, $request->userId);
    }

}
