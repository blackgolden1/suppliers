<?php

namespace App\Modules\Invitations\Adapters\In;
use App\Http\Controllers\Controller;
use App\Modules\Invitations\Domain\InvitationService;
use App\Modules\Invitations\Domain\Ports\In\IInvitationService;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
private IInvitationService $invitationService;

    public function __construct()
    {
        $this->invitationService = new InvitationService();
    }


    public function create(Request $request): void
    {
        $this->invitationService->create($request->name, $request->date_start, $request->date_finish, $request->active, $request->description);
    }
}
