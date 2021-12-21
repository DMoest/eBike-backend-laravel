<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model as Eloquent; // MySQL
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent; // MongoDB
use Illuminate\Auth\Authenticatable as AuthenticateTrait;
use Illuminate\Contracts\Auth\Authenticatable;
//use Jenssegers\Mongodb\Relations\BelongsTo;
//use Jenssegers\Mongodb\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;


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
    protected $guarded = ['_id', 'provider_id'];
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
    protected $hidden = [ 'password', 'remember_token' ];
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
    public function city(): object
    {
        return $this->belongsTo(City::class, 'name');
    }


    /**
     * @method travels()
     * @description Relation mapping, a user has many travels.
     * @return HasMany
     */
    public function travels(): object
    {
        return $this->hasMany(Travel::class, '_id');
    }


    /**
     * @method linkedSocialAccounts()
     * @description Relation mapping, a user can has many social accounts to login with.
     * @return HasMany
     */
    public function linkedSocialAccounts(): object
    {
        return $this->hasMany(LinkedSocialAccount::class);
    }
}
