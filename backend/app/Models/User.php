<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model as Eloquent; // MySQL
use Illuminate\Auth\Authenticatable as AuthenticateTrait;
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent; // MongoDB
//use Jenssegers\Mongodb\Relations\BelongsTo; // MongoDB
//use Jenssegers\Mongodb\Relations\HasMany; // MongoDB


/**
 * Model for User.
 * Defines primary keys and the relations to other data models.
 * Enables/disables mass assigning columns in collections.
 */
class User extends Eloquent implements Authenticatable
{
    use AuthenticateTrait, HasApiTokens, HasFactory, Notifiable;


    /**
     * @description Models database connection.
     * @var string
     */
    private string $database = 'mysql';


    /**
     * PrimaryKey is the collections primary key.
     * Guarded are the attributes that are guarded from mass assignable.
     * Fillable are attributes that are mass assignable.
     * Cast are the attributes that should be type cast.
     * Hidden are the attributes that should be hidden for serialization.
     */
    protected $primaryKey = '_id';
    protected $guarded = [
        '_id',
        'provider_id',
        'email',
        'phone',
        'adress',
        'postcode',
        'password',
        'payment_method',
        'payment_status'
    ];

    protected $fillable = [
        'provider_id',
        'firstname',
        'lastname',
        'adress',
        'postcode',
        'city',
        'phone',
        'email',
        'password',
        'payment_method',
        'payment_status'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [ 'email_verified_at' => 'datetime' ];


    /**
     * @method setPasswordAttribute()
     * @description Eloquent Mutator method for hashing all passwords before saving them to database.
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    /**
     * @method city()
     * @description Relation mapping, a user belong to a city.
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'name');
    }


    /**
     * @method travels()
     * @description Relation mapping, a user has many travels.
     * @return HasMany
     */
    public function travels(): HasMany
    {
        return $this->hasMany(Travel::class, '_id');
    }
}
