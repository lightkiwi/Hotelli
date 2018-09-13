<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Comment;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use MongoDB\BSON\Javascript;

//use Illuminate\Support\Facades\Auth;

/**
 * Description of PagesVisiteController
 *
 * @author deepgreen
 */
class PagesVisiteController extends Controller
{

	/**
	 * Page d'accueil
	 * @return type
	 */
	public function index()
	{
		return view('pages.home');
	}

	/**
	 * Page FAQ
	 * @return type
	 */
	public function faq()
	{
		return view('pages.faq');
	}

	/**
	 * Page CGU
	 * @return type
	 */
	public function cgu()
	{
		return view('pages.cgu');
	}

	/**
	 * Page Cookies
	 * @return type
	 */
	public function cookies()
	{
		return view('pages.cookies');
	}

	/**
	 * Page contacts
	 * @return type
	 */
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
//	public function login(Request $request)
//	{
//		$loginOk = [
//			'etat'	 => true,
//			'info'	 => 'Connexion réussie !'
//		];
//		$loginKo = [
//			'etat'	 => false,
//			'info'	 => 'Connexion échouée, merci de vérifier vos identifiants de connexion'
//		];
//		//vérification du login
//		if ($request->input('loginModalFormEmail') !== null && $request->input('loginModalFormPassword') !== null) {
//
//			$_SESSION['connected']		 = true;
////			$_SESSION['profil'] = [];
////			$_SESSION['profil']['date_login'] = date();
//			$_SESSION['profil']['id']	 = 3;
//			$_SESSION['profil']['email'] = $request->input('loginModalFormEmail');
//			$infoLogin					 = $loginOk;
//		} else {
//			$infoLogin = $loginKo;
//		}
//		//retour à la page d'accueil
//
//		return redirect('/');
////		return view('pages.home', compact('infoLogin'));
//	}
//	public function singin(Request $request)
//	{
//		$infoSignin = null;
//
//		return view('pages.home', compact('infoSignin'));
//	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function detail($id, Request $request)
	{
		$room = \App\Room::leftJoin('media', 'room.id_media', '=', 'media.id')
		 ->find($id);

		$reservations = DB::table('reservation')
		  ->where('id_room', '=', $id)->get();

		$reservations = $reservations->toArray();

		$dates = array();

		foreach ($reservations as $date) {
			$dates[] = array(date('d/m/Y', strtotime($date->start)), date('d/m/Y', strtotime($date->end)));
		}

		$comments = Comment::leftJoin('user', 'comment.id_user', '=', 'user.id')
		  ->where('id_room', '=', $id)->get();

		$score		 = $count_score = 0;
		foreach ($comments as $comment) {
			$score += $comment->score;
			$count_score++;
		}
		if ($count_score > 0) {
			$room->score = round(($score / $count_score), 1);
		} else {
			$room->score = '-';
		}

		return view('pages.room.room', compact('room', 'request', 'dates', 'comments'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		if (Auth::check()) {
			$reservation = new Reservation();

			$dates = explode('-', $request->input('dates'));

			$start	 = trim($dates[0]);
			$end	 = trim($dates[1]);

			$repost = http_build_query(array(
				'start'	 => $start,
				'end'	 => $end,
				'room'	 => $_POST['room'],
				'adult'	 => $_POST['adult'],
				'child'	 => $_POST['child'],
			));

			$id_room = $request->input('id_room');
			if (empty($id_room)) return Redirect::to('/');

			$redirect = Redirect::to('/room/'.$id_room.'?'.str_replace('/', '-', urldecode($repost)));

			$persons = (int) $request->input('adult') + (int) $request->input('child');
			if (!($persons > 0)) return $redirect;

			$format = 'd/m/Y';

			$carbon_start	 = Carbon::createFromFormat($format, $start);
			$carbon_end		 = Carbon::createFromFormat($format, $end);

			$reservation->start		 = $carbon_start;
			$reservation->end		 = $carbon_end;
			$reservation->id_user	 = Auth::user()->id;
			$reservation->id_room	 = $id_room;
			//$reservation->id_specials = $request->input('');
			$reservation->persons	 = $persons;

			$reservation->save();


			$room = \App\Room::find($id_room);

			$recap = array(
				'title'		 => $room->title,
				'number'	 => $room->number,
				'dates'		 => $request->input('dates'),
				'persons'	 => $persons,
				'price'		 => $room->price,
				'total'		 => ($room->price * $carbon_start->diff($carbon_end)->days),
			);

			return view('pages.room.recap', compact('recap'));
		} else {
			$dates = explode('-', $request->input('dates'));

			$start	 = trim($dates[0]);
			$end	 = trim($dates[1]);

			$repost = http_build_query(array(
				'start'	 => $start,
				'end'	 => $end,
				'room'	 => $_POST['room'],
				'adult'	 => $_POST['adult'],
				'child'	 => $_POST['child'],
			));

			$id_room = $request->input('id_room');
			if (empty($id_room)) return Redirect::to('/');

			$redirect = Redirect::to('/room/'.$id_room.'?'.str_replace('/', '-', urldecode($repost)));

			$persons = (int) $request->input('adult') + (int) $request->input('child');
			if (!($persons > 0)) return $redirect;

			$format = 'd/m/Y';

			$carbon_start	 = Carbon::createFromFormat($format, $start);
			$carbon_end		 = Carbon::createFromFormat($format, $end);

			$request->start		 = $carbon_start;
			$request->end		 = $carbon_end;
			$request->id_room	 = $id_room;
			$request->persons	 = $persons;

			return view('pages.room.now', compact('request'));
		}
	}

	/**
	 * Page de recherche
	 * @param Request $request
	 * @return type
	 */
	public function search(Request $request)
	{
		$roomController = new RoomController();
		return $roomController->index($request);
	}

	/**
	 * Page de réservation
	 * @param Request $request
	 * @return type
	 */
	public function booking(Request $request)
	{
		/*
		 * "_token" => "2uocjPRZFcuSHKPlZS2Ualtoc0GeI8PbnG1CbWsd"
		  "email" => "antonin.heb@gmail.com"
		  "last_name" => "HEBERT"
		  "first_name" => "Antonin"
		  "room" => "1"
		  "adult" => "1"
		  "child" => "0"
		  "dates" => "13/09/2018 - 14/09/2018"
		  "id" => "8" */
		$reservation = new Reservation();

		$dates = explode('-', $request->input('dates'));

		$start	 = trim($dates[0]);
		$end	 = trim($dates[1]);

		$repost = http_build_query(array(
			'start'	 => $start,
			'end'	 => $end,
			'room'	 => $_POST['room'],
			'adult'	 => $_POST['adult'],
			'child'	 => $_POST['child'],
		));

		$id_room = $request->input('id');
		if (empty($id_room)) return Redirect::to('/');

		$redirect = Redirect::to('/room/'.$id_room.'?'.str_replace('/', '-', urldecode($repost)));

		$persons = (int) $request->input('adult') + (int) $request->input('child');
		if (!($persons > 0)) return $redirect;

		$format = 'd/m/Y';

		$carbon_start	 = Carbon::createFromFormat($format, $start);
		$carbon_end		 = Carbon::createFromFormat($format, $end);


		$id_user = DB::table('user')->insertGetId([
			'email'		 => $request->input('email'),
			'first_name' => $request->input('first_name'),
			'last_name'	 => $request->input('last_name'),
		]);

		$reservation->start		 = $carbon_start;
		$reservation->end		 = $carbon_end;
		$reservation->id_user	 = $id_user;
		$reservation->id_room	 = $id_room;
		//$reservation->id_specials = $request->input('');
		$reservation->persons	 = $persons;

		$reservation->save();


		$room = \App\Room::find($id_room);

		$recap = array(
			'title'		 => $room->title,
			'number'	 => $room->number,
			'dates'		 => $request->input('dates'),
			'persons'	 => $persons,
			'price'		 => $room->price,
			'total'		 => ($room->price * $carbon_start->diff($carbon_end)->days),
		);

		return view('pages.room.recap', compact('recap'));
	}
}