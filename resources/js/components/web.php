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

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();


//Route::post('follow/{user}', funtion(){
  //  return ['success'] ;
//});


Route::post('follow/{user}', 'FollowsController@store');

Route::get('/' ,'PostsController@index');
Route::get('/p/create','PostsController@create');
Route::post('/p','PostsController@store');
Route::get('/p/{post}','PostsController@show');

//Route::get('/p','PostsController@create');


Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit','ProfileController@edit')->name('profile.edit');;
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
Route::resource('likes','likescontroller@index');
Route::resource('userprofiles','userprofilesController@index');
Route::resource('userprofiles/{id}','userprofilesController@index');
