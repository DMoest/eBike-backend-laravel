<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


/**
 * Model for Travels.
 * Defines primary keys and the relations to other data models.
 * Enables/disables mass assigning columns in collections.
 */
class Travel extends Eloquent
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
    protected $fillable = [
        'city',
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
        return $this->belongsTo(Bike::class, '_id');
    }


    /**
     * @method city()
     * @description Relation mapping, a travel belong to a city.
     * @return BelongsTo
     */
    final public function city(): object
    {
        return $this->belongsTo(City::class, '_id');
    }


    /**
     * @method user()
     * @description Relation mapping, a travel belong to a user.
     * @return BelongsTo
     */
    final public function user(): object
    {
        return $this->belongsTo(User::class, '_id');
    }
}
