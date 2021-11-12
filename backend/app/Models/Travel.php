<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Travel extends Eloquent
{
    use HasFactory;


    /**
     * @description Models database connection.
     * @var string
     */
    protected string $database = 'mongodb';


//    /**
//     * The attributes that are guarded from mass assignable.
//     *
//     * @var array
//     */
//    protected array $guarded = ['_id'];
//
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected array $fillable = [
//        'city_id',
//        'user_id',
//        'bike_id',
//        'status',
//        'start_longitude',
//        'stop_latitude',
//        'start_longitude',
//        'stop_latitude',
//        'price'
//    ];


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
