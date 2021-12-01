<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Jenssegers\Mongodb\Relations\BelongsTo;


/**
 * Model for LinkedSocialAccount.
 * Defines primary keys and the relations to other data models.
 * Enables/disables mass assigning columns in collections.
 */
class LinkedSocialAccount extends Model
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
//    protected $primaryKey = '_id';
//    protected $guarded = ['_id'];
    protected $fillable = [
        'provider_name',
        'provider_id',
    ];


    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, '_id');
    }
}
