<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Reservation;
use App\Models\Country;
use App\Models\Rating;
use App\Models\User;
use App\Models\Type;
use Carbon\Carbon;
use App\Repository\IHomeRepository;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TourNotification;

class HomeController extends Controller
{
 

  public $homevar;

  public function __construct(IHomeRepository $homevar){
$this->homevar=$homevar;
  }

    public function index(){

      return  $this->homevar->index();
    
    }


    public function destinations(){
      return  $this->homevar->destinations();
      
    }


    public function packages(){
      return  $this->homevar->packages();
       
    }

    public function destinationDetail($name){
      return  $this->homevar->destinationDetail($name);

    }

    public function packageDetail($id){
      return  $this->homevar->packageDetail($id);
     
    }

    public function about(){
      return view('user.about');
  }


  public function contact(){
    return view('user.contact');
}

   public function searchPackage(Request $request){
    return  $this->homevar->searchPackage($request);
   
   }
   public function searchPackagev2(Request $request){
    return  $this->homevar->searchPackagev2($request);

    
   }
}
