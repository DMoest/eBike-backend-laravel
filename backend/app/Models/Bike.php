<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;


    /**
     * The attributes that are guarded from mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'status',
        'active',
        'city',
        'longitude',
        'latitude',
        'city_id'
    ];
}
