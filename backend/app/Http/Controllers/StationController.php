<?php

namespace App\Http\Controllers;

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
     * @return string
     */
    final public function getStations(): string
    {
        $data = [
            'stations' => Station::with('city')->get()
        ];

        return json_encode($data);
    }


    /**
     * @method getStation()
     * @description Getter method to return specific station from database.
     * @param Station $station
     * @return string
     */
    final public function getStation(Station $station): string
    {
        return json_encode($station);
    }


    /**
     * @method getStationsInCity()
     * @description Getter method to return stations in specific city.
     * @param City $city
     * @return string
     */
    final public function getStationsInCity(City $city): string
    {
        $data = [
            'stations' => $city->stations
        ];

        return json_encode($data);
    }


    /**
     * @method createStation()
     * @description Setter method to create a new station.
     *      Validates json input. If validation passes,
     *      create new station in database table/collection.
     * @param Request $request
     * @return object
     */
    final public function createStation(Request $request): object
    {
        $attributes = $request->validate([
            'capacity' => ['required', 'integer'],
            'active' => ['required', 'integer'],
            'adress' => ['required', 'min:2', 'max:255', Rule::unique('stations', 'adress')],
            'city_id' => ['required', 'integer']
        ]);

        return Station::create($attributes);
    }


    /**
     * @method updateStation()
     * @description Setter method to update station in database.
     *      Get existing station then update it from all request attributes.
     * @param Request $request
     * @return object
     */
    final public function updateStation(Request $request): object
    {
        $station = Station::find($request->id); // TODO validate input from request like in create bike!
        $station->update($request->all());

        return $station;
    }


    /**
     * @method deleteStation()
     * @description Setter method to update station in database.
     *      Get existing station then update it from all request attributes.
     * @param Request $request
     * @return object
     */
    final public function deleteStation(Request $request): object
    {
        $station = Station::find($request->id); // TODO validate input from request like in create bike!
        $station->delete($request->id);

        return $station;
    }
}
