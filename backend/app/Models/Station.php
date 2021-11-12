<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticateTrait;
use Illuminate\Contracts\Auth\Authenticatable;


class Station extends Eloquent implements Authenticatable
{
    use AuthenticateTrait;
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
        'capacity',
        'active',
        'adress',
        'postcode',
        'city'
    ];


    /**
     * @method city()
     * @description Relation mapping, a station belong to a city.
     * @return BelongsTo
     */
    final public function city(): object
    {
        return $this->belongsTo(City::class);
    }
}
