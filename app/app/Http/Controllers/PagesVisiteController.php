<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Description of PagesVisiteController
 *
 * @author deepgreen
 */
class PagesVisiteController
{

	/**
	 * Page d'accueil
	 * @return type
	 */
	public function index()
	{
		return view('pages.home');
	}

	public function faq()
	{
		return view('pages.faq');
	}

	public function cgu()
	{
		return view('pages.cgu');
	}

	public function contact()
	{
		return view('pages.contact');
	}

	/**
	 * Gestion du login
	 *
	 * @param \App\Http\Controllers\Request $request
	 * @return type
	 */
	public function login(Request $request)
	{
		$loginOk = [
			'etat'	 => true,
			'info'	 => 'Connexion réussie !'
		];
		$loginKo = [
			'etat'	 => false,
			'info'	 => 'Connexion échouée, merci de vérifier vos identifiants de connexion'
		];
		//vérification du login
		if ($request->input('loginModalFormEmail') !== null && $request->input('loginModalFormPassword') !== null) {

			$_SESSION['connected']		 = true;
//			$_SESSION['profil'] = [];
//			$_SESSION['profil']['date_login'] = date();
			$_SESSION['profil']['id']	 = 3;
			$_SESSION['profil']['email'] = $request->input('loginModalFormEmail');
			$infoLogin					 = $loginOk;
		} else {
			$infoLogin = $loginKo;
		}
		//retour à la page d'accueil

		return redirect('/');
//		return view('pages.home', compact('infoLogin'));
	}

	public function singin(Request $request)
	{
		$infoSignin = null;

		return view('pages.home', compact('infoSignin'));
	}
}