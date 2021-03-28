<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//group
Route::resource('/group', 'GroupController');
Route::post('/group/add_users/{id}', 'GroupController@add_users');
Route::delete('/delete_users/{id}', 'GroupController@delete_users');

//topic
Route::get('/topic/{id}', 'TopicController@index');
Route::get('/topic/{id}/create', 'TopicController@create');
Route::post('/topic/{id}/create', 'TopicController@store');
Route::delete('/topic/{id}', 'TopicController@destroy');

//feture
Route::get('/feture/{id}', 'FetureController@index');
Route::get('/feture/show/{id}', 'FetureController@show');

//student users
Route::get('/my_group', 'MyGroupController@get_group');
Route::get('/my_group/{id}', 'MyGroupController@index');
Route::get('/my_group/link_git/{id}', 'MyGroupController@link_git');
Route::get('/my_group/{id}/create', 'MyGroupController@create');
Route::post('/my_group/{id}/create', 'MyGroupController@store');
Route::get('/my_group/{id}/edit', 'MyGroupController@edit');
Route::put('/my_group/{id}/edit', 'MyGroupController@update');
Route::delete('/my_group/{id}', 'MyGroupController@destroy');