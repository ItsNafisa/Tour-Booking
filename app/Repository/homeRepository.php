<?php

namespace App\Repository;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Country;
use Auth;
use App\Models\Rating;

class homeRepository implements IHomeRepository{

public function index(){
    if(Auth::check()){
        if(auth()->user()->role==1){
          return redirect('admin/index');
      }else{
        $destinations=Destination::latest()->take(6)->get();
        $packages=Package::with('ratings')->latest()->take(6)->get();
      
        $types=Type::all();
        return view('user.index',compact('destinations','packages','types'));
      }
      }else{
    
          $destinations=Destination::latest()->take(6)->get();
       
          $packages=Package::with('ratings')->latest()->take(6)->get();
          $types=Type::all();
        return view('user.index',compact('destinations','packages','types'));
      }  
}

public function destinations(){
    $destinations=Destination::all();
    return view('user.destination',compact('destinations'));
}

public function packages(){
    $packages=Package::with('ratings')->get();
    return view('user.packages',compact('packages'));
}

public function destinationDetail($name){
    $country=Country::where('sortname',$name)->first();
$country_id=$country->id;
$destination=Destination::where('country_id',$country_id)->first();
return view('user.destination_detail',compact('destination'));
}


public function packageDetail($id){
    $package=Package::findOrFail($id);
    $ratings=Rating::where('package_id',$package->id)->get();
    $rating_sum=Rating::where('package_id',$package->id)->sum('stars_rated');
    if(Auth::user() != null){
    $user_rating=Rating::where('package_id',$package->id)->where('user_id',Auth::user()->id)->first();
    }else{
      $user_rating=0;
    }
    if($ratings->count() > 0){
      $rating_value=$rating_sum/$ratings->count();
    }else{
      $rating_value=0;
    }
    
    return view('user.package_detail',compact('package','ratings','rating_value','user_rating'));
}

public function searchPackage(Request $request){
    $validate=$request->validate([
        'start_date'=>'required|date',
        'end_date'=>'required|date',
        'type'=>'required',
      ]);
      $start=$request->start_date;
      $end=$request->end_date;
      $packages=Package::whereDate('start_date','>=',$start)->whereDate('end_date','<=',$end)->where('type_id',$request->type)->get();
      $destinations=Destination::latest()->take(4)->get();
      $types=Type::all();
      return view('user.index',compact('packages','destinations','types'));
}


public function searchPackagev2(Request $request){
    if($request->activity_id=='all'){
        $packages=Package::with(['country','city','state','ratings'])->latest()->take(6)->get();
      }else{
      $packages=Package::with(['country','city','state','ratings'])->orwhere('type_id',$request->activity_id)->orwhere('start_date','>=',$request->selected_start_date)->orwhere('end_date','<=',$request->selected_end_date)->get();
      }
      return response()->json([
    'status'=>true,
    'packages'=>$packages,
    'id'=>$request->activity_id
  ]);
}
}