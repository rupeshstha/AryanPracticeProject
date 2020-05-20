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


Route::get('home', 'CustomerController@index')->name('customer.index');
Route::post('store','CustomerController@store')->name('customer.store');


Route::get('blog-home','BlogController@index')->name('blog.index');

Route::get('insert-blog','BlogController@insert_index')->name('blog.insert.index');

Route::post('store-blog','BlogController@store')->name('blog.store');



