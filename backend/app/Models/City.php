<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticateTrait;
use Illuminate\Contracts\Auth\Authenticatable;


class City extends Eloquent implements Authenticatable
{
    use AuthenticateTrait;
    use HasFactory;

    protected string $database = 'mongodb';
    protected string $collection = 'cities';

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
        'name',
        'country'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = ['email_verified_at'];


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
