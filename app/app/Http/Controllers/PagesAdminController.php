<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
		return view('pages.admin.home');
	}

	public function listUsers()
	{
		$users = \App\User::all();

		return view('pages.user.users', ['allUsers' => $users]);
	}

	public function showUsers()
	{
		$users	 = DB::table('user')->leftjoin('profil', 'id_profil', '=', 'profil.id')->get(['email', 'first_name', 'last_name', 'phone', 'rgpd_date', 'label', 'newsletter']);
		$profils = \App\Profil::all();

		return view('pages.admin.users', ['allUsers' => $users, 'profils' => $profils]);
	}

	public function addUsers(Request $request)
	{
		\App\User::create([
			'first_name' => $request->get('first_name') ? $request->get('first_name') : null,
			'last_name'	 => $request->get('last_name') ? $request->get('last_name') : null,
			'email'		 => $request->get('email') ? $request->get('email') : null,
			'phone'		 => $request->get('phone') ? $request->get('phone') : null,
			'password'	 => $request->get('password') ? $request->get('password') : null,
			'id_address' => $request->get('id_address') ? $request->get('id_address') : null,
			'id_profil'	 => $request->get('id_profil') ? $request->get('id_profil') : 3,
			'id_gender'	 => $request->get('id_gender') ? $request->get('id_gender') : 1,
			'rgpd_date'	 => $request->get('rgpd_date') ? $request->get('rgpd_date') : now(),
			'newsletter' => $request->get('newsletter') ? $request->get('newsletter') : 0,
			'ip_address' => $request->get('ip_address') ? $request->get('ip_address') : '0.0.0.0',
			'user_agent' => $request->get('user_agent') ? $request->get('user_agent') : 'NC',
		]);

		return redirect('/users');
	}

	public function showHotel()
	{
		return view('pages.admin.hotel');
	}

	public function showRooms()
	{
		return view('pages.admin.rooms');
	}

	public function showBooking()
	{
		return view('pages.admin.booking');
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

	public function showStats()
	{
		return view('pages.admin.stats');
	}
}