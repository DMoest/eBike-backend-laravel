<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class City extends Eloquent
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
    protected $guarded = ['_id'];


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
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


    /**
     * @method travels()
     * @description Relation mapping, in a city much traveling is made.
     * @return object
     */
    final public function travels(): object
    {
        return $this->hasMany(Travel::class);
    }
}
