<?php

namespace App\Http\Controllers;

use App\Address;
use App\Gender;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function account()
    {
        $user = User::leftJoin('address', 'user.id_address', '=', 'address.id')
            ->leftJoin('gender', 'user.id_gender', '=', 'gender.id')
            ->where('user.id', '=', Auth::user()->id)
            ->select([
                'user.id',
                'user.first_name',
                'user.last_name',
                'user.email',
                'user.phone',
                'user.rgpd_date',
                'user.newsletter',
                'address.address_line',
                'address.city',
                'address.region',
                'address.zip',
                'address.country',
                'gender.label as gender',
            ])
            ->get()
            ->toArray();

        $user = is_array($user) ? $user[0] : null;

        $genders = Gender::all();

        return view('pages.account.account', compact('user', 'genders'));
    }

    public function update(Request $request)
    {
        $non_upd_user = User::find($request->input('id'));

        $non_upd_user->first_name = $request->input('first_name');
        $non_upd_user->last_name = $request->input('last_name');
        $non_upd_user->email = $request->input('email');
        $non_upd_user->phone = $request->input('phone');
        $non_upd_user->newsletter = empty($request->input('newsletter')) ? false : true;
        $non_upd_user->id_gender = $request->input('genders');

        $non_upd_user->save();

        $address = Address::find($non_upd_user->id_address);

        $address->address_line = $request->input('address_line');
        $address->city = $request->input('city');
        $address->region = $request->input('region');
        $address->zip = $request->input('zip');
        $address->country = $request->input('country');

        $address->save();

        $user = User::leftJoin('address', 'user.id_address', '=', 'address.id')
            ->leftJoin('gender', 'user.id_gender', '=', 'gender.id')
            ->where('user.id', '=', Auth::user()->id)
            ->select([
                'user.id',
                'user.first_name',
                'user.last_name',
                'user.email',
                'user.phone',
                'user.rgpd_date',
                'user.newsletter',
                'address.address_line',
                'address.city',
                'address.region',
                'address.zip',
                'address.country',
                'gender.label as gender',
            ])
            ->get()
            ->toArray();

        $user = is_array($user) ? $user[0] : null;

        $genders = Gender::all();

        return view('pages.account.account', compact('user', 'genders'));
    }

    public function booking()
    {
        $reservations = Reservation::leftJoin('room', 'reservation.id_room', '=', 'room.id')
            ->where('reservation.id_user', '=', Auth::user()->id)
            ->get()
            ->toArray();

        return view('pages.account.booking', compact('reservations'));
    }
}
