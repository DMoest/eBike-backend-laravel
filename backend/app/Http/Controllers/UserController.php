<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\User;


/**
 * User Controller class.
 * Request data related to Bike class.
 */
class UserController extends Controller
{
    /**
     * @method getUsers()
     * @description Getter method to request all users from database.
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    final public function getUsers(): object
    {
        return json_encode(User::all());
    }


    /**
     * @method getUser()
     * @description Getter method to return specific user from database.
     * @param User $user
     * @return string
     */
    final public function getUser(User $user): string
    {
        return json_encode([
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'adress' => $user['adress'],
            'city' => $user['city'],
            'phone' => $user['phone'],
            'email' => $user['email'],
        ]);
    }
}
