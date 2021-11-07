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
        'GET Index route' => "/   (this route)",
        'GET Cities route' => "/city",
        'GET City route' => "/city/city_id",
        'GET Stations route' => "/station",
        'GET Station route' => "/station/station_id",
        'GET Bikes route' => "/bike",
        'GET Bike route' => "/bike/bike_id",
        'GET Users route' => "/user",
        'GET User route' => "/user/user_id"
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
Route::post('/station', [StationController::class, 'createStation']);
Route::put('/station', [StationController::class, 'updateStation']);


/**
 * Bike routes.
 */
Route::get('/bike', [BikeController::class, 'getBikes']);
Route::get('/bike/{bike}', [BikeController::class, 'getBike']);
Route::get('/bike/city/{city:id}', [BikeController::class, 'getBikesInCity']);
Route::post('/bike', [BikeController::class, 'createBike']);
Route::put('/bike', [BikeController::class, 'updateBike']);


/**
 * User Routes.
 */
Route::get('/user', [UserController::class, 'getUsers']);
Route::get('/user/{user}', [UserController::class, 'getUser']);
Route::get('/user/city/{city:id}', [UserController::class, 'getUsersInCity']);
Route::post('/user', [UserController::class, 'createUser']);
Route::put('/user', [UserController::class, 'updateUser']);


/**
 * Travel Routes.
 */
Route::get('/travel', [TravelController::class, 'getTravels']);
Route::get('/travel/{travel}', [TravelController::class, 'getTravels']);
Route::get('/travel/city/{city:id}', [TravelController::class, 'getTravelingInCity']);
