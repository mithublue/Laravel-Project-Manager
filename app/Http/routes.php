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
