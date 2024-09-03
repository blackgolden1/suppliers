<?php

namespace App\Modules\Suppliers\Domain;

use App\Modules\Suppliers\Adapters\Out\SupplierMysqlRepository;
use App\Modules\Suppliers\Domain\Ports\In\ISupplierService;
use App\Modules\Suppliers\Domain\Ports\Out\ISupplierRepository;
use Inertia\Inertia;

class SupplierService implements ISupplierService
{
    private ISupplierRepository $supplierRepository;

    public function __construct()
    {
        $this->supplierRepository = new SupplierMysqlRepository();
    }

    public function create($name, $ciuu, $phone, $address,$userId,$createdBy, $modifiedBy): SupplierEntity
    {
        return $this->supplierRepository->create($name, $ciuu, $phone, $address,$userId,$createdBy, $modifiedBy);
    }

    public function index(): array
    {
       return $this->supplierRepository->index();
    }

    public function search(): array
    {
        return $this->supplierRepository->search();
    }

    public function edit($name, $ciuu, $phone, $address, $userId,$id): void
    {
         $this->supplierRepository->edit($name, $ciuu, $phone, $address,$userId,$id );

    }
    public function find ($id):SupplierEntity
    {
        return $this->supplierRepository->find($id);
    }
    public function apply($invitation_id, $supplier_id, $status, $description): void
    {
        // TODO: Implement apply() method.
    }
}
