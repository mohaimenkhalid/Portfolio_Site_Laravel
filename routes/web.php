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


Route::get('/', 'GalleryController@index')->name('index');

Route::resource('gallery/', 'GalleryController');





Route::get('/gallery/show/{id}', 'GalleryController@show')->name('gallery.show');

Route::get('/photo/details/{id}', 'PhotoController@details')->name('photodetails');

Route::get('/photo/create/{id}', 'PhotoController@create');

//Route::post('/photo/store/{id}', 'PhotoController@store');

Route::get('/photo/destroy/{id}/{gallery_id}', 'PhotoController@delete');

Route::get('/photo/edit/{id}', 'PhotoController@edit');

Route::post('/photoupdate', 'PhotoController@updatedata');

Auth::routes();

//previous...
//Route::get('/home', 'HomeController@index');

Route::get('/home', 'GalleryController@index');





Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
