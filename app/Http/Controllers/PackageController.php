<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\State;
use App\Models\City;
use App\Models\Package;
use App\Models\Day;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\DayRequest;
use Session;
use File;
use App\Repository\IPackageRepository;

class PackageController extends Controller
{

    public $packagevar;

    public function __construct(IPackageRepository $packagevar){
  $this->packagevar=$packagevar;
    }

    public function index(){
        return  $this->packagevar->index();

    }

    public function create(Request $request){
        return  $this->packagevar->create($request);
      
    }

    public function getState(Request $request){
        return  $this->packagevar->getState($request);


    }

    public function getcities(Request $request){
        return  $this->packagevar->getcities($request);
    
            }

            public function store(PackageRequest $request){
                return  $this->packagevar->store($request);




            }

            public function addOneDay(DayRequest $request){
                return  $this->packagevar->addOneDay($request);
  
    //    }

            }

            public function show(Request $request){
                return  $this->packagevar->show($request);

            }


            public function deleteDay(Request $request){
                return  $this->packagevar->deleteDay($request);
         
            }






            public function updateDay(Request $request){
                return  $this->packagevar->updateDay($request);
   
            }
            
            public function deleteOnePackage(Request $request){
                return  $this->packagevar->deleteOnePackage($request);
         
            }

            public function editOnePackage(Request $request){
                return  $this->packagevar->editOnePackage($request);
  
            }

            public function updateOnePackage(Request $request){
                return  $this->packagevar->updateOnePackage($request);

            }

            public function filter(Request $request){
                return  $this->packagevar->filter($request);

            }
}
