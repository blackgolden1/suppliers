<?php

namespace App\Modules\Users\Domain;
use MongoDB\BSON\Timestamp;

class UserEntity
{
    public int $id;
    public string $email;
    public string $user;
    public int $role_id;
    public string $password;

    public function __construct(array $attributes = []) {
        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

}
