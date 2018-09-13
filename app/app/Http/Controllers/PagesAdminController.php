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

	/**
	 * Accueil du dashboard administration
	 * @return type
	 */
	public function index()
	{
		$lastResa = DB::table('reservation')->leftjoin('user', 'id_user', '=', 'user.id')->leftjoin('room', 'id_room', '=', 'room.id')
		 ->whereDate('start', '>=', Carbon::today())->orderBy('start', 'asc')
		 ->limit(5)
		 ->get([
			'start', 'end', 'reservation.persons', 'last_name', 'first_name', 'phone',
			'room.number', 'room.title']);

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
	 * ----- Pages de gestion des réservations
	 * @return type
	 */
	public function showBooking()
	{
		$resa		 = DB::table('reservation')
		 ->leftjoin('user', 'id_user', '=', 'user.id')
		 ->leftjoin('room', 'id_room', '=', 'room.id')
		 ->get(['reservation.id', 'start', 'end', 'reservation.persons', 'last_name',
			'first_name', 'phone',
			'room.number', 'room.title']);
		$allClients	 = DB::table('user')->where('id_profil', 3)->get(['id', 'email', 'first_name', 'last_name']);
		$allRooms	 = DB::table('room')->get(['id', 'number', 'title']);
//		dd($resa);
		return view('pages.admin.booking', ['allResas' => $resa, 'allClients' => $allClients, 'allRooms' => $allRooms]);
	}

	/**
	 * Ajout de réservation
	 * @param Request $request
	 * @return type
	 */
	public function addBooking(Request $request)
	{
		\App\Reservation::create([
			'start'			 => $request->get('start'),
			'end'			 => $request->get('end'),
			'persons'		 => $request->get('persons') ? $request->get('persons') : 1,
			'id_user'		 => $request->get('id_user'),
			'id_room'		 => $request->get('id_room'),
			'id_specials'	 => $request->get('id_specials') ? $request->get('id_specials') : null,
		]);
		return redirect('/admin/booking');
	}

	/**
	 * Ajout d'un client depuis la page de gestion des réservations
	 * @param Request $request
	 * @return type
	 */
	public function addUserFromBooking(Request $request)
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

		return redirect('/admin/booking');
	}

	/**
	 * Suppression d'une réservation
	 * @param type $id
	 * @return type
	 */
	public function deleteBooking($id)
	{
		if ($id) {
			$user = \App\Reservation::find($id);
			$user->delete();
		}
		return redirect('/admin/booking');
	}

	/**
	 * ----- Pages de gestion des facturation @todo
	 */
	public function showBilling()
	{
		return view('pages.admin.billing');
	}

	/**
	 * ----- Pages de gestion des clients
	 */
	public function showClients()
	{
		$users = DB::table('user')->where('id_profil', 3)->get(['email', 'first_name', 'last_name', 'phone', 'rgpd_date', 'newsletter']);

		return view('pages.admin.clients', ['allUsers' => $users]);
	}

	/**
	 * Ajout de client
	 * @param Request $request
	 * @return type
	 */
	public function addClient(Request $request)
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

		return redirect('/admin/clients');
	}
	/**
	 * ------------------------------------------------------------------------------------------
	 * Pages Administrateurs
	 * ------------------------------------------------------------------------------------------
	 */

	/**
	 * ------------------------------------------------------------------------------------------
	 * ----- Pages de Gestion des utilisateurs
	 * @return type
	 */
	public function showUsers()
	{
		$users	 = DB::table('user')->leftjoin('profil', 'id_profil', '=', 'profil.id')->get(['user.id', 'email', 'first_name', 'last_name', 'phone', 'rgpd_date', 'label', 'newsletter']);
		$profils = \App\Profil::all();

		return view('pages.admin.users', ['allUsers' => $users, 'profils' => $profils]);
	}

	/**
	 * Ajout d'utilisateur
	 * @param Request $request
	 * @return type
	 */
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

	/**
	 * Suppression d'un utilisateur
	 * @param type $id
	 * @return type
	 */
	public function deleteUser($id)
	{
//		$id = $request->get('id') ? $request->get('id') : null;
		if ($id) {
			$user = \App\User::find($id);
			$user->delete();
		}
		return redirect('/admin/users');
	}

	/**
	 * ----- Pages de Gestion des hotels
	 * @return type
	 */
	public function showHotel()
	{
		return view('pages.admin.hotel');
	}

	/**
	 * ------------------------------------------------------------------------------------------
	 * ----- Pages de Gestion des chambres
	 * @return type
	 */
	public function showRooms()
	{
		$rooms = DB::table('room')->leftjoin('media', 'room.id_media', '=', 'media.id')->leftjoin('state', 'room.id_state', '=', 'state.id')->get(['room.id', 'number', 'title', 'description', 'score', 'state.label',
			'persons']);

		return view('pages.admin.rooms', ['rooms' => $rooms]);
	}

	/**
	 * Ajout de chambre
	 * @param Request $request
	 * @return type
	 */
	public function addRoom(Request $request)
	{
		$id_media = DB::table('media')->insertGetId([
			'path' => $request->get('media'),
		]);

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
			'id_media'		 => $request->get('id_media') ? $request->get('id_media') : $id_media,
		]);

		return redirect('/admin/rooms');
	}

	/**
	 * Suppression de chambre
	 * @param type $id
	 * @return type
	 */
	public function deleteRoom($id)
	{
		if ($id) {
			$room = \App\Room::find($id);
			$room->delete();
		}
		return redirect('/admin/rooms');
	}

	/**
	 * Changement de statut d'une chambre
	 * @param type $id
	 * @return type
	 */
	public function changeRoom($id)
	{
		if ($id) {
			if (DB::table('room')->where('id', $id)->get(['id_state'])[0]->id_state === 1) {
				DB::table('room')->where('id', $id)->update(['id_state' => 2]);
			} else {
				DB::table('room')->where('id', $id)->update(['id_state' => 1]);
			}
//			dd(DB::table('room')->where('id', $id)->get(['id_state'])[0]->id_state);
		}
		return redirect('/admin/rooms');
	}

	/**
	 * ----- Pages de Statistiques
	 * @return type
	 */
	public function showStats()
	{
		return view('pages.admin.stats');
	}
}