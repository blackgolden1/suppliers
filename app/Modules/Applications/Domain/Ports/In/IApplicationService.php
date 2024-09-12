<?php

namespace App\Modules\Applications\Domain\Ports\In;

interface IApplicationService
{
    public function apply($invitation_id, $supplier_id, $status, $payload): void;
}
