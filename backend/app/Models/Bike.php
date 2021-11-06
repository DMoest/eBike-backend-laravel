<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Bike extends Model
{
    use HasFactory;


    /**
     * The attributes that are guarded from mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'city_id',
        'status',
        'active',
        'longitude',
        'latitude'
    ];


    /**
     * @method city()
     * @description Relation mapping, a bike belong to a city.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    final public function city(): object
    {
        return $this->belongsTo(City::class);
    }
}
