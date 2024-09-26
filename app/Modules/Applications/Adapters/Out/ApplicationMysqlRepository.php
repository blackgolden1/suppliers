<?php

namespace App\Modules\Applications\Adapters\Out;

use App\Modules\Applications\Domain\Ports\Out\IApplicationRepository;
use function Laravel\Prompts\alert;
use function Laravel\Prompts\error;
use function PHPUnit\Framework\throwException;

class ApplicationMysqlRepository implements IApplicationRepository
{
    public function apply($invitation_id, $supplier_id, $status, $payload): void
    {
        $existingApplication = Postulation::where('invitation_id', $invitation_id)
            ->where('supplier_id', $supplier_id)
            ->first();

        if (!$existingApplication) {
            Postulation::create([
                'invitation_id' => $invitation_id,
                'supplier_id'   => $supplier_id,
                'status'        => $status,
                'radicado'      => $invitation_id,
                'payload'       => json_encode($payload)
            ]);
        }
        else error('errorrrrrrr');
    }

}
