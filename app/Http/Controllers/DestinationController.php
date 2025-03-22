<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Type;
use App\Models\Country;
use File;
use App\Http\Requests\DestinationRequest;
use App\Http\Requests\UpdateDestination;
use Session;
use App\Repository\IDestinationRepository;
class DestinationController extends Controller
{
  public $destinationvar;

  public function __construct(IDestinationRepository $destinationvar){
$this->destinationvar=$destinationvar;
  }
    public function index(){
      return  $this->destinationvar->index();
       
    }
    public function create(){
      return  $this->destinationvar->create();
      
    }
    public function store(DestinationRequest $request){
      return  $this->destinationvar->store($request);
  
    }
public function edit($id){
  return  $this->destinationvar->edit($id);
   
}

public function update(Request $request){
  return  $this->destinationvar->update($request);

}


public function delete(Request $request){
  return  $this->destinationvar->delete($request);
  
  }


  public function search(Request $request){
    return  $this->destinationvar->search($request);

  }
}
