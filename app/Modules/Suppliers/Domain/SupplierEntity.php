<?php

namespace App\Modules\Suppliers\Domain;

class SupplierEntity
{
    public int $id;
    public string $name;
    public string $ciuu;
    public string $phone;
    public string $id_type;
    public string $identification_number;
    public string $person_type;
    public string $company_name;
    public string $comercial_name;
    public string $email;
    public string $web_page;
    public string $regimen;
    public string $retainer;
    public string $contributor;
    public string $ica;
    public array $documents;
    public string $rut;
    public string $bank_certification;
    public string $copy_doc_represent;
    public string $iso_9001;
    public array $payload;

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
