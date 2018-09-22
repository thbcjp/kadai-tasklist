<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('tasklists', 'TasklistsController')->name('tasklists.index');
Route::post('tasklists', 'TasklistsController@store')->name('tasklists.store');
Route::get('tasklists/create', 'TasklistsController@create')->name('tasklists.create');
Route::get('tasklists/{id}', 'TasklistsController@show')->name('tasklists.show');
Route::get('tasklists/{id}/edit', 'TasklistsController@edit')->name('tasklists.edit');
Route::put('tasklists/{id}', 'TasklistsController@update')->name('tasklists.update');
Route::delete('tasklists/{id}', 'TasklistsController@destroy')->name('tasklists.destroy');
*/

Route::get('/', 'TasksController@index');
Route::resource('tasklists', 'TasksController');

