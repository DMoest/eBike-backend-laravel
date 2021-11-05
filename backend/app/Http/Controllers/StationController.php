<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
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
        return json_encode(Station::all());
    }


    /**
     * @method getStation()
     * @description Getter method to return specific station from database.
     * @param Station $station
     * @return string
     */
    final public function getStation(Station $station): string
    {
        return json_encode([
            'capacity' => $station['capacity'],
            'active' => $station['active'],
            'adress' => $station['adress'],
            'city' => $station['city']
        ]);
    }
}
