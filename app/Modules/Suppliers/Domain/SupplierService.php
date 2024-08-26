<?php

namespace App\Modules\Suppliers\Domain;

use App\Modules\Suppliers\Adapters\Out\SupplierMysqlRepository;
use App\Modules\Suppliers\Domain\Ports\In\ISupplierService;
use App\Modules\Suppliers\Domain\Ports\Out\ISupplierRepository;

class SupplierService implements ISupplierService
{
    private ISupplierRepository $supplierRepository;

    public function __construct()
    {
        $this->supplierRepository = new SupplierMysqlRepository();
    }

    public function create($name, $ciuu, $phone, $address,$userId): void
    {
        $this->supplierRepository->create($name, $ciuu, $phone, $address,$userId);
    }
}
