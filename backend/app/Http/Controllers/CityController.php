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
     * @description Setter method to add a new city to database.
     *      Validates json input. If validation passes,
     *      create new city in database table/collection.
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
     * @description Setter method to update city in database table/collection.
     *      Get existing city then update it from all request attributes.
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


    /**
     * @method deleteCity()
     * @description Setter method to remove city from database table/collection.
     *      Get existing city then remove it from the database table/collection cities.
     * @param Request $request
     *
     * @todo Make input validation from request like in add city. Some sort of dynamic way to include specified params to be validated.
     *
     * @return object
     */
    final public function deleteCity(Request $request): object
    {
        $city = City::find($request->id);
        $city->delete($city);

        return $city;
    }
}
