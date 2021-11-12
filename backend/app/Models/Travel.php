<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticateTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class Travel extends Eloquent implements Authenticatable
{
    use AuthenticateTrait;
    use HasFactory;


    /**
     * The attributes that are guarded from mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'user_id',
        'bike_id',
        'status',
        'start_longitude',
        'stop_latitude',
        'start_longitude',
        'stop_latitude',
        'price'
    ];


    /**
     * @method bike()
     * @description Relation mapping, a travel belong to a bike.
     * @return BelongsTo
     */
    final public function bike(): object
    {
        return $this->belongsTo(Bike::class);
    }


    /**
     * @method city()
     * @description Relation mapping, a travel belong to a city.
     * @return BelongsTo
     */
    final public function city(): object
    {
        return $this->belongsTo(City::class);
    }


    /**
     * @method user()
     * @description Relation mapping, a travel belong to a user.
     * @return BelongsTo
     */
    final public function user(): object
    {
        return $this->belongsTo(User::class);
    }
}
