<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('change-lang/{iso_code}', 'CommonsController@setLanguage');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    // Authentication routes...

    Route::get('auth/login', 'SessionController@getLogin');
    Route::post('auth/login', 'SessionController@postLogin');

    //logout
    Route::get('auth/logout', 'SessionController@logOut');

    // Registration routes...
    Route::get('auth/register', 'SessionController@getRegister');
    Route::post('auth/register', 'SessionController@postRegister');

    // Router of admin
    Route::group(['middleware' => ['auth', 'role:' . \App\Http\Controllers\SessionController::USER_ROLE_ADMIN]], function () {

    });

    // Router of customer
    Route::group(['middleware' => ['auth', 'role:' . \App\Http\Controllers\SessionController::USER_ROLE_CLIENT]], function () {

    });

});
