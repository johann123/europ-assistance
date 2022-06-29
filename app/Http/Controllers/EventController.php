<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function reserve(Request $request, int $id): RedirectResponse
    {
        if (Reservation::where('user_id', Auth::user()->id)->where('event_id', $id)->get()->count() === 0) {
            $reservation = new Reservation;
            $reservation->user_id = Auth::user()->id;
            $reservation->event_id = $id;
            $reservation->save();
        }
        return redirect('dashboard');
    }
}
