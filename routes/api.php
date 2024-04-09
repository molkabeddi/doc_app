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

Route::get('/my_bookings/{id}/{status}', [BookingController::class, 'index']);//done
Route::post('/add_booking', [BookingController::class, 'add_booking']);//done
Route::put('/update_status/{id}', [BookingController::class, 'update_status']); //done
Route::put('/update_booking/{id}', [BookingController::class, 'update_booking']);//done
Route::delete('/delete_booking/{id}', [BookingController::class, 'destroy']);//done

