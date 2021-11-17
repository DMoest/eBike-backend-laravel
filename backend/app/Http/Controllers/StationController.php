<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Station;
use Illuminate\Validation\Rule;


/**
 * Station Controller class.
 * Requests data related to station class.
 */
class StationController extends Controller
{
    /**
     * @method getStations()
     * @description Getter method to request all stations from database.
     * @return JsonResponse
     */
    final public function getStations(): JsonResponse
    {
        $data = Station::all();

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
     * @method getStation()
     * @description Getter method to return specific station from database.
     * @param Station $station
     * @return JsonResponse
     */
    final public function getStation(Station $station): JsonResponse
    {
        return response()->json(
            $station,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getStationsInCity()
     * @description Getter method to return stations in specific city.
     * @param City $city
     * @return JsonResponse
     */
    final public function getStationsInCity(City $city): JsonResponse
    {
        $data = Station::where('city', $city->name)->get();

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
     * @method createStation()
     * @description Setter method to create a new station.
     *      Validates json input. If validation passes,
     *      create new station in database table/collection.
     * @param Request $request
     * @return JsonResponse
     */
    final public function createStation(Request $request): JsonResponse
    {
        $attributes = $request->validate([
            'capacity' => ['required', 'integer'],
            'active' => ['required', 'integer'],
            'adress' => ['required', 'min:2', 'max:255', Rule::unique('stations', 'adress')],
            'postcode' => ['required', 'min:5', 'max:6'],
            'city' => ['required', 'string']
        ]);

        $newStation = Station::create($attributes);

        return response()->json(
            $newStation,
            201,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method updateStation()
     * @description Setter method to update station in database.
     *      Get existing station then update it from all request attributes.
     * @param Request $request
     * @return JsonResponse
     */
    final public function updateStation(Request $request): JsonResponse
    {
        $station = Station::find($request->_id); // TODO validate input from request like in create bike!
        $station->update($request->all());

        return response()->json(
            $station,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method deleteStation()
     * @description Setter method to update station in database.
     *      Get existing station then update it from all request attributes.
     * @param Request $request
     * @return JsonResponse
     */
    final public function deleteStation(Request $request): JsonResponse
    {
        $station = Station::find($request->_id); // TODO validate input from request like in create bike!
        $station->delete($request->_id);

        return  response()->json(
            $station,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
