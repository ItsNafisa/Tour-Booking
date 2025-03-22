<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Destination;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\Type;
use App\Models\Day;
use App\Models\Rating;
class Package extends Model
{
 use HasFactory;
public function country(){
return $this->belongsTo(Country::class,'country_id');
} 
public function city(){
return $this->belongsTo(City::class,'city_id');
} 
public function state(){
return $this->belongsTo(State::class,'state_id');
} 
public function type(){
return $this->belongsTo(Type::class,'type_id');
} 
public function days(){
return $this->hasMany(Day::class,'package_id')->orderBy('created_at','asc');
} 

public function destination(){
return $this->belongsTo(Destination::class,'destination_id');
} 

public function ratings(){
    return $this->hasMany(Rating::class,'package_id');
    } 

}