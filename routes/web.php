<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/journeys/create', 'App\Http\Controllers\JourneyController@create')->name('journeys.create');

Route::post('/journeys', 'App\Http\Controllers\JourneyController@store')->name('journeys.store');

Route::get('/journeys/{id}', 'App\Http\Controllers\JourneyController@show')->name('journeys.show');

Route::delete('journeys/{id}', 'App\Http\Controllers\JourneyController@destroy')->name('journeys.destroy');

/************************* Create Organizer /*************************/
//Packing
Route::get('/journeys/{id}/create', 'App\Http\Controllers\PackingController@show')->name('journeys.packing');

Route::post('/journeys/{id}/create', 'App\Http\Controllers\PackingController@store')->name('journeys.packing');

Route::get('/journeys/{id}/edit/packing', 'App\Http\Controllers\PackingController@edit')->name('journeys.packing.edit');

Route::put('/journeys/{id}/edit/packing', 'App\Http\Controllers\PackingController@update')->name('journeys.packing.update');

Route::delete('journeys/packing/{id}', 'App\Http\Controllers\PackingController@destroy')->name('journeys.packing.destroy');

//Departure
Route::get('/journeys/{id}/departure', 'App\Http\Controllers\DepartureController@show')->name('journeys.departure');

Route::post('/journeys/{id}/departure', 'App\Http\Controllers\DepartureController@store')->name('journeys.departure');

Route::get('/journeys/{id}/edit/departure', 'App\Http\Controllers\DepartureController@edit')->name('journeys.departure.edit');

Route::put('/journeys/{id}/edit/departure', 'App\Http\Controllers\DepartureController@update')->name('journeys.departure.update');

Route::delete('journeys/departure/{id}', 'App\Http\Controllers\DepartureController@destroy')->name('journeys.departure.destroy');

//Day
Route::get('/journeys/{id}/day', 'App\Http\Controllers\DayController@show')->name('journeys.day');

Route::post('/journeys/{id}/day', 'App\Http\Controllers\DayController@store')->name('journeys.day');

Route::get('/journeys/{id}/edit/day', 'App\Http\Controllers\DayController@edit')->name('journeys.day.edit');

Route::put('/journeys/{id}/edit/day', 'App\Http\Controllers\DayController@update')->name('journeys.day.update');

Route::delete('journeys/day/{id}', 'App\Http\Controllers\DayController@destroy')->name('journeys.day.destroy');

//Arrival
Route::get('/journeys/{id}/arrival', 'App\Http\Controllers\ArrivalController@show')->name('journeys.arrival');

Route::post('/journeys/{id}/arrival', 'App\Http\Controllers\ArrivalController@store')->name('journeys.arrival');

Route::get('/journeys/{id}/edit/arrival', 'App\Http\Controllers\ArrivalController@edit')->name('journeys.arrival.edit');

Route::put('/journeys/{id}/edit/arrival', 'App\Http\Controllers\ArrivalController@update')->name('journeys.arrival.update');

Route::delete('journeys/arrival/{id}', 'App\Http\Controllers\ArrivalController@destroy')->name('journeys.arrival.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
