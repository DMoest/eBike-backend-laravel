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
     * @return string
     */
    final public function getUsers(): string
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
        return json_encode($user);
    }
}
