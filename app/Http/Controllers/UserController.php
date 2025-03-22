<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Package;
use App\Models\Rating;
use App\Http\Requests\ReservationRequest;
use Auth;
use Redirect;
use Session;
use Carbon\Carbon;
use App\Repository\IUserRepository;
use DB;

class UserController extends Controller
{

    public $uservar;

    public function __construct(IUserRepository $uservar){
  $this->uservar=$uservar;
    }

    public function reservation(ReservationRequest $request){
      
        return  $this->uservar->reservation($request);

        
    }

    public function thankyou(){
        return view('user.thankyou');
    }


    public function myReservations(Request $request){
      if($request->package_id==''){
     
              $reservations=Reservation::where('user_id',Auth::user()->id)->get();
              return view('user.reservation',compact('reservations'));
      }else{
        $package_id= $request->package_id;
      $user_id= $request->user_id;
      $getID=DB::table('notifications')->where('data->package_id',$package_id)->where('data->user_id',Auth::user()->id)->pluck('id');
      DB::table('notifications')->where('id',$getID)->update([
        'read_at'=>now()
      ]);
            $reservations=Reservation::where('user_id',Auth::user()->id)->get();
            return view('user.reservation',compact('reservations'));
      }
     
     

      
    }
    
    public function cancelReservation(Request $request){
        return  $this->uservar->cancelReservation($request);
 
      }

      public function editReservation(Request $request){
        return  $this->uservar->editReservation($request);
    
  
      }

      public function rating(Request $request){
        return  $this->uservar->rating($request);

      }
      public function profile(){
        return 'profile';
      }
      
   
}
