<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\DestinationType;
use App\Models\Destination;
use File;
use Session;
use App\Http\Requests\TypeRequest;
use App\Repository\ITypeRepository;
class TypeController extends Controller
{

  public $typevar;

  public function __construct(ITypeRepository $typevar){
$this->typevar=$typevar;
  }

    public function index(){
    return  $this->typevar->index();
   
    }

    public function store(TypeRequest $request){
  return  $this->typevar->store($request);
   
     
         
      }

      public function update(Request $request){
        return  $this->typevar->update($request);

      }

      public function delete(Request $request){
        return  $this->typevar->delete($request);

     
      }


      public function search(Request $request){
        return  $this->typevar->search($request);

      }
  
      public function getType($id){
try{
$type=Type::where('id',$id)->get();
return response()->json(['success'=>true,'data'=>$type]);
}catch(\Exception $e){
  return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
}
      }
}
