<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('customers', 'CustomerController');

Route::resource('users', 'UsersController');

Route::resource('roomTypes', 'RoomTypesController');

Route::resource('rooms', 'RoomsController');

Route::resource('reservations', 'ReservationController');

Route::resource('roomTypes', 'RoomTypeController');

Route::resource('rooms', 'RoomController');

Route::resource('users', 'UserController');

Route::resource('users', 'UserController');

