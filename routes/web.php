<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/new', 'App\Http\Controllers\HomeController@new')->name('new')->middleware('permissions:can-add-ship');
Route::post('/new/store', 'App\Http\Controllers\ShippingController@store')->name('store');
Route::get('/shippings', 'App\Http\Controllers\ShippingController@index')->name('shippings')->middleware('permissions:can-index-ship');
Route::post('/shippings/edit', 'App\Http\Controllers\ShippingController@update')->name('edit')->middleware('permissions:can-edit-ship');
Route::post('/shipping/delete', 'App\Http\Controllers\ShippingController@destroy')->name('delete')->middleware('permissions:can-delete-ship');
Route::get('/shipping/show/{id}', 'App\Http\Controllers\ShippingController@show')->name('show');


Route::get('/my-account', 'App\Http\Controllers\HomeController@profile')->name('profile');
Route::post('/password/change', 'App\Http\Controllers\HomeController@changePassword')->name('password-change');

Route::get('/buses', 'App\Http\Controllers\BusController@index')->name('buses')->middleware('permissions:can-index-bus');
Route::post('/buses/add', 'App\Http\Controllers\BusController@store')->name('buses-add');
Route::get('/buses/delete{id}', 'App\Http\Controllers\BusController@destroy')->name('bus-delete')->middleware('permissions:can-delete-bus');

Route::get('/location', 'App\Http\Controllers\LocationController@index')->name('location')->middleware('permissions:can-index-location');
Route::post('/location/add', 'App\Http\Controllers\LocationController@store')->name('location-add');
Route::get('/location/delete/{id}', 'App\Http\Controllers\LocationController@destroy')->name('location-delete')->middleware('permissions:can-delete-location');;


Route::get('/busdoc', 'App\Http\Controllers\BusdocController@index')->name('busdocs.index')->middleware('permissions:can-index-busdoc');
Route::get('/busdoc/create', 'App\Http\Controllers\BusdocController@create')->name('busdocs.create')->middleware('permissions:can-add-busdoc');
Route::post('/busdoc', 'App\Http\Controllers\BusdocController@store')->name('busdocs.store');
Route::delete('/busdoc/{id}', 'App\Http\Controllers\BusdocController@destroy')->name('busdocs.destroy')->middleware('permissions:can-delete-busdoc');
Route::get('/busdoc/editer/{id}', 'App\Http\Controllers\BusdocController@edit')->name('busdocs.edit')->middleware('permissions:can-edit-busdoc');
Route::put('/busdoc/editer/{id}', 'App\Http\Controllers\BusdocController@update')->name('busdocs.update');


Route::get('/reships', 'App\Http\Controllers\ShippingController@deleteship')->name('restoreships')->middleware('permissions:can-restore-ship');
Route::get('/reships/{id}', 'App\Http\Controllers\ShippingController@restore')->name('restoreships.restore');



Route::get('/users/create', 'App\Http\Controllers\UsersController@create')->name('users.create')->middleware('permissions:can-add-user');
Route::post('/users', 'App\Http\Controllers\UsersController@store')->name('users.store');
Route::get('/users', 'App\Http\Controllers\UsersController@index')->name('users.index')->middleware('permissions:can-index-user');
Route::get('/users/edit/{id}', 'App\Http\Controllers\UsersController@edit')->name('users.edit')->middleware('permissions:can-edit-user');
Route::put('/users/{id}', 'App\Http\Controllers\UsersController@update')->name('users.update');
Route::delete('/users/{id}', 'App\Http\Controllers\UsersController@destroy')->name('users.destroy')->middleware('permissions:can-delete-user');
Route::get('/users/{id}/edit', 'App\Http\Controllers\UsersController@show')->name('users.show');


Route::get('/users/role', 'App\Http\Controllers\UsersController@role')->name('users.role');
Route::get('/permission/create', 'App\Http\Controllers\UsersController@permission')->name('permission.create')->middleware('permissions:can-add-role'); //
Route::post('/permission', 'App\Http\Controllers\UsersController@storepermission')->name('permission.store');
Route::get('/permission/edit/{id}', 'App\Http\Controllers\UsersController@editrole')->name('role.edit')->middleware('permissions:can-edit-role');
Route::put('/permission/{id}', 'App\Http\Controllers\UsersController@updaterole')->name('role.update');
Route::get('/permission', 'App\Http\Controllers\UsersController@indexrole')->name('role.index')->middleware('permissions:can-index-role');
Route::delete('/permission/{id}', 'App\Http\Controllers\UsersController@destroyrole')->name('role.delete')->middleware('permissions:can-delete-role');
