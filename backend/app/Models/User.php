<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are guarded from mass assignable.
     *
     * @var string[]
     */
    protected array $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected array $fillable = [
        'firstname',
        'lastname',
        'adress',
        'postcode',
        'city_id',
        'phone',
        'email',
        'password',
        'payment_method'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected array $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected array $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @method setPasswordAttribute()
     * @description Eloquent Mutator method for hashing all passwords before saving them to database.
     * @param $password
     */
    final public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    /**
     * @method city()
     * @description Relation mapping, a user belong to a city.
     * @return BelongsTo
     */
    final public function city(): object
    {
        return $this->belongsTo(City::class);
    }


    /**
     * @method travels()
     * @description Relation mapping, a user has many travels.
     * @return HasMany
     */
    final public function travels(): object
    {
        return $this->hasMany(Travel::class);
    }
}
