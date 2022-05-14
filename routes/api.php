<?php

use App\Http\Controllers\BusScheduleController;
use App\Http\Controllers\TimeScheduleConfirguationController;
use App\Http\Controllers\TimeScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {

    Route::post('register', [UserController::class, 'register'])->name('register');
    Route::post('login', [UserController::class, 'login'])->name('login');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [UserController::class, 'logout'])->name('logout');
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
    });
});



Route::group(['middleware' => 'auth:api'], function () {

    Route::group(['prefix' => 'time-schedule-configuration', 'as' => 'time-schedule-configuration.'], function () {
        Route::get('/', [TimeScheduleConfirguationController::class, 'index'])->name('index');
        Route::post('/', [TimeScheduleConfirguationController::class, 'store'])->name('store');
        Route::delete('/', [TimeScheduleConfirguationController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'time-schedule', 'as' => 'time-schedule.'], function () {
        Route::get('/', [TimeScheduleController::class, 'index'])->name('index');
        Route::post('/', [TimeScheduleController::class, 'store'])->name('store');
        Route::get('/catch-movie-time', [TimeScheduleController::class, 'getCatchMovieTime'])->name('catch-movie-time');
    });

    Route::group(['prefix' => 'bus-schedule', 'as' => 'bus-schedule.'], function () {
        Route::get('/', [BusScheduleController::class, 'index'])->name('index');
        Route::post('/', [BusScheduleController::class, 'store'])->name('store');
    });
});
