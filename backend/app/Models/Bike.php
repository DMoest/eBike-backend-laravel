<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent; // MySQL
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent; // MongoDB
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Model for Bike.
 * Defines primary keys and the relations to other data models.
 * Enables/disables mass assigning columns in collections.
 */
class Bike extends Eloquent // MySQL
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
    protected $primaryKey = "_id";
    protected $guarded = [ "_id" ];
    protected $casts = [ "_id" => "string" ];
    protected $fillable = [
        'bike_id',
        'pakring_id',
        'active',
        'longitude',
        'latitude',
        'speed',
        'battery'
    ];


    final public function scopeCity($query)
    {

    }



    /**
     * @method city()
     * @description Relation mapping, a bike belong to a city.
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, '_id', 'name');
    }


    /**
     * @method travels()
     * @description Relation mapping, a bike has many travels.
     * @return HasMany
     */
    public function travels(): HasMany
    {
        return $this->hasMany(Travel::class, '_id');
    }


    /**
     * @method parking()
     * @description Relation mapping, a bike belong to a city.
     * @return HasMany
     */
    public function parking(): HasMany
    {
        return $this->hasMany(ParkedBike::class, '_id');
    }


    /**
     * @method charging()
     * @description Relation mapping, a bike belong to a city.
     * @return HasMany
     */
    public function charging(): HasMany
    {
        return $this->hasMany(ChargingBike::class, '_id');
    }
}
