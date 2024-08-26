<?php

namespace App\Modules\Suppliers\Adapters\Out;

use App\Modules\Suppliers\Domain\Ports\Out\ISupplierRepository;
use App\Modules\Users\Domain\ports\Out\IUserRepository;
use App\Modules\Users\Adapters\Out\User;
use App\Modules\Users\Domain\UserEntity;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Void_;
use function Laravel\Prompts\table;

class SupplierMysqlRepository implements ISupplierRepository
{

    public function create($name, $ciuu, $phone, $address, $userId): void
    {
        DB::table('suppliers')->insert(['name'=>$name,'ciuu'=>$ciuu, 'phone'=>$phone,'address'=>$address,'user_id'=>$userId ]);
    }
}
