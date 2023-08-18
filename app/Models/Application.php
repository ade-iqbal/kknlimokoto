<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'citizen_name',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'religion',
        'occupation',
        'property_taxes',
        'jorong_id',
        'date',
        'need',
        'ref_number',
        'accepted_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_of_birth' => 'date',
        'jorong_id' => 'integer',
        'date' => 'date',
        'accepted_date' => 'date',
    ];

    public function detailApplications(): HasMany
    {
        return $this->hasMany(DetailApplication::class);
    }

    public function jorong(): BelongsTo
    {
        return $this->belongsTo(Jorong::class);
    }
}
