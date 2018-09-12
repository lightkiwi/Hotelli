<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param $id_user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, $id_user)
    {
        if (Auth::user()->id == $id_user) {
            $reservation = Reservation::find($id);
            $reservation->delete();
        }
        return Redirect::to('/account/booking');
    }
}
