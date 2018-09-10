<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function faq()
    {
        return view('pages.faq');
    }

    public function cgu()
    {
        return view('pages.cgu');
    }

    public function cookies()
    {
        return view('pages.cookies');
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
            'etat' => true,
            'info' => 'Connexion réussie !'
        ];
        $loginKo = [
            'etat' => false,
            'info' => 'Connexion échouée, merci de vérifier vos identifiants de connexion'
        ];
        //vérification du login
        if ($request->input('loginModalFormEmail') !== null && $request->input('loginModalFormPassword') !== null) {

            $_SESSION['connected'] = true;
//			$_SESSION['profil'] = [];
//			$_SESSION['profil']['date_login'] = date();
            $_SESSION['profil']['id'] = 3;
            $_SESSION['profil']['email'] = $request->input('loginModalFormEmail');
            $infoLogin = $loginOk;
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

        return view('pages.room.room', compact('room', 'request', 'dates'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        return Redirect::to('/');
    }

    public function search(Request $request)
    {
        $roomController = new RoomController();
        return $roomController->index($request);
    }
}
