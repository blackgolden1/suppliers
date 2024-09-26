<?php

namespace App\Modules\Applications\Adapters\Out;

use App\Models\Requirement;
use App\Modules\Invitations\Adapters\Out\Invitation;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Postulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'invitation_id',
        'supplier_id',
        'status',
        'radicado',
        'description',
        'payload',
    ];

    public function invitations(): BelongsTo
    {
        return $this->belongsTo(Invitation::class, 'invitation_id');
    }
    public function suppliers(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
