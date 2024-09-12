<?php

namespace App\Modules\Applications\Adapters\Out;

use App\Modules\Applications\Domain\Ports\Out\IApplicationRepository;

class ApplicationMysqlRepository implements IApplicationRepository
{
    public function apply($invitation_id, $supplier_id, $status, $payload): void
    {
        Application::create(['invitation_id'=>$invitation_id, 'supplier_id'=>$supplier_id,'status'=>$status, 'payload'=>json_encode($payload)]);
    }
}
