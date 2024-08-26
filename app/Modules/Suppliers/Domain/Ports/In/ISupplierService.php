<?php

namespace App\Modules\Suppliers\Domain\Ports\In;

use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Void_;

interface ISupplierService
{
public function create($name, $ciuu, $phone, $address,$userId):void;
}
