<?php

namespace App\Http\Controllers;

use App\Models\User;


/**
 * User Controller class.
 * Makes request calls to fetch data from database.
 */
class UserController extends Controller
{
    /**
     * @method getUsers()
     * @description Getter method to request all users from database.
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    final public function getUsers()
    {
        return User::all();
    }


    /**
     * @method getUser()
     * @description Getter method to return specific user from user ID.
     * @return array
     */
    final public function getUser(User $user)
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
