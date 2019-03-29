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

//Core routes.
Auth::routes();
Route::get('/dashboard', 'PagesControllerAuth@index')->name('dashboard');
Route::get('/uploads', 'PagesControllerAuth@create')->name('uploads');
Route::post('/examine', 'PagesControllerAuth@examine')->name('examine');
Route::post('/store', 'PagesControllerAuth@store')->name('store');
Route::delete('/delete/{id}', 'PagesControllerAuth@destroy')->name('destroy');
Route::get('/show/{id}', 'PagesControllerAuth@show')->name('show');
Route::post('comments.store', 'PagesControllerAuth@commentary')->name('comments.store');


//Basic routes
Route::get('/', function () {
    return view('pages.welcome');
});

Route::post('/contact_us','ContactUsController@store')->name('contact_us');