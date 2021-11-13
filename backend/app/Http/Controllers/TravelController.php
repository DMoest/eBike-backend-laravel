<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Travel;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;


/**
 * @TravelController
 * @description Travel Controller class. Requests data related to Travel class.
 *
 * @todo Make better validation process for creating a new travel.
 * @todo Validate input from request like in create travel.
 *
 */
class TravelController extends Controller
{
    /**
     * @method getTravels()
     * @description Getter method to request all travels from database.
     * @return array
     */
    final public function getTravels(): array
    {
        $data = [
            'travels' => Travel::with('city', 'bike')->get()
        ];

        return $data;
    }


    /**
     * @method getTravel()
     * @description Getter method to return specific travel from database.
     * @param Travel $travel
     * @return object
     */
    final public function getTravel(Travel $travel): object
    {
        return $travel;
    }


    /**
     * @method getTravelingInCity()
     * @description Getter method to return traveling in specific city.
     * @param City $city
     * @return array
     */
    final public function getTravelingInCity(City $city): array
    {
        $data = [
            'city_travels' => Travel::where('city', $city->name)->get()
        ];

        return $data;
    }


    /**
     * @method getTravelingWithBike()
     * @description Getter method to return traveling with specific bike.
     * @param Bike $bike
     * @return array
     */
    final public function getTravelingWithBike(Bike $bike): array
    {
        $data = [
            'bike_travels' => Travel::where('bike_id', $bike->_id)->get()
        ];

        return $data;
    }


    /**
     * @method getTravelingByUser()
     * @description Getter method to return traveling in specific city.
     * @param User $user
     * @return array
     */
    final public function getTravelingByUser(User $user): array
    {
        $data = [
            'user_travels' => Travel::where('user_id', $user->_id)->get()
        ];

        return $data;
    }


    /**
     * @method createTravel()
     * @description Setter method to create a new travel.
     *      Validates json input. If validation passes,
     *      create new travel in database.
     * @param Request $request
     * @return object
     *
     * @todo Update the initialization of a new cravel with more parameters from input.
     *
     */
    final public function createTravel(Request $request): object
    {
        $request->validate([
            'city_id' => ['Required', 'integer'],
            'user_id' => ['Required', 'integer'],
            'bike_id' => ['Required', 'integer']
        ]);

        return Travel::create($request->all());
    }


    /**
     * @method updateTravel()
     * @description Setter method to update travel in database.
     *      Get existing travel then update it from all request attributes.
     * @param Request $request
     * @return object
     */
    final public function updateTravel(Request $request): object
    {
        $user = Travel::find($request->_id);
        $user->update($request->all());

        return $user;
    }


    /**
     * @method deleteTravel()
     * @description Setter method to remove travel from database table/collection.
     *      Get existing travel then remove it from database table/collection.
     * @param Request $request
     * @return object
     */
    final public function deleteTravel(Request $request): object
    {
        $travel = Travel::find($request->_id);
        $travel->delete($travel);

        return $travel;
    }
}
