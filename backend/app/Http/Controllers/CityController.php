<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\City;


/**
 * City Controller class.
 * Requests data related to Bike class.
 */
class CityController extends Controller
{
    /**
     * @method getCities()
     * @description Getter method to request all cities from database.
     * @return JsonResponse
     */
    final public function getCities(): JsonResponse
    {
        $cities = City::all();

        return response()->json(
            $cities,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getCity()
     * @description Getter method to return specific city from database.
     * @param City $city
     * @return object
     */
    final public function getCity(City $city): object
    {
        return response()->json(
            $city,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method addCity()
     * @description Setter method to add a new city to database.
     *      Validates json input. If validation passes,
     *      create new city in database table/collection.
     * @param Request $request
     * @return string
     */
    final public function addCity(Request $request): string
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:2', 'max:255', Rule::unique('cities', 'name')],
            'country' => ['required', 'min:2', 'max:255'],
        ]);

        $newCity = City::create($attributes);

        return response()->json(
            $newCity,
            201,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method updateCity()
     * @description Setter method to update city in database table/collection.
     *      Get existing city then update it from all request attributes.
     * @param Request $request
     *
     * @return JsonResponse
     *@todo Make input validation from request like in add city. Some sort of dynamic way to include specified params to be validated.
     *
     */
    final public function updateCity(Request $request): JsonResponse
    {
        $city = City::find($request->_id);
        $city->update($request->all());

        return response()->json(
            $city,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method deleteCity()
     * @description Setter method to remove city from database table/collection.
     *      Get existing city then remove it from the database table/collection cities.
     * @param Request $request
     *
     * @return JsonResponse
     *@todo Make input validation from request like in add city. Some sort of dynamic way to include specified params to be validated.
     *
     */
    final public function deleteCity(Request $request): JsonResponse
    {
        $city = City::find($request->_id);
        $city->delete($city);

        return response()->json(
            $city,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
