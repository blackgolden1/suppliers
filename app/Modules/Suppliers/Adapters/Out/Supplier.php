<?php

namespace App\Modules\Suppliers\Adapters\Out;

use App\Models\Document;
use App\Modules\Applications\Adapters\Out\Postulation;
use App\Modules\Invitations\Adapters\Out\Invitation;
use App\Modules\Users\Adapters\Out\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $ciuu
 * @property string $phone
 * @property string $address
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Modules\Invitations\Adapters\Out\Invitation> $invitations
 * @property-read int|null $invitations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCiuu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereUserId($value)
 * @mixin \Eloquent
 */
class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ciuu',
        'phone',
        'id_type',
        'identification_number',
        'person_type',
        'company_name',
        'comercial_name',
        'web_page',
        'regimen',
        'retainer',
        'ica',
        'user_id',
        'email',
        'contributor',
        'rut',
        'bank_certification',
        'iso_9001',
        'copy_doc_represent'
    ];
    protected $guarded = [];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
    public function applications(): HasMany
    {
        return $this->hasMany(Postulation::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function invitations(): BelongsToMany
    {
        return $this->belongsToMany(Invitation::class);
    }
}
