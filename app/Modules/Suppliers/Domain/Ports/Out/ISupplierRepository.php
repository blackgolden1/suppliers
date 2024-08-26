<?php

namespace App\Modules\Suppliers\Domain\Ports\Out;

use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Void_;

interface ISupplierRepository
{
    public function create($name, $ciuu, $phone, $address,$userId):void;

}
