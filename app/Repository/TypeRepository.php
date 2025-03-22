<?php

namespace App\Repository;

use App\Models\Type;
use Session;
use App\Http\Requests\TypeRequest;
use Illuminate\Http\Request;
use File;
use App\Models\DestinationType;

class TypeRepository implements ITypeRepository{
public function index(){
    $types=Type::orderBy('created_at','desc')->get();
    return view('admin.types.index',compact('types'));
}

public function store(TypeRequest $request){
    $type=new Type();
    $type->name=$request->name;
   

     
      $image=$request->image;
      $imagename=time().'.'.$image->getClientOriginalExtension();
      $request->image->move('admin/typeImage',$imagename);
      $type->image=$imagename;

 
 $saved=$type->save();
 if($saved){
  Session::flash('activity_added','activity added successfully');
  return response()->json([
    'status'=>true,
    'msg'=>'activity added successfully',
  
   
                          ]);
 
 }else{

  return response()->json([
    'status'=>false,
    'msg'=>'fail',
   
   
                          ]);
 }
}

public function update(Request $request){
    try{ 
        $imagename;
$type=Type::findOrFail($request->id);
if($request->image){
    $path='admin/typeImage/'.$type->image;
    if(File::exists($path)){
        File::delete($path);
    }

    $image=$request->image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('admin/typeImage',$imagename);
    $type->image=$imagename;
  }
  $type->name=$request->name;
  $type->save();
  Session::flash('update_type','Activity updated successfully');
  return response()->json(['success'=>true,'msg'=>'Activity updated successfully']);

      }catch(\Exception $e){
        return response()->json(['success'=>false,'msg'=>$e->getMessage()]);    
      }
}

public function delete(Request $request){
    $type=Type::findOrFail($request->id);
        if($type->image){
            $path='admin/typeImage/'.$type->image;
            if(File::exists($path)){
                File::delete($path);
            }
          }
$destination_id=DestinationType::where('type_id',$type->id)->pluck('destination_id');
foreach($destination_id as $des){
  $del_dest=Destination::where('id',$des)->delete();
}

          $type->delete();
          Session::flash('delete_type','Activity deleted successfully');
          return redirect('admin/type');
}

public function search(Request $request){
    if($request->ajax()){
        $types=Type::where('name','like','%'.$request->search.'%')->get(); 
        return view('admin.types.index',compact('types'));
      
      }
}

}