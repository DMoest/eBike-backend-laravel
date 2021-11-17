<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Bike;
use App\Models\City;


/**
 * Bike Controller class.
 * Requests data related to Bike class.
 */
class BikeController extends Controller
{
    /**
     * @method getBikes()
     * @description Getter method to request all bikes from database.
     * @return JsonResponse
     */
    final public function getBikes(): JsonResponse
    {
        $data = Bike::all();

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
     * @method getBike()
     * @description Getter method to return specific bike from database.
     * @param Bike $bike
     * @return JsonResponse
     */
    final public function getBike(Bike $bike): JsonResponse
    {
        return response()->json(
            $bike,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getBikesInCity()
     * @description Getter method to return bikes in specific city.
     * @param City $city
     * @return JsonResponse
     */
    final public function getBikesInCity(City $city): JsonResponse
    {
        $data = Bike::where('city', $city->name)->get();

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
     * @method createBike()
     * @description Setter method to create a new bike.
     *      Validates json input. If validation passes,
     *      Create new bike in database.
     * @param Request $request
     * @return JsonResponse
     */
    final public function createBike(Request $request): JsonResponse
    {
        $attributes = $request->validate([
            'status' => ['required', 'string', 'min:2', 'max:255'],
            'active' => ['required', 'boolean'],
            'city' => ['required'],
            'longitude' => [''],
            'latitude' => [''],
            'speed' => ['']
        ]);

        $newBike = Bike::create($attributes);

        return response()->json(
            $newBike,
            201,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method updateBike()
     * @description Setter method to update bike in database.
     *      Get existing bike then update it from all request attributes.
     * @param Request $request
     * @return JsonResponse
     */
    final public function updateBike(Request $request): JsonResponse
    {
        $bike = Bike::find($request->_id); // TODO validate input from request like in create bike!
        $bike->update($request->all());

        return response()->json(
            $bike,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method deleteBike()
     * @description Setter method to remove bike from database table/collection.
     *      Get existing bike then remove it from database table/collection.
     * @param Request $request
     * @return JsonResponse
     */
    final public function deleteBike(Request $request): JsonResponse
    {
        $bike = Bike::find($request->_id); // TODO validate input from request like in create bike!
        $bike->delete($bike);

        return response()->json(
            $bike,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
