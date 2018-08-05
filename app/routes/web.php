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
Route::resource('/room', 'RoomController');
Route::resource('/address', 'AddressController');
Route::resource('/hotel', 'HotelController');
Route::resource('/profil', 'ProfilController');
Route::resource('/gender', 'GenderController');
Route::resource('/type', 'TypeController');
Route::resource('/specials', 'SpecialsController');
Route::resource('/media', 'MediaController');
Route::resource('/comment', 'CommentController');

Route::get('/', function () {
	return view('visite_accueil');
});
Route::get('/inscription', function () {
	return view('visite_inscription');
});
Route::get('/reservation', function () {
	return view('visite_reservation');
});
Route::get('/cgu', function () {
	return view('visite_cgu');
});
Route::get('/faq', function () {
	return view('visite_faq');
});

/**
 * Interface utilisateur
 */
Route::get('/gestion', function () {
	return view('user_interface');
});
Route::get('/gestion/historique', function () {
	return view('user_historique');
});

/**
 * Interface Administrateur
 */
Route::get('/admin', function () {
	return view('admin_interface');
});
Route::get('/admin/clients', function () {
	return view('admin_clients');
});
Route::get('/admin/reservations', function () {
	return view('admin_resa');
});
Route::get('/admin/chambres', function () {
	return view('admin_room');
});
Route::get('/admin/statistiques', function () {
	return view('admin_stat');
});
Route::get('/admin/utilisateurs', function () {
	return view('admin_users');
});
