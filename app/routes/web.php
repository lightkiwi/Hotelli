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
Route::post('/room', 'PagesVisiteController@store'); //------TODO
Route::post('/room/comment', 'RoomController@comment');

/**
 * Réservation sans inscription
 */
Route::post('/booking/now', 'PagesVisiteController@booking');

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
Route::post('/admin/booking/add', 'PagesAdminController@addBooking');
Route::post('/admin/booking/users/add', 'PagesAdminController@addUserFromBooking');
Route::get('/admin/booking/del/{id}', ['uses' => 'PagesAdminController@deleteBooking']);
Route::get('/admin/billing', 'PagesAdminController@showBilling'); //------TODO
Route::get('/admin/clients', 'PagesAdminController@showClients');
Route::post('/admin/clients/add', 'PagesAdminController@addClient');
//administrateurs
Route::get('/admin/users', 'PagesAdminController@showUsers');
Route::post('/admin/users/add', 'PagesAdminController@addUser');
Route::get('/admin/users/del/{id}', ['uses' => 'PagesAdminController@deleteUser']);
Route::get('/admin/hotel', 'PagesAdminController@showHotel'); //------TODO
Route::get('/admin/rooms', 'PagesAdminController@showRooms');
Route::post('/admin/rooms/add', 'PagesAdminController@addRoom');
Route::get('/admin/rooms/del/{id}', ['uses' => 'PagesAdminController@deleteRoom']);
Route::get('/admin/rooms/change/{id}', ['uses' => 'PagesAdminController@changeRoom']);
Route::get('/admin/stat', 'PagesAdminController@showStats'); //------TODO


//Route::get('/home', 'HomeController@index')->name('home');
