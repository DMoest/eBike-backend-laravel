<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Bike extends Model
{
    use HasFactory;


    /**
     * The attributes that are guarded from mass assignable.
     *
     * @var string[]
     */
    protected array $guarded = ['id'];


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected array $fillable = [
        'city_id',
        'status',
        'active',
        'longitude',
        'latitude'
    ];


    /**
     * @method city()
     * @description Relation mapping, a bike belong to a city.
     * @return BelongsTo
     */
    final public function city(): object
    {
        return $this->belongsTo(City::class);
    }


    /**
     * @method travels()
     * @description Relation mapping, a bike has many travels.
     * @return HasMany
     */
    final public function travels(): object
    {
        return $this->hasMany(Travel::class);
    }
}
