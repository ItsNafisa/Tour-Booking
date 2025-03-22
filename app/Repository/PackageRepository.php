<?php

namespace App\Repository;

use App\Models\Package;
use App\Models\City;
use App\Models\Destination;
use App\Models\State;
use App\Models\Day;
use Session;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\DayRequest;
use Illuminate\Http\Request;
use File;

class PackageRepository implements IPackageRepository{
public function index(){
    $packages=Package::orderBy('created_at','desc')->get();
        return view('admin.package.index',compact('packages'));
}

public function create(Request $request){
    $destination=Destination::findOrFail($request->destination_id);
    $type_name=$request->type_name;
    $type_id=$request->type_id;
    return view('admin.package.create',compact('destination','type_name','type_id'));
}

public function getState(Request $request){
    $data=State::where('country_id',$request->country_id)->get();
return response()->json([
    'status'=>true,
    'data'=>$data,
]);
}

public function getcities(Request $request){
    $data=City::where('state_id',$request->state_id)->get();
    return response()->json([
        'status'=>true,
        'data'=>$data,
    ]);
}

public function store(PackageRequest $request){
    $package=new Package();
$package->type_id=$request->type_id;
$package->country_id=$request->countryID;
$package->destination_id=$request->destination_id;
$package->state_id=$request->state_id;
$package->city_id=$request->city_id;
$package->start_date=$request->start_date;
$package->end_date=$request->end_date;
$package->number_of_people=$request->number_of_people;
$package->description=$request->description;
$package->price=$request->price;
$package->remaining_chair=$request->number_of_people;
if($request->hasFile('image')){
    $image=$request->image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('packageImage',$imagename);
    $package->image=$imagename;
}
$package->save();
return redirect('admin/package/index');
}

public function addOneDay(DayRequest $request){
    $day=new Day();
    $day->title=$request->title;
    $day->detail=$request->detail;
    $day->package_id=$request->package_id;
if($request->hasFile('image')){
$image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('dayImage',$imagename);
$day->image=$imagename;
}
$saved=$day->save();
if($saved){
return redirect()->back()->with('day_added','day added successfully');
}else{
                      return redirect()->back()->with('day_added_fail','day added failed');
}
}

public function show(Request $request){
    $package=Package::findOrFail($request->package_id);
return view('admin.package.show',compact('package'));
}

public function deleteDay(Request $request){
    $day=Day::findOrFail($request->id);
    if($day->image){
        $path='dayImage/'.$day->image;
        if(File::exists($path)){
            File::delete($path);
        }
      }
      $day->delete();
      Session::flash('day_deleted_successfully','day deleted successfully');
      return redirect()->back();
}


public function updateDay(Request $request){
    $imagename;
    $day=Day::findOrFail($request->id);
    if($request->image){
        $path='dayImage/'.$day->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('dayImage',$imagename);
        $day->image=$imagename;
      }
      $day->title=$request->title;
      $day->detail=$request->detail;
      $day->save();
      $request->session()->now('day_updated_successfully','day updated successfully');
      $package=Package::findOrFail($request->package_id);
return view('admin.package.show',compact('package'));  
}

public function deleteOnePackage(Request $request){
    $package=Package::findOrFail($request->id);
    $days=Day::where('package_id',$request->id)->get();
   
   foreach($days as $day){
    if($day->image){
        $path='dayImage/'.$day->image;
        if(File::exists($path)){
            File::delete($path);
        }
      }

      $day->delete();
   }
    if($package->image){
        $path='packageImage/'.$package->image;
        if(File::exists($path)){
            File::delete($path);
        }
      }
      $package->delete();
      Session::flash('package_deleted_successfully','package deleted successfully');
      return redirect('admin/package/index');
}

public function editOnePackage(Request $request){
    $package=Package::findOrFail($request->package_id);
    $states=State::where('country_id',$package->country_id)->get();
return view('admin.package.edit',compact('package','states'));  
}

public function updateOnePackage(Request $request){
    $package=Package::findOrFail($request->package_id);
                $states=State::where('country_id',$package->country_id)->get();
                $package->type_id=$request->type_id;

$package->country_id=$request->country_id;
$package->destination_id=$request->destination_id;
if($request->state_id){
 if(!$request->city_id){
    $request->session()->now('select_city','you should also change CITY after changing STATE');
    return view('admin.package.edit',compact('package','states'));   
 }
}
$package->state_id=$request->state_id;
$package->city_id=$request->city_id;
$package->start_date=$request->start_date;
$package->end_date=$request->end_date;
$package->number_of_people=$request->number_of_people;
$package->description=$request->description;
$package->price=$request->price;
$package->remaining_chair=$request->number_of_people;
if($request->image){
    $path='packageImage/'.$package->image;
    if(File::exists($path)){
        File::delete($path);
    }

    $image=$request->image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('packageImage',$imagename);
    $package->image=$imagename;
  }
$package->update();
Session::flash('update_package','package updated successfully');
return redirect('admin/package/index');
}

public function filter(Request $request){
    $start=$request->start;
$end=$request->end;
$packages=Package::whereDate('start_date','>=',$start)->whereDate('end_date','<=',$end)->get();
return view('admin.package.index',compact('packages'));
}
}

?>