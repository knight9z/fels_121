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
    //create member
    Route::resource('member', 'MembersController', array('only' => ['store', 'create']));

    //create session (login function)
    Route::resource('session', 'SessionsController', array('only' => ['store', 'create']));

    //logout function
    Route::get('session/destroy', 'SessionsController@logOut');

    // Router of admin
    Route::group(['prefix' => '/admin', 'middleware' => ['admin']], function () {
        Route::get('dashboard', 'AdminsController@index');

        //manager of user
        Route::resource('user', 'UsersController');

        //manager of category
        Route::resource('category', 'CategoriesController');

        //manager of lesson
        Route::resource('lesson', 'LessonsController');

        //manager of word
        Route::resource('word', 'WordsController');

    });

});
