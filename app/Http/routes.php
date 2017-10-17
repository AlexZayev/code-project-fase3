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
    return view('welcome');
});

Route::get('/client', 'ClientController@index');
Route::post('/client', 'ClientController@store');
Route::put('/client/{id}', 'ClientController@update');
Route::get('/client/{id}', 'ClientController@show');
Route::delete('/client/{id}', 'ClientController@destroy');

Route::get('project', 'ProjectController@index');
Route::post('project', 'ProjectController@store');
Route::get('project/{id}', 'ProjectController@show');
Route::put('project/{id}', 'ProjectController@update');
Route::delete('project/{id}', 'ProjectController@destroy');

Route::get('project/{id}/members', 'ProjectController@members');
Route::get('project/{id}/isMember/{uid}', 'ProjectController@isMember');
Route::post('project/{id}/addMember/{uid}', 'ProjectController@addMember');
Route::post('project/{id}/removeMember/{uid}', 'ProjectController@removeMember');

Route::get('project/{id}/note', 'ProjectNoteController@index');
//verificar comportamento do parametro id
Route::post('project/{id}/note', 'ProjectNoteController@store');
Route::get('project/{id}/note/{noteId}', 'ProjectNoteController@show');
//verificar comportamento do parametro id
Route::put('project/{id}/note/{noteId}', 'ProjectNoteController@update');
//verificar comportamento do parametro id
Route::delete('project/{id}/note/{noteId}', 'ProjectNoteController@destroy');

Route::get('project/{id}/task', 'ProjectTasksController@index');
Route::post('project/{id}/task', 'ProjectTasksController@store');
Route::get('project/{id}/task/{taskId}', 'ProjectTasksController@show');
Route::put('project/{id}/task/{taskId}', 'ProjectTasksController@update');
Route::delete('project/{id}/task/{taskId}', 'ProjectTasksController@destroy');
