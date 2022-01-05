<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function() {
    return view('welcome');
});

Route::prefix('/dashboard')->group(function() {
    Route::get('/', function() {
        return view('dashboard');
    });

    Route::get('/clients', function(Request $request) {
        return view('clients', [
            'clients' => $request->user()->clients
        ]);
    })->middleware(['auth'])->name('dashboard.clients');
});


Route::prefix('/user')->group(function() {
    Route::get('/register', [AuthenticationController::class, 'registerUser']);
    Route::get('/clients', [AuthenticationController::class, 'clients'])->middleware(['auth'])->name('user.registration');
});
