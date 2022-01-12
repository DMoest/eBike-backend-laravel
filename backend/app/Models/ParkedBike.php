<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ParkedBike extends Model
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
    ];

//    protected $casts = [
//        'bike_id' => 'integer',
//        'parking_id' => 'integer'
//    ];

    protected $fillable = [
        'bike_id',
        'parking_id',
        'status'
    ];


    /**
     * @method bikes()
     * @description Relation mapping, a city has many bikes.
     * @return BelongsTo
     */
    public function bikes(): BelongsTo
    {
        return $this->belongsTo(Bike::class, '_id');
    }
}
