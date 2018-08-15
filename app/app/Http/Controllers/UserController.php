<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = \App\User::all();

		return view('pages.user.users', ['allUsers' => $users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('pages.user.user');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		\App\User::create([
			'first_name' => $request->get('first_name'),
			'last_name'	 => $request->get('last_name'),
			'email'		 => $request->get('email'),
			'phone'		 => $request->get('phone'),
			'password'	 => $request->get('password'),
			'id_address' => $request->get('id_address'),
			'id_profil'	 => $request->get('id_profil'),
			'id_gender'	 => $request->get('id_gender'),
			'rgpd_date'	 => $request->get('rgpd_date'),
			'newsletter' => $request->get('newsletter'),
			'ip_address' => $request->get('ip_address'),
			'user_agent' => $request->get('user_agent'),
		]);

		return redirect('/users');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	public function login(Request $request)
	{
		$loginOk = [
			'etat'	 => true,
			'info'	 => 'Connexion réussie !'
		];
		//vérification du login
		if ($request->input('loginModalFormEmail') !== null && $request->input('loginModalFormPassword') !== null) {

			$_SESSION['connected']		 = true;
//			$_SESSION['profil'] = [];
//			$_SESSION['profil']['date_login'] = date();
			$_SESSION['profil']['id']	 = 3;
			$_SESSION['profil']['email'] = $request->input('loginModalFormEmail');
		}
		//retour à la page d'accueil
		$infoLogin = $loginOk;
		return view('pages.home', compact('infoLogin'));
	}
}