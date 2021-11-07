<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\City;


/**
 * Bike Controller class.
 * Requests data related to Bike class.
 */
class CityController extends Controller
{
    /**
     * @method getCities()
     * @description Getter method to request all cities from database.
     * @return string
     */
    final public function getCities(): string
    {
        return json_encode(City::all());
    }


    /**
     * @method getCity()
     * @description Getter method to return specific city from database.
     * @param City $city
     * @return string
     */
    final public function getCity(City $city): string
    {
        return json_encode($city);
    }


    /**
     * @method addCity()
     * @description Setter method to create a new user.
     *      Validates json input. If validation passes,
     *      Create New User in database.
     * @param Request $request
     * @return object
     */
    final public function addCity(Request $request): object
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:2', 'max:255', Rule::unique('cities', 'name')],
            'country' => ['required', 'min:2', 'max:255'],
        ]);

        return City::create($attributes);
    }


    /**
     * @method updateCity()
     * @description Setter method to update user in database.
     *      Get existing user then update it from all request attributes.
     * @param Request $request
     *
     * @todo Make input validation from request like in add city. Some sort of dynamic way to include specified params to be validated.
     *
     * @return object
     */
    final public function updateCity(Request $request): object
    {
        $city = City::find($request->id);
        $city->update($request->all());

        return $city;
    }
}
