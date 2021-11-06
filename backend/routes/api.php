<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Index route.
 */
Route::get('/', function () {
    return json_encode([
        'Index route' => "/   (this route)",
        'Cities route' => "/city",
        'City route' => "/city/city_id",
        'Stations route' => "/station",
        'Station route' => "/station/station_id",
        'Bikes route' => "/bike",
        'Bike route' => "/bike/bike_id",
        'Users route' => "/user",
        'User route' => "/user/user_id"
    ]);
});


/**
 * City routes.
 */
Route::get('/city', [CityController::class, 'getCities']);
Route::get('/city/{city}', [CityController::class, 'getCity']);


/**
 * Station routes.
 */
Route::get('/station', [StationController::class, 'getStations']);
Route::get('/station/{station}', [StationController::class, 'getStation']);
Route::get('/station/city/{city:id}', [StationController::class, 'getStationsInCity']);


/**
 * Bike routes.
 */
Route::get('/bike', [BikeController::class, 'getBikes']);
Route::get('/bike/{bike}', [BikeController::class, 'getBike']);
Route::get('/bike/city/{city:id}', [BikeController::class, 'getBikesInCity']);


/**
 * User Routes.
 */
Route::get('/user', [UserController::class, 'getUsers']);
Route::get('/user/{user}', [UserController::class, 'getUser']);
