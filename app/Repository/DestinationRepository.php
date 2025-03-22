<?php

namespace App\Repository;

use App\Models\Destination;
use App\Models\Type;
use Session;
use App\Http\Requests\DestinationRequest;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\DestinationType;
use File;

class DestinationRepository implements IDestinationRepository{
public function index(){
    $destinations=Destination::with('types')->orderBy('created_at','desc')->get();
    $countries=Country::get();
    return view('admin.destination.index',compact('destinations','countries'));
}

public function create(){
    $types=Type::get();
    $countries=Country::get();
    return view('admin.destination.create',compact('types','countries'));
}

public function store(DestinationRequest $request){
    if(Destination::where('country_id',$request->country_id)->exists()){
        return redirect()->back()->withErrors([
            'already'=>'This destination is already exists'
         ]);
    }
    if($request->types){
      $destination=new Destination(); 
      $destination->country_id=$request->country_id;
        if($request->hasFile('image')){
          $image=$request->image;
          $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->image->move('destinationImage',$imagename);
          $destination->image=$imagename;
      }
     $saved=$destination->save();
     if($saved){
      $destination->types()->attach($request->types);
      Session::flash('destination_created_successfully','Destination Created successfully');
      return redirect('admin/destination');
     }else{
      return redirect()->back()->withErrors([
          'Failing'=>'Failed Saving'
       ]);
     }
    }else{
      return redirect()->back()->withErrors([
        'type'=>'please select activity'
     ]);
    }
}

public function edit($id){
    $destination=Destination::findOrFail($id);
    $countries=Country::get();
    $types=Type::get();
    return view('admin.destination.edit',compact('destination','types','countries'));
}

public function update(Request $request){
    $destination=Destination::findOrFail($request->id);
    if($request->country_id == $destination->country_id){
      $imagename;
      $destination=Destination::findOrFail($request->id);
      if($request->image){
          $path='destinationImage/'.$destination->image;
          if(File::exists($path)){
              File::delete($path);
          }
      
          $image=$request->image;
          $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->image->move('destinationImage',$imagename);
          $destination->image=$imagename;
        }
      $packages=$destination->packages;
  foreach($packages as $package){
  foreach($request->types as $t){
    if($package->type_id != $t){
      $package->delete();
    }
  }
  }
     
        $destination->types()->sync($request->types);
    
        Session::flash('same','Destination updated successfully');
          $destination->country_id=$request->country_id;
        $destination->save();
      return redirect('admin/destination');
    }else if(Destination::where('country_id',$request->country_id)->exists()){
      return redirect()->back()->withErrors([
        'alreadyEditingDestination'=>'This destination is already exists'
     ]);
   
    }else{
      $imagename;
      $destination=Destination::findOrFail($request->id);
      if($request->image){
          $path='destinationImage/'.$destination->image;
          if(File::exists($path)){
              File::delete($path);
          }
          $image=$request->image;
          $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->image->move('destinationImage',$imagename);
          $destination->image=$imagename;
        }
        $destination->types()->sync($request->types);
          $destination->country_id=$request->country_id;
        $destination->save();
        Session::flash('updated','Destination updated successfully');
      return redirect('admin/destination');
    }
}

public function delete(Request $request){
    $type=Destination::findOrFail($request->id);
    if($type->image){
        $path='destinationImage/'.$type->image;
        if(File::exists($path)){
            File::delete($path);
        }
      }
      $type->delete();
      Session::flash('destination_deleted_successfully','Destination deleted successfully');
      return redirect('admin/destination');
}

public function search(Request $request){
    $search=$request->search;
    $destinations=Destination::whereHas('country',function($query) use($search){
      $query->where('sortname','like',"%$search%");
    })->get();
  
    $countries=Country::get();
    return view('admin.destination.index',compact('destinations','countries'));
}

}

?>