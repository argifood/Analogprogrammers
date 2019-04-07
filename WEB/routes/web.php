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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('listings', 'listingscon')->middleware('auth');
Route::resource('products', 'productsscon')->middleware('auth');
Route::resource('areacodes', 'areacodecon')->middleware('auth');
Route::get('/mylistings', 'listingscon@ownindex')->middleware('auth');
Route::get('/bought', 'listingscon@bought')->middleware('auth');
Route::get('/stats', 'StatshourController@index');
Route::post('/listings/bid/', 'listingscon@bid')->middleware('auth');
