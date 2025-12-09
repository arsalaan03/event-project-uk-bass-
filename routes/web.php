<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('event-detail/{slug?}', [HomeController::class, 'eventDetail']);
    Route::post('event-booking', [HomeController::class, 'eventBooking'])->name('event.booking');


Route::group(['middleware' => 'guest'], function () {

    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');

    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {


    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
