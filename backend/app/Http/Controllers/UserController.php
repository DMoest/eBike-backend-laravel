<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\City;
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
        $data = [
            'users' => User::with('city')->get()
        ];

        return json_encode($data);
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


    /**
     * @method getUsersInCity()
     * @description Getter method to return bikes in specific city.
     * @param City $city
     * @return string
     */
    final public function getUsersInCity(City $city): string
    {
        $data = [
            'users' => $city->users
        ];

        return json_encode($data);
    }
}
