<?php

namespace App\Modules\Applications\Domain;

use App\Modules\Applications\Adapters\Out\ApplicationMysqlRepository;
use App\Modules\Applications\Domain\Ports\In\IApplicationService;
use App\Modules\Applications\Domain\Ports\Out\IApplicationRepository;

class ApplicationService implements IApplicationService
{
private IApplicationRepository $applicationRepository;

    public function __construct()
    {
        $this->applicationRepository = new ApplicationMysqlRepository();
    }
    public function apply($invitation_id, $supplier_id, $status, $payload): void
    {
        $this->applicationRepository->apply($invitation_id, $supplier_id, $status, $payload);
    }
}
