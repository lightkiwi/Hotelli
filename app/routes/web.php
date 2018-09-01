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

/**
 * Routes des pages principales
 */
Route::post('/', 'PagesVisiteController@index');
Route::get('/', 'PagesVisiteController@index');
Route::get('/faq', 'PagesVisiteController@faq'); //------TODO
Route::get('/cgu', 'PagesVisiteController@cgu'); //------TODO
Route::get('/contact', 'PagesVisiteController@contact'); //------TODO

/**
 * Fonction login et inscription
 */
Route::get('/login', 'PagesVisiteController@index');
Route::get('/singin', 'PagesVisiteController@index');
Route::post('/login', 'PagesVisiteController@login');
Route::post('/singin', 'PagesVisiteController@singin'); //------TODO

/**
 * Fonction recherche ------------------TODO
 */
Route::post('/search', 'RoomController@index');
Route::get('/search', function () {
	return view('pages.home');
});

/**
 * Détail d'une chambre
 */
Route::get('/room/{roomId}', 'RoomController@detail');


/**
 * Interface de gestion de compte (utilisateur standard)
 */
Route::get('/account', 'UserController@account');


/**
 * Interface d'administration (employés et administrateurs
 */
Route::get('/admin', 'UserController@admin');
Route::get('/admin/users', 'UserController@adminUsers');
Route::get('/admin/hotel', 'UserController@adminHotel');
Route::get('/admin/booking', 'UserController@adminBooking');
Route::get('/admin/stat', 'UserController@adminStat');
