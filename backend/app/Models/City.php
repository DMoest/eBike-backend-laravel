<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class City extends Model
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
        'city_name',
        'country'
    ];


    /**
     * @method bikes()
     * @description Relation mapping, a city has many bikes.
     * @return object
     */
    final public function bikes(): object
    {
        return $this->hasMany(Bike::class);
    }


    /**
     * @method stations()
     * @description Relation mapping, a city has many stations.
     * @return object
     */
    final public function stations(): object
    {
        return $this->hasMany(Station::class);
    }


    /**
     * @method users()
     * @description Relation mapping, a city has many users.
     * @return object
     */
    final public function users(): object
    {
        return $this->hasMany(User::class);
    }
}
