<?php

namespace App\Repository;

use App\Models\Reservation;
use App\Models\Package;
use Session;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\Rating;

class UserRepository implements IUserRepository{
public function reservation(ReservationRequest $request){
//  return $request->packagee_id;
        //get date of the day
$now=Carbon::now();
$date_now=$now->toDateString();

//convert the two dates to carbon format
$Date_Now=Carbon::parse($date_now);
            $Start_Date=Carbon::parse($request->start_date);

        if($request->number_of_people > $request->remaining_chair){
        
            return response()->json([
                'status'=>false,
                'remain_chair'=>'no',
             'msg'=>'There is No Remaining Chair'
                 ]);
        }else if(Reservation::where('user_id',$request->user_id)->where('package_id',$request->packagee_id)->exists()){
            return response()->json([
                'status'=>'exists',
             'msg'=>'fail',
             'date_now'=>$date_now,
             'start_date'=>$request->start_date,
             'user_id'=>$request->user_id,
             'package_id'=>$request->packagee_id,
                 ]);
        }else if($che=$Date_Now->gt($Start_Date)){
            return response()->json([
                'status'=>'already_start',
             'msg'=>'The tour already start.',
             'date_now'=>$date_now,
             'start_date'=>$request->start_date,
             'gt'=>$che
                 ]);
        } else{
            $reservation=new Reservation();
            $reservation->user_id=$request->user_id;
            $reservation->package_id=$request->packagee_id;
            $reservation->number_of_people=$request->number_of_people;
            $people=$request->number_of_people;
            $price=$request->price;
            $total=$people * $price;
            $reservation->total_price=$total;
            $reservation->save();
            $mypackage=Package::find($request->packagee_id);
            $minus=$request->remaining_chair - $request->number_of_people;
            $mypackage->remaining_chair=$minus;
            $mypackage->save();
            return response()->json([
                'status'=>true,
             
                 ]);
        }
}

// public function myReservation(Request $request){
// return $request->package_id;
//     $reservations=Reservation::where('user_id',Auth::user()->id)->get();
//     return view('user.reservation',compact('reservations'));
// }

public function cancelReservation(Request $request){
    $reservation=Reservation::findOrFail($request->reservation_id);
    $package=Package::where('id',$reservation->package_id)->first();
    $package->remaining_chair=$package->remaining_chair + $reservation->number_of_people;
    $package->save();
    $reservation->delete();
   return redirect()->back()->with('cancel','Reservation canceled successfully');
}

public function editReservation(Request $request){
    $reservation=Reservation::findOrFail($request->reservation_id);
    $package=Package::where('id',$reservation->package_id)->first();

if($request->number_of_people > $package->remaining_chair){
    return response()->json([
       'status'=>false,
    'msg'=>$package->remaining_chair
        ]);    
}else{
 
   $package->remaining_chair=$package->remaining_chair + $reservation->number_of_people;
   $package->save();

   $package->remaining_chair=$package->remaining_chair - $request->number_of_people;
   $package->save();

       $price=$package->price;
   $total_price=$price * $request->number_of_people;

   $reservation->number_of_people=$request->number_of_people;
   $reservation->total_price=$total_price;
   $reservation->save();  

         Session::flash('succcess','Reservation updated successfully');
   return response()->json([
       'status'=>true,

       'location'=>'my-reservations'
        ]); 
}

}

public function rating(Request $request){
    $stars_rated=$request->product_rating;
$package_id=$request->package_id;
$verify_reservation=Reservation::where('user_id',Auth::user()->id)->where('package_id',$package_id)->get();
if($verify_reservation->count() > 0){
    $exsistig_rating=Rating::where('user_id',Auth::user()->id)->where('package_id',$package_id)->first();
    if($exsistig_rating){
        $exsistig_rating->stars_rated=$stars_rated;
        $exsistig_rating->save();
    }else{
        $rate=new Rating();
        $rate->user_id=Auth::user()->id;
        $rate->package_id=$package_id;
        $rate->stars_rated=$stars_rated;
        $rate->save();
    }
    return redirect()->back()->with('rate_status','Thank you for rating this package.');

}else{
    return redirect()->back()->with('rate_status','You cannot rate this package unless you book it!');
}
}
}
?>