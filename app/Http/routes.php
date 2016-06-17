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
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');


Route::controllers([
    'password' => 'Auth\PasswordController',
]);

Route::get('/', ['middleware' => 'auth', function(){
    return redirect()->route('admin.projects.index');
} ]);

Route::group( array( 'prefix' => 'admin', 'middleware' => 'auth' ),function(){
    Route::get('/', 'projectController@index');
    Route::get('/dashboard', 'projectController@index');
    Route::resource('projects','projectController' );

    /**modules**/
    Route::resource('modules','moduleController' );
    Route::get('project/{project_id}/modules',array(
        'as' => 'admin.modules.project_modules',
        'uses' => 'moduleController@index'
    ));
    Route::get('project/{project_id}/modules/create',array(
        'as' => 'admin.modules.create_project_modules',
        'uses' => 'moduleController@create'
    ));
    Route::get('project/{project_id}/modules/edit/{id}',array(
        'as' => 'modules.edit_project_modules',
        'uses' => 'moduleController@edit_project_modules'
    ));

    /**tasklists**/
    Route::resource('tasklists','tasklistController' );
    //by Project
    Route::get('project/{project_id}/tasklists',array(
        'as' => 'admin.tasklists.project_tasklists',
        'uses' => 'tasklistController@index'
    ));
    Route::get('project/{project_id}/tasklists/create',array(
        'as' => 'admin.tasklists.create_project_tasklists',
        'uses' => 'tasklistController@create'
    ));
    //by module
    Route::get('module/{module_id}/tasklists',array(
        'as' => 'admin.tasklists.module_tasklists',
        'uses' => 'tasklistController@module_tasklists'
    ));
    Route::get('module/{module_id}/tasklists/create',array(
        'as' => 'admin.tasklists.create_module_tasklists',
        'uses' => 'tasklistController@create_by_module'
    ));


    /**tasks**/
    Route::resource('tasks','taskController' );
    //by Project
    Route::get('project/{project_id}/tasks',array(
        'as' => 'admin.tasks.project_tasks',
        'uses' => 'taskController@index'
    ));
    Route::get('project/{project_id}/tasks/create',array(
        'as' => 'admin.tasks.create_project_tasks',
        'uses' => 'taskController@create'
    ));
    //by module
    Route::get('module/{module_id}/tasks',array(
        'as' => 'admin.tasks.module_tasks',
        'uses' => 'taskController@module_tasks'
    ));
    Route::get('module/{module_id}/tasks/create',array(
        'as' => 'admin.tasks.create_module_tasks',
        'uses' => 'taskController@create_by_module'
    ));
    //by tasklist
    Route::get('tasklist/{tasklist_id}/tasks',array(
        'as' => 'admin.tasks.tasklist_tasks',
        'uses' => 'taskController@tasklist_tasks'
    ));
    Route::get('tasklist/{tasklist_id}/tasks/create',array(
        'as' => 'admin.tasks.create_tasklist_tasks',
        'uses' => 'taskController@create_by_tasklist'
    ));

    /**tickets**/
    Route::resource('tickets','ticketController' );
    //by project
    Route::get('project/{project_id}/tickets',array(
        'as' => 'admin.tickets.project_tickets',
        'uses' => 'ticketController@index'
    ));
    Route::get('project/{project_id}/tickets/create',array(
        'as' => 'admin.tickets.create_project_tickets',
        'uses' => 'ticketController@create'
    ));
    //by module
    Route::get('module/{module_id}/tickets',array(
        'as' => 'admin.tickets.module_tickets',
        'uses' => 'ticketController@module_tickets'
    ));
    Route::get('module/{module_id}/tickets/create',array(
        'as' => 'admin.tickets.create_module_tickets',
        'uses' => 'ticketController@create_by_module'
    ));

    Route::resource('categories','categoryController' );
    Route::resource('users','userController' );
    Route::resource('comments','commentController' );
    Route::resource('roles','roleController' );
    Route::resource('caps','capsController');
    Route::resource('files','fileController' );
    Route::resource('tags','tagController' );

});
