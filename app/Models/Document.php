<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * @return BelongsTo
     */
    public function supplier (): BelongsTo{
        return $this->belongsTo(Supplier::class);
    }
}
