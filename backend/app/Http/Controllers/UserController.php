<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     */
    final public function getUsers(): JsonResponse
    {
        $data = User::all();

        return response()->json(
            $data,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getUser()
     * @description Getter method to return specific user from database.
     * @param User $user
     * @return JsonResponse
     */
    final public function getUser(User $user): JsonResponse
    {
        return response()->json(
            $user,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getUsersInCity()
     * @description Getter method to return bikes in specific city.
     * @param City $city
     * @return JsonResponse
     */
    final public function getUsersInCity(City $city): JsonResponse
    {
        $data = User::where('city', $city->name)->get();

        return response()->json(
            $data,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
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

        $newUser = User::create($request->all());

        return response()->json(
            $newUser,
            201,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
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

        return response()->json(
            $user,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
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

        return response()->json(
            $user,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
