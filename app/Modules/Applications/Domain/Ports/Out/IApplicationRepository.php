<?php

namespace App\Modules\Applications\Domain\Ports\Out;

interface IApplicationRepository
{
    public function apply($invitation_id, $supplier_id, $status, $payload): void;

}
