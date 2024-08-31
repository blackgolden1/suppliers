<?php

namespace App\Modules\Invitations\Domain;

use Illuminate\Support\Facades\Date;
use phpDocumentor\Reflection\Types\Boolean;

class InvitationEntity
{
    public string $name;
    public string $date_start;
    public string $date_finish;
    public bool $active;
    public string $description;
    public array $files;

    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
