<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeParking extends Model
{
    use HasFactory;

    /**
     * @description Models database connection.
     * @var string
     */
    protected string $database = 'mysql';


    /**
     * PrimaryKey is the collections primary key.
     * Guarded are the attributes that are guarded from mass assignable.
     * Fillable are attributes that are mass assignable.
     * Cast are the attributes that should be type cast.
     */
    protected $primaryKey = '_id';
    protected $guarded = ['_id'];
    protected $casts = [ 'name' => 'string' ];
    protected $fillable = [ 'name', 'country' ];


    /**
     * @method bikes()
     * @description Relation mapping, a city has many bikes.
     * @return HasMany
     */
    public function bikes(): HasMany
    {
        return $this->hasMany(Bike::class, '_id');
    }
}
