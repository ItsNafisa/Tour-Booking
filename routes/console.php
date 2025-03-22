<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\User;
use App\Models\Package;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TourNotification;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::call(function(){
  //get date of the day
  $now=Carbon::now();
  $date_now=$now->toDateString();
  $users=array();
  $uu=array();
  //convert the two dates to carbon format
  $Date_Now=Carbon::parse($date_now);
              $reservations=Reservation::all();
              $packages=Package::select('start_date','id','country_id')->get();
              foreach($packages as $package){
                 $start_date=$package['start_date'];
                $Start_Date_carbon=Carbon::parse($start_date);
                 $yesteday=$Start_Date_carbon->subDay();
                 $yesteday_date=$yesteday->toDateString();
                 $yesteday_date_carbon=Carbon::parse($yesteday_date);
                if($yesteday_date_carbon->eq($date_now)){
   foreach($reservations as $reservation){
     if($reservation->package_id==$package['id']){
      
  //send notification to user
  $theuser=User::where('id',$reservation->user_id)->first();
  
  $country=$reservation->package->country->sortname;
  
  $city=$reservation->package->city->name;
  
  $state=$reservation->package->state->name;

  $package_id=$reservation->package_id;
  $user_id=$reservation->user_id;
 
  $user_name=$theuser['name'];
  
 $package_image=$reservation->package->image;

 $the_start_date=$reservation->package->start_date;
  $theuser->notify(new TourNotification($country,$state,$city,$user_name,$package_image,$the_start_date,$package_id,$user_id));
  
  
     }
   }
          
              }
              }
               addDaysWhenPackageEnd();
})->everyMinute();

 function addDaysWhenPackageEnd(){
  $packages=Package::all();
  //get date of the day
  $now=Carbon::now();
  $date_now=$now->toDateString();
  //convert the two dates to carbon format
  $Date_Now=Carbon::parse($date_now);
 foreach($packages as $package){
   $end_Date=Carbon::parse($package->end_date);
   $start_Date=Carbon::parse($package->start_date);
   if($end_Date->lt($Date_Now)){
     //start date=> now + 4 days
     $new_start_date=$Date_Now->addDays(4);
    $laravel_new_start_date=date($new_start_date);
   $package->start_date=$laravel_new_start_date;
     //end date=> start date + 10 days
     $new_end_date=$new_start_date->addDays(5);
     $laravel_new_end_date=date($new_end_date);
     $package->end_date=$laravel_new_end_date;
   $package->save();
   
    
   }
 
 }
}