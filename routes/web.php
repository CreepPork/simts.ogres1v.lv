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

Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@list');
Route::get('/index/{index}/edit', 'IndexController@edit');
Route::patch('/index/{index}', 'IndexController@update');
Route::delete('/index/{index}', 'IndexController@imageDestroy');

Route::get('/colors', function () {
    return view('color-palette');
});

Route::resource('/work', 'WorkController');
Route::resource('/workStatus', 'WorkStatusController');
Route::resource('/teacher', 'TeacherController');

Route::resource('/gift', 'GiftController');

Route::resource('/recommend', 'RecommendationController');

Route::resource('/event', 'EventController');
Route::patch('/event/{event}/image', 'EventController@replaceImage');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
