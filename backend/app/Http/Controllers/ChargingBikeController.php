<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use App\Models\Bike;
use App\Models\ChargingBike;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * @description Controller for getting & setting chargeing bikes.
 */
class ChargingBikeController extends Controller
{
    /**
     * @method getBikesChargingAtStation()
     * @description Getter method to return bikes at specific charging station.
     *
     * @param ParkedBike $parkedBike
     * @return JsonResponse
     */
    final public function getBikesChargingAtStation(ChargingBike $chargingBike): JsonResponse
    {
        $data = ['charging_bikes' => Bike::where('_id', $chargingBike->bike_id)->get()];

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
     * @method chargeBikeAtStation()
     * @description Setter method to create/charge a bike. Request must contain the json attributes
     *      'bike_id', 'station_id' and 'status' to create a parked bike.
     *
     * @param Request $request
     * @return JsonResponse
     */
    final public function chargeBikeAtStation(Request $request): JsonResponse
    {
        $request->validate([
            'bike_id' => ['Required', 'integer'],
            'station_id' => ['Required', 'integer'],
            'status' => ['Required', 'string'],
        ]);

        $parkedBike = ChargingBike::create($request->all());

        return response()->json(
            $parkedBike,
            201,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method updateChargingBikeAtStation()
     * @description Setter method to update a charging bike. Request must contain the keys
     *      'bike_id', 'station_id' and 'status' to create a parked bike.
     *
     * @param Request $request
     * @return JsonResponse
     */
    final public function updateChargingBikeAtStation(Request $request): JsonResponse
    {
        $parkedBike = ChargingBike::find($request->_id);
        $parkedBike->update($request->all());

        return response()->json(
            $parkedBike,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
     * @method deleteChargingBikeAtStation()
     * @description Setter method to delete a charging bike. Request must contain the keys
     *      'bike_id', 'station_id' and 'status' to create a parked bike.
     *
     * @param Request $request
     * @return JsonResponse
     */
    final public function deleteChargingBikeAtStation(Request $request): JsonResponse
    {
        $parkedBike = ChargingBike::find($request->_id);
        $parkedBike->delete($request->_id);

        return response()->json(
            $parkedBike,
            204,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
