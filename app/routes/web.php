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

use Illuminate\Support\Facades\View;

Route::resource('/user', 'UserController');
//Route::resource('/room', 'RoomController');
//Route::resource('/address', 'AddressController');
//Route::resource('/hotel', 'HotelController');
//Route::resource('/profil', 'ProfilController');
//Route::resource('/gender', 'GenderController');
//Route::resource('/type', 'TypeController');
//Route::resource('/specials', 'SpecialsController');
//Route::resource('/media', 'MediaController');
//Route::resource('/comment', 'CommentController');

Auth::routes();

/**
 * Routes des pages principales
 */
Route::post('/', 'PagesVisiteController@index');
Route::get('/', 'PagesVisiteController@index');
Route::get('/faq', 'PagesVisiteController@faq');
Route::get('/cgu', 'PagesVisiteController@cgu');
Route::get('/cookies', 'PagesVisiteController@cookies');
Route::get('/contact', 'PagesVisiteController@contact');

/**
 * Fonction recherche
 */
Route::get('/search', 'PagesVisiteController@index');
Route::post('/search', 'PagesVisiteController@search');

/**
 * Détail d'une chambre
 */
Route::get('/room', 'PagesVisiteController@index');
Route::get('/room/{roomId}', 'PagesVisiteController@detail');
Route::post('/room', 'PagesVisiteController@store');
//Route::get('/room/{roomId}', 'RoomController@show');


/**
 * Interface de gestion de compte (utilisateur standard)
 */
Route::get('/account', 'UserController@account');
Route::post('/account', 'UserController@update');
Route::get('/account/booking', 'UserController@booking');
Route::get('/account/booking/{id}/{id_user}', 'ReservationController@destroy');


/**
 * Interface d'administration (employés et administrateurs)
 */
//employés
Route::get('/admin', 'PagesAdminController@index');
Route::get('/admin/booking', 'PagesAdminController@showBooking');
Route::get('/admin/billing', 'PagesAdminController@showBilling'); //------TODO
Route::get('/admin/clients', 'PagesAdminController@showClients');
//administrateurs
Route::get('/admin/users', 'PagesAdminController@showUsers');
Route::post('/admin/users/add', 'PagesAdminController@addUser');
Route::get('/admin/users/del/{id}', ['uses' => 'PagesAdminController@deleteUser']);
Route::get('/admin/hotel', 'PagesAdminController@showHotel'); //------TODO
Route::get('/admin/rooms', 'PagesAdminController@showRooms');
Route::post('/admin/rooms/add', 'PagesAdminController@addRoom');
Route::get('/admin/rooms/del/{id}', ['uses' => 'PagesAdminController@deleteRoom']);
Route::get('/admin/stat', 'PagesAdminController@showStats'); //------TODO


//Route::get('/home', 'HomeController@index')->name('home');
