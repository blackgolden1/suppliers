<?php

namespace App\Models;

use App\Modules\Invitations\Adapters\Out\Invitation;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Requirement extends Model
{
    use HasFactory;
    protected $fillable= [
        'invitation_id',
        'type',
        'description'
    ];
    public function invitations (): BelongsTo{
        return $this->belongsTo(Invitation::class);
    }

}
