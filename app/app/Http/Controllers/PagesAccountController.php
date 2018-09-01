<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of PagesAccountController
 *
 * @author deepgreen
 */
class PagesAccountController
{

	public function index()
	{
		$users = \App\User::all();

		return view('pages.user.users', ['allUsers' => $users]);
	}
}