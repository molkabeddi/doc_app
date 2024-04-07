<?php

use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsersController;




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
Route::post('/login', [UsersController::class, 'login']);
Route::post('/register', [UsersController::class, 'register']);

Route::get('/my_bookings/{id}', [BookingController::class, 'index']);
Route::post('/add_booking', [BookingController::class, 'create']);
Route::get('/cancel_booking/{id}', [BookingController::class, 'cancel']);
Route::put('/update_booking/{id}', [BookingController::class, 'update']);
Route::delete('/delete_booking/{id}', [BookingController::class, 'destroy']);

