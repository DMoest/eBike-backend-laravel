<?php

namespace App\Http\Controllers;

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
     * @return array
     */
    final public function getBikes(): array
    {
        $data = [
            'bikes' => Bike::all()
        ];

        return $data;
    }


    /**
     * @method getBike()
     * @description Getter method to return specific bike from database.
     * @param Bike $bike
     * @return object
     */
    final public function getBike(Bike $bike): object
    {
        return $bike;
    }


    /**
     * @method getBikesInCity()
     * @description Getter method to return bikes in specific city.
     * @param City $city
     * @return array
     */
    final public function getBikesInCity(City $city): array
    {
        $data = [
            'bikes' => Bike::where('city', $city->name)->get()
//            'bikes' => $city->bikes
        ];

        return $data;
    }


    /**
     * @method createBike()
     * @description Setter method to create a new bike.
     *      Validates json input. If validation passes,
     *      Create new bike in database.
     * @param Request $request
     * @return object
     */
    final public function createBike(Request $request): object
    {
        $attributes = $request->validate([
            'status' => ['required', 'string', 'min:2', 'max:255'],
            'active' => ['required', 'boolean'],
            'city' => ['required'],
            'longitude' => [''],
            'latitude' => [''],
            'speed' => ['']
        ]);

        return Bike::create($attributes);
    }


    /**
     * @method updateBike()
     * @description Setter method to update bike in database.
     *      Get existing bike then update it from all request attributes.
     * @param Request $request
     * @return object
     */
    final public function updateBike(Request $request): object
    {
        $bike = Bike::find($request->_id); // TODO validate input from request like in create bike!
        $bike->update($request->all());

        return $bike;
    }


    /**
     * @method deleteBike()
     * @description Setter method to remove bike from database table/collection.
     *      Get existing bike then remove it from database table/collection.
     * @param Request $request
     * @return object
     */
    final public function deleteBike(Request $request): object
    {
        $bike = Bike::find($request->_id); // TODO validate input from request like in create bike!
        $bike->delete($bike);

        return $bike;
    }
}
