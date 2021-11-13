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
     * @return array
     */
    final public function getStations(): array
    {
        $data = [
            'stations' => Station::all()
        ];

        return $data;
    }


    /**
     * @method getStation()
     * @description Getter method to return specific station from database.
     * @param Station $station
     * @return string
     */
    final public function getStation(Station $station): string
    {
        return $station;
    }


    /**
     * @method getStationsInCity()
     * @description Getter method to return stations in specific city.
     * @param City $city
     * @return array
     */
    final public function getStationsInCity(City $city): array
    {
        $data = [
            'city_stations' => Station::where('city', $city->name)->get()
        ];

        return $data;
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
            'postcode' => ['required', 'min:5', 'max:6'],
            'city' => ['required', 'string']
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
        $station = Station::find($request->_id); // TODO validate input from request like in create bike!
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
        $station = Station::find($request->_id); // TODO validate input from request like in create bike!
        $station->delete($request->_id);

        return $station;
    }
}
