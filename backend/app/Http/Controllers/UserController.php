<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\City;
use App\Models\User;


/**
 * User Controller class.
 * Request data related to Bike class.
 *
 * @todo Create getter method for users travels.
 * @todo Make validation for input on update user.
 *
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
            'users' => User::all()
        ];

        return utf8_encode($data);
    }


    /**
     * @method getUser()
     * @description Getter method to return specific user from database.
     * @param User $user
     * @return string
     */
    final public function getUser(User $user): string
    {
        return utf8_encode($user);
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
            'users' => User::where('city', $city->name)->get()
        ];

        return utf8_encode($data);
    }


    /**
     * @method createUser()
     * @description Setter method to create a new user.
     *      Validates json input. If validation passes,
     *      Create New User in database.
     * @param Request $request
     * @return object
     *
     * @todo Fix the validation of parameters that create a new user.
     */
    final public function createUser(Request $request): object
    {
//        $attributes = $request->validate([
//            'firstname' => ['required', 'min:2', 'max:255'],
//            'lastname' => ['required', 'min:2', 'max:255'],
//            'adress' => ['required', 'min:2', 'max:255'],
//            'postcode' => ['required', 'min:5', 'max:6'],
//            'city' => ['required'],
//            'phone' => ['required', Rule::unique('users', 'phone')],
//            'email' => ['required', 'email', 'max:255', Rule::unique('users','email')],
//            'password' => ['required', 'min:8', 'max:50'],
//            'payment_method' => ['required', 'min:8', 'max:25'],
//            'payment_status' => ['required']
//        ]);

        return User::create(utf8_encode($request->all()));
    }


    /**
     * @method updateUser()
     * @description Setter method to update user in database.
     *      Get existing user then update it from all request attributes.
     * @param Request $request
     *
     * @todo Make input validation from request like in create user. Some sort of dynamic way to include specified params to be validated.
     *
     * @return string
     */
    final public function updateUser(Request $request): string
    {
        $user = User::find($request->_id);
        $user->update($request->all());

        return utf8_encode($user);
    }


    /**
     * @method deleteUser()
     * @description Setter method to remove user from database table/collection.
     *      Get existing user then remove it from database table/collection.
     * @param Request $request
     *
     * @todo Make input validation from request like in create user. Some sort of dynamic way to include specified params to be validated.
     *
     * @return string
     */
    final public function deleteUser(Request $request): string
    {
        $user = User::find($request->_id);
        $user->delete($user);

        return utf8_encode($user);
    }
}
