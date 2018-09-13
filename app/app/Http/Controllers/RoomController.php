<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		//Si aucun des champs de recherche n'est rempli
		$rooms = DB::table('room')
		 ->leftjoin('media', 'room.id_media', '=', 'media.id');

		//Gestion de la recherche via la date saisie
		$start	 = $request->input('start');
		$end	 = $request->input('end');
		if ((!empty($start) && !empty($end)) && (strtotime($start) <= strtotime($end))) {
			$reservations = DB::table('reservation')
			 ->whereBetween('start', [$start, $end])
			 ->orwhereBetween('end', [$start, $end])
			 ->get(['id_room']);

			$rooms_id = array();
			foreach ($reservations->toArray() as $key_item => $item) {
				$rooms_id[] = $item->id_room;
			}

			$rooms = $rooms->whereNotIn('room.id', $rooms_id);
		} else {
			$rooms = $rooms->where('room.id', '0');
		}

		//Gestion de la recherche via des mots-clés
		$keywords = $request->input('searchField');
		if (!empty($keywords)) {
			$keywords = explode(',', $keywords);

			//Ex : ceci est une imbrication de clause where
			$rooms = $rooms->where(function ($q) use ($keywords) {
				//Recherche sur le titre de la chambre
				foreach ($keywords as $keyword) {
					$q = $q->orWhere('room.title', 'LIKE', '%'.trim($keyword).'%');
				}

				//Recherche sur la description de la chambre
				foreach ($keywords as $keyword) {
					$q = $q->orWhere('room.description', 'LIKE', '%'.trim($keyword).'%');
				}
			});
		}

		//Gestion de la recherche via le nombre de chambres
		//TODO: Requête pour trouver les chambres libres en fonction du nombre indiqué
		//Gestion de la recherche via le nombre d'enfants et d'adultes
		$persons = $request->input('adult') + $request->input('child');
		if (is_int((int) $persons)) {
			$rooms = $rooms->Where('room.persons', '>=', (int) $persons);
		}

		// Gestion des filtres
		switch ($request->input('orderSelect')) {
			case 'price_asc':
				$rooms	 = $rooms->orderBy('room.price', 'asc');
				break;
			case 'price_desc':
				$rooms	 = $rooms->orderBy('room.price', 'desc');
				break;
			case 'area_asc':
				$rooms	 = $rooms->orderBy('room.area', 'asc');
				break;
			case 'area_desc':
				$rooms	 = $rooms->orderBy('room.area', 'desc');
				break;
			case 'score_asc':
				$rooms	 = $rooms->orderBy('room.score', 'asc');
				break;
			case 'score_desc':
				$rooms	 = $rooms->orderBy('room.score', 'desc');
				break;
			default:
				$rooms	 = $rooms->orderBy('room.id');
				break;
		};

		$rooms = $rooms->Where('room.id_state', '=', 1);

		$rooms = $rooms->get([
			'room.*',
			'media.path',
		]);

		foreach ($rooms as &$room) {
			$comments = Comment::leftJoin('user', 'comment.id_user', '=', 'user.id')
			  ->where('id_room', '=', $room->id)->get();

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
		}

		return view('pages.home', compact('rooms'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$room = Room::leftJoin('media', 'room.id_media', '=', 'media.id')
		 ->find($id);
		return view('pages.room.room', compact('room'));
	}

	public function comment(Request $request)
	{
		$comment			 = new Comment();
		$comment->id_room	 = $request->input('id');
		$comment->id_user	 = Auth::user()->id;
		$comment->text		 = $request->input('comment');
		$comment->id_parent	 = null;
		$comment->score		 = $request->input('note');

		$comment->save();

		$room = new PagesVisiteController();
		return $room->detail($request->input('id'), $request);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}