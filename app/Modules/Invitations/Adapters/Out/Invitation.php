<?php

namespace App\Modules\Invitations\Adapters\Out;

use App\Models\Document;
use App\Models\Requirement;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $date_start
 * @property string $date_finish
 * @property int $active
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Modules\Suppliers\Adapters\Out\Supplier> $suppliers
 * @property-read int|null $suppliers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereDateFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Invitation extends Model
{
    use HasFactory;
     protected $fillable = [
         'name',
         'date_start',
         'date_finish',
         'active',
         'description',
         'files',
     ];


    public function suppliers(): BelongsToMany
    {
        return $this->belongsToMany(Supplier::class);
    }
    public function requirements(): HasMany
    {
        return $this->hasMany(Requirement::class);
    }
}
