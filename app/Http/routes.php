<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('login', array(
    'as' => 'login',
    'uses' => 'Auth\AuthController@getLogin'
));
Route::post('login', array(
    'as' => 'postLogin',
    'uses' => 'Auth\AuthController@postLogin'
));
Route::get('logout', array(
    'as' => 'logout',
    'uses' => 'Auth\AuthController@getLogout'
));

// Registration routes...
Route::get('auth/register', array(
    'as' => 'register',
    'uses' => 'Auth\AuthController@getRegister'
));
Route::post('auth/register', array(
    'as' => 'postRegister',
    'uses' => 'Auth\AuthController@postRegister'
));


Route::get('/', function () {
    return view('public.index');
});

Route::group( array( 'prefix' => 'admin' ),function(){
    Route::resource('projects','projectController' );
    Route::resource('tasklists','tasklistController' );
    Route::resource('tasks','taskController' );
    Route::resource('categories','categoryController' );
    Route::resource('users','userController' );
    Route::resource('comments','commentController' );
    Route::resource('roles','roleController' );
    Route::resource('caps','capsController');
    Route::resource('tickets','ticketController' );
    Route::resource('files','fileController' );
    Route::resource('tags','tagController' );
    Route::resource('modules','moduleController' );
});
