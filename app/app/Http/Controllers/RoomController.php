<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
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

        if (!empty($request->input('searchField'))) {
            /*$reservations = DB::table('reservation')
                ->*/
            //->leftjoin('hotel', 'room.id_hotel','=', 'hotel.id')
            //->leftjoin('type', 'room.id_type','=', 'type.id')
            //->orderBy('room.' . $request->input('inlineRadioOptions'), (null !== $request->input('inlineCheckbox')) ? 'desc' : 'asc')
            //->where('room.')
        }

        switch ($request->input('orderSelect')) {
            case 'price_asc':
                $rooms = $rooms->orderBy('room.price', 'asc');
                break;
            case 'price_desc':
                $rooms = $rooms->orderBy('room.price', 'desc');
                break;
            case 'area_asc':
                $rooms = $rooms->orderBy('room.area', 'asc');
                break;
            case 'area_desc':
                $rooms = $rooms->orderBy('room.area', 'desc');
                break;
            case 'score_asc':
                $rooms = $rooms->orderBy('room.score', 'asc');
                break;
            case 'score_desc':
                $rooms = $rooms->orderBy('room.score', 'desc');
                break;
            default:
                $rooms = $rooms->orderBy('room.id');
                break;
        };

        $rooms = $rooms->get([
            'room.*',
            'media.path',
        ]);

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
        $room = \App\Room::leftJoin('media', 'room.id_media', '=', 'media.id')
            ->find($id);
        return view('pages.room.room', compact('room'));
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