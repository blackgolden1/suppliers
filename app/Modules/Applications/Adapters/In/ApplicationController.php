<?php

namespace App\Modules\Applications\Adapters\In;

use App\Http\Controllers\Controller;
use App\Modules\Applications\Adapters\Out\Postulation;
use App\Modules\Applications\Domain\ApplicationService;
use App\Modules\Applications\Domain\Ports\In\IApplicationService;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\alert;
use function Laravel\Prompts\error;

class ApplicationController extends Controller
{
    private IApplicationService $applicationService;

    public function __construct()
    {
        $this->applicationService = new ApplicationService();
    }

    public function apply(Request $request): void
    {
        //dd($request->all());
        $supplierId = Auth::user()->supplier->id;
        $existingApplication = Postulation::where('invitation_id', $request->invitation_id)
            ->where('supplier_id', $supplierId)
            ->first();

        $paths = [];

            foreach ($request->file('files') as $file) {

                $filename = $file->getClientOriginalName();
                $filename = str_replace(' ', '_', $filename);
                $path = $file->storeAs('public/convocatorias/' . $request->name, $filename);
                $paths[] = $path;
            }
        if (!$existingApplication) {
            $this->applicationService->apply($request->invitation_id, $supplierId, 'pending', $paths);
        }
    }
}
