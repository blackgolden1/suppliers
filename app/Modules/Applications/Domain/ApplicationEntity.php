<?php

namespace App\Modules\Applications\Domain;

class ApplicationEntity
{
    public int $invitation_id;
    public int $supplier_id;
    public string $status;
    public array $payload;
    public string $description;

    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

