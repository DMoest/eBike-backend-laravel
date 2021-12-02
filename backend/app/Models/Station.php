<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


/**
 * Model for Station.
 * Defines primary keys and the relations to other data models.
 * Enables/disables mass assigning columns in collections.
 */
class Station extends Eloquent
{
    use HasFactory;


    /**
     * @description Models database connection.
     * @var string
     */
    protected string $database = 'mongodb';


    /**
     * PrimaryKey is the collections primary key.
     * Guarded are the attributes that are guarded from mass assignable.
     * Fillable are attributes that are mass assignable.
     * Cast are the attributes that should be type cast.
     */
    protected $primaryKey = '_id';
    protected $guarded = ['_id'];
    protected $casts = [ '_id' => 'string' ];
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
    public function city(): object
    {
        return $this->belongsTo(City::class, '_id' );
    }
}
