<?php

namespace App\Http\Controllers;

use App\Models\Bike;


/**
 * Bike Controller class.
 * Requests data related to Bike class.
 */
class BikeController extends Controller
{
    /**
     * @method getBikes()
     * @description Getter method to request all bikes from database.
     * @return Bike
     */
    final public function getBikes()
    {
        return Bike::all();
    }


    /**
     *
     * @param Bike $bike
     * @return false|string
     */
    final public function getBike(Bike $bike) {
        return json_encode([
            'id' => $bike['id'],
            'status' => $bike['status'],
            'active' => $bike['active'],
            'city' => $bike['city'],
            'longitude' => $bike['longitude'],
            'latitude' => $bike['latitude'],
            'city_id' => $bike['city_id'] // TODO - ÄNDRA SENARE SOM ICKE NULL....
        ]);
    }
}
