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

/*Route::resource('/user', 'UserController');
Route::resource('/room', 'RoomController');
Route::resource('/address', 'AddressController');
Route::resource('/hotel', 'HotelController');
Route::resource('/profil', 'ProfilController');
Route::resource('/gender', 'GenderController');
Route::resource('/type', 'TypeController');
Route::resource('/specials', 'SpecialsController');
Route::resource('/media', 'MediaController');
Route::resource('/comment', 'CommentController');*/

Route::get('/', function () {
    return view('pages.home');
});

Route::post('/search', 'RoomController@index');
Route::get('/search', function () {
    return view('pages.home');
});

Route::get('/faq', function () {
    return view('pages.faq');
});

Route::get('/cgu', function () {
    return view('pages.cgu');
});