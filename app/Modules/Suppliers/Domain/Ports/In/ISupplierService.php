<?php

namespace App\Modules\Suppliers\Domain\Ports\In;

use App\Modules\Suppliers\Domain\SupplierEntity;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Void_;

interface ISupplierService
{
    public function create($name, $ciuu, $phone, $address, $userId, $createdBy, $modifiedBy): SupplierEntity;

    public function edit($name, $ciuu, $phone, $address, $userId,$id): void;
    public function find($id):SupplierEntity;
    public function apply($invitation_id, $supplier_id, $status, $description): void;

    public function search(): array;
    public function index(): array;
}
