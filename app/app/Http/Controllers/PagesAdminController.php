<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
		$users = \App\User::all();

		return view('pages.admin.users', ['allUsers' => $users]);
	}

	public function showHotel()
	{
		return view('pages.admin.hotel');
	}

	public function showBooking()
	{

	}

	public function showStat()
	{

	}
}