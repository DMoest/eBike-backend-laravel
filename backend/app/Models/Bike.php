<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Bike extends Eloquent
{
    use HasFactory;


    /**
     * @description Models database connection.
     * @var string
     */
    protected string $database = 'mongodb';


    /**
     * The attributes that are guarded from mass assignable.
     */
    protected $guarded = ["_id"];


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'city',
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
