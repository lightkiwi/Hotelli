<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of PagesAdminController
 *
 * @author deepgreen
 */
class PagesAdminController
{

	public function index()
	{
		return view('pages.admin.home');
	}

	public function listUsers()
	{
		$users = \App\User::all();

		return view('pages.user.users', ['allUsers' => $users]);
	}
}