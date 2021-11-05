<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BikeController;

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


Route::get('/', function () {
    echo "INDEX ROUTE: .....";
});



/**
 * City routes.
 */
Route::get('/city', [BikeController::class, 'getCities'])->name('cities');
Route::get('/city/{city}', [BikeController::class, 'getCity'])->name('city');


/**
 * Bike routes.
 */
Route::get('/bike', [BikeController::class, 'getBikes'])->name('bikes');
Route::get('/bike/{bike}', [BikeController::class, 'getBike'])->name('bike');


/**
 * User Routes.
 */
Route::get('/user', [UserController::class, 'getUsers'])->name('users');
Route::get('/user/{user}', [UserController::class, 'getUser'])->name('user');
