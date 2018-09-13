<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Hash;

/**
 * Description of PagesAdminController
 *
 * @author deepgreen
 */
class PagesAdminController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$lastResa = DB::table('reservation')->leftjoin('user', 'id_user', '=', 'user.id')->leftjoin('room', 'id_room', '=', 'room.id')->whereDate('start', '>=', Carbon::today())->orderBy('start', 'asc')->limit(5)->get();

//		$statBook	 = '[3, 4, 3, 0, 2, 2, 3]';
//		$statBook	 = DB::table('reservation')->whereDate(['start', '<=', Carbon::today()], ['end', '<', Carbon::today()])->count();
		$dateNow	 = Carbon::today();
		$statBook1	 = DB::table('reservation')->whereDate('start', '<=', $dateNow)->whereDate('end', '>', $dateNow)->count();
		$statBook2	 = DB::table('reservation')->whereDate('start', '<=', $dateNow->addDay(1))->whereDate('end', '>', $dateNow)->count();
		$statBook3	 = DB::table('reservation')->whereDate('start', '<=', $dateNow->addDay(1))->whereDate('end', '>', $dateNow)->count();
		$statBook4	 = DB::table('reservation')->whereDate('start', '<=', $dateNow->addDay(1))->whereDate('end', '>', $dateNow)->count();
		$statBook5	 = DB::table('reservation')->whereDate('start', '<=', $dateNow->addDay(1))->whereDate('end', '>', $dateNow)->count();
		$statBook6	 = DB::table('reservation')->whereDate('start', '<=', $dateNow->addDay(1))->whereDate('end', '>', $dateNow)->count();
		$statBook7	 = DB::table('reservation')->whereDate('start', '<=', $dateNow->addDay(1))->whereDate('end', '>', $dateNow)->count();
		$statBook	 = "[$statBook1,$statBook2,$statBook3,$statBook4,$statBook5,$statBook6,$statBook7]";

		$statBookMax = DB::table('room')->count();

		$dateNow->today();
		$days = "[$dateNow->day,".$dateNow->addDay(1)->day.",".$dateNow->addDay(1)->day.",".$dateNow->addDay(1)->day.",".$dateNow->addDay(1)->day.",".$dateNow->addDay(1)->day.",".$dateNow->addDay(1)->day."]";

//		$jours = $dateNow->day;
//		dd($statBook, $statBookMax);
		return view('pages.admin.home', ['lastResa' => $lastResa, 'statBook' => $statBook, 'statBookMax' => $statBookMax, 'days' => $days]);
	}
	/**
	 * ------------------------------------------------------------------------------------------
	 * Pages Employés
	 * ------------------------------------------------------------------------------------------
	 */

	/**
	 * ------------------------------------------------------------------------------------------
	 * @return type
	 */
	public function showBooking()
	{
		$resa = DB::table('reservation')->leftjoin('user', 'id_user', '=', 'user.id')->leftjoin('room', 'id_room', '=', 'room.id')->get();
//		dd($resa);
		return view('pages.admin.booking', ['allResas' => $resa]);
	}

	public function addBooking()
	{
		$resa = DB::table('reservation')->leftjoin('user', 'id_user', '=', 'user.id')->leftjoin('room', 'id_room', '=', 'room.id')->get();
//		dd($resa);
//		return view('pages.admin.booking', ['allResas' => $resa]);
		return redirect('/admin/booking');
	}

	public function deleteBooking()
	{
		$resa = DB::table('reservation')->leftjoin('user', 'id_user', '=', 'user.id')->leftjoin('room', 'id_room', '=', 'room.id')->get();
//		dd($resa);
//		return view('pages.admin.booking', ['allResas' => $resa]);
		return redirect('/admin/booking');
	}

	public function showBilling()
	{
		return view('pages.admin.billing');
	}

	public function showClients()
	{
		$users = DB::table('user')->where('id_profil', 3)->get(['email', 'first_name', 'last_name', 'phone', 'rgpd_date', 'newsletter']);

		return view('pages.admin.clients', ['allUsers' => $users]);
	}
	/**
	 * ------------------------------------------------------------------------------------------
	 * Pages Administrateurs
	 * ------------------------------------------------------------------------------------------
	 */

	/**
	 * ------------------------------------------------------------------------------------------
	 * Gestion des utilisateurs
	 * @return type
	 */
	public function showUsers()
	{
		$users	 = DB::table('user')->leftjoin('profil', 'id_profil', '=', 'profil.id')->get(['user.id', 'email', 'first_name', 'last_name', 'phone', 'rgpd_date', 'label', 'newsletter']);
		$profils = \App\Profil::all();

		return view('pages.admin.users', ['allUsers' => $users, 'profils' => $profils]);
	}

	public function addUser(Request $request)
	{
		\App\User::create([
			'first_name' => $request->get('first_name') ? $request->get('first_name') : null,
			'last_name'	 => $request->get('last_name') ? $request->get('last_name') : null,
			'email'		 => $request->get('email') ? $request->get('email') : null,
			'phone'		 => $request->get('phone') ? $request->get('phone') : null,
			'password'	 => Hash::make($request->get('password')),
			'id_address' => $request->get('id_address') ? $request->get('id_address') : null,
			'id_profil'	 => $request->get('id_profil') ? $request->get('id_profil') : 3,
			'id_gender'	 => $request->get('id_gender') ? $request->get('id_gender') : 1,
			'rgpd_date'	 => $request->get('rgpd_date') ? $request->get('rgpd_date') : now(),
			'newsletter' => $request->get('newsletter') ? $request->get('newsletter') : 0,
			'ip_address' => $request->get('ip_address') ? $request->get('ip_address') : '0.0.0.0',
			'user_agent' => $request->get('user_agent') ? $request->get('user_agent') : 'NC',
		]);

		return redirect('/admin/users');
	}

	public function deleteUser($id)
	{
//		$id = $request->get('id') ? $request->get('id') : null;
		if ($id) {
			$user = \App\User::find($id);
			$user->delete();
		}
		return redirect('/admin/users');
	}

	public function showHotel()
	{
		return view('pages.admin.hotel');
	}

	/**
	 * ------------------------------------------------------------------------------------------
	 * Gestion des chambres
	 * @return type
	 */
	public function showRooms()
	{
		$rooms = DB::table('room')->leftjoin('media', 'room.id_media', '=', 'media.id')->get();

		return view('pages.admin.rooms', ['rooms' => $rooms]);
	}

	public function addRoom(Request $request)
	{
		\App\Room::create([
			'area'			 => $request->get('area') ? $request->get('area') : null,
			'title'			 => $request->get('title') ? $request->get('title') : null,
			'description'	 => $request->get('description') ? $request->get('description') : null,
			'number'		 => $request->get('number') ? $request->get('number') : null,
			'price'			 => $request->get('price'),
			'score'			 => $request->get('score') ? $request->get('score') : null,
			'persons'		 => $request->get('persons'),
			'id_hotel'		 => $request->get('id_hotel') ? $request->get('id_hotel') : 1,
			'id_state'		 => $request->get('id_state') ? $request->get('id_state') : 1,
			'id_type'		 => $request->get('id_type') ? $request->get('id_type') : 1,
			'id_media'		 => $request->get('id_media') ? $request->get('id_media') : 1,
		]);

		return redirect('/admin/rooms');
	}

	public function deleteRoom($id)
	{
		if ($id) {
			$room = \App\Room::find($id);
			dd($id);
			$room->delete();
		}
		return redirect('/admin/rooms');
	}

	public function showStats()
	{
		return view('pages.admin.stats');
	}
}