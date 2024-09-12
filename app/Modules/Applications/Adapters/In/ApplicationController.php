<?php

namespace App\Modules\Applications\Adapters\In;

use App\Http\Controllers\Controller;
use App\Modules\Applications\Domain\ApplicationService;
use App\Modules\Applications\Domain\Ports\In\IApplicationService;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    private IApplicationService $applicationService;

    public function __construct()
    {
        $this->applicationService = new ApplicationService();
    }
    public function apply(Request $request):void{
        $supplierId=Auth::user()->supplier->id;
//        dd($request->payload);
        $this->applicationService->apply($request->invitation_id,$supplierId,'pending',$request->payload);
    }
}
