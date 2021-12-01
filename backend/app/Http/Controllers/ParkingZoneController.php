<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use App\Models\City;
use App\Models\ParkingZone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * @ParkingZoneController
 * @description ParkingZone Controller class. Requests data related to Bike class.
 */
class ParkingZoneController extends Controller
{
    /**
     * @method getParingZones()
     * @description Getter method to request all paring zones from database.
     * @return JsonResponse
     */
    final public function getParingZones(): JsonResponse
    {
        $data = [ 'parking_zones' => ParkingZone::all() ];

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
     * @method getParkingZone()
     * @description Getter method to return specific parking zone from database.
     * @param ParkingZone $parkingZone
     * @return JsonResponse
     */
    final public function getParkingZone(ParkingZone $parkingZone): JsonResponse
    {
        return response()->json(
            $parkingZone,
            200,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method getParkingZonesInCity()
     * @description Getter method to return parking zones in specific city.
     * @param City $city
     * @return JsonResponse
     */
    final public function getParkingZonesInCity(City $city): JsonResponse
    {
        $data = [ 'parking_zones' => ParkingZone::where('city', $city->name)->get() ];

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
     * @method createParkingZone()
     * @description Setter method to create a new parking zone.
     *      Validates json input. If validation passes,
     *      create new parking zone in database.
     * @param Request $request
     * @return JsonResponse
     */
    final public function createParkingZone(Request $request): JsonResponse
    {
        $request->validate([
            'city' => ['Required', 'string'],
            'longitude' => ['Required'],
            'latitude' => ['Required']
        ]);

        $newParkingZone = ParkingZone::create($request->all());

        return response()->json(
            $newParkingZone,
            201,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method updateParkingZone()
     * @description Setter method to update a parking zone in database.
     *      Get existing parking zone then update it from all request attributes.
     * @param Request $request
     * @return JsonResponse
     */
    final public function updateParkingZone(Request $request): JsonResponse
    {
        $user = ParkingZone::find($request->_id);
        $user->update($request->all());

        return response()->json(
            $user,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method deleteParkingZone()
     * @description Setter method to remove parking zone from database table/collection.
     *      Get existing parking zone then remove it from database table/collection.
     * @param Request $request
     * @return JsonResponse
     */
    final public function deleteParkingZone(Request $request): JsonResponse
    {
        $parkingZone = ParkingZone::find($request->_id);
        $parkingZone->delete($parkingZone);

        return response()->json(
            $parkingZone,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
