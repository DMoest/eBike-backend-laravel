<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent; // MySQL
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent; // MongoDB
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Model for City.
 * Defines primary keys and the relations to other data models.
 * Enables/disables mass assigning columns in collections.
 */
//class City extends Eloquent // MongoDB
class City extends Eloquent // MySQL
{
    use HasFactory;


    /**
     * @description Models database connection.
     * @var string
     */
    protected string $database = 'DB_CONNECTION';


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
     * @return object
     */
    public function bikes(): object
    {
        return $this->hasMany(Bike::class, '_id');
    }


    /**
     * @method parkingZones()
     * @description Relation mapping, a city has many parking zones.
     * @return object
     */
    public function parkingZones(): object
    {
        return $this->hasMany(ParkingZone::class, '_id');
    }


    /**
     * @method stations()
     * @description Relation mapping, a city has many stations.
     * @return object
     */
    public function stations(): object
    {
        return $this->hasMany(Station::class,'_id');
    }


    /**
     * @method travels()
     * @description Relation mapping, in a city much traveling is made.
     * @return object
     */
    public function travels(): object
    {
        return $this->hasMany(Travel::class, '_id');
    }


    /**
     * @method users()
     * @description Relation mapping, a city has many users.
     * @return object
     */
    public function users(): object
    {
        return $this->hasMany(User::class, '_id');
    }
}
