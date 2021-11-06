<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Station;


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
     * @description Getter method to return bikes in specific city.
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
}
