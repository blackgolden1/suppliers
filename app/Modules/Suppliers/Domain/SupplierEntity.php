<?php

namespace App\Modules\Suppliers\Domain;

class SupplierEntity
{
    public int $id;
    public string $name;
    public string $ciuu;
    public string $phone;
    public string $address;
    public int $user_id;

    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

}
