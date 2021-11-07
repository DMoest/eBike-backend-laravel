<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Travel extends Model
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
