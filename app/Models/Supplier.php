<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
    public function invitations(): BelongsToMany
    {
        return $this->belongsToMany(Invitation::class);
    }
}
