<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @description Model for charging bike a charging station.
 */
class ChargingBike extends Model
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
    protected $guarded = [
        '_id',
//        'bike_id',
//        'station_id',
//        'status'
    ];

    protected $fillable = [
        'bike_id',
        'station_id',
        'status'
    ];


    /**
     * @method bikes()
     * @description Relation mapping, a charging bike belongs to a bike.
     * @return BelongsTo
     */
    public function bikes(): BelongsTo
    {
        return $this->belongsTo(Bike::class, '_id');
    }


    /**
     * @method station()
     * @description Relation mapping, a charging bikes belongs to station.
     * @return BelongsTo
     */
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class, '_id');
    }


    /**
     * @method chargingBike()
     * @description Relation mapping, a parking zone has many chargingBike.
     * @return HasMany
     */
    public function chargingBike(): HasMany
    {
        return $this->hasMany(ChargingBike::class, '_id');
    }
}
