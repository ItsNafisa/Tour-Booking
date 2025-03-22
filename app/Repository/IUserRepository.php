<?php

namespace App\Repository;

use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

interface IUserRepository{
 public function reservation(ReservationRequest $request);

//  public function myReservation();

 public function cancelReservation(Request $request);

 public function editReservation(Request $request);

 public function rating(Request $request);
}

?>