<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
class ReservationController extends Controller
{
    public function index(){
        $reservations=Reservation::get();
        return view('admin.reservation.index',compact('reservations'));
    }
}
