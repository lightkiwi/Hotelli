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
Route::get('/', function () {
	return view('pages.home');
});
Route::get('/faq', function () {
	return view('pages.faq'); //-----------------TODO
});
Route::get('/cgu', function () {
	return view('pages.cgu'); //-----------------TODO
});
Route::get('/contact', function () {
	return view('pages.contact'); //-----------------TODO
});

/**
 * Fonction login et inscription
 */
Route::post('/login', 'UserController@login');
Route::post('/singin', 'UserController@singin'); //------TODO

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
