<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
}

// use HasFactory;
// public function country(){
// return $this->belongsTo(Country::class,'country_id');
// } 
// public function city(){
// return $this->belongsTo(City::class,'city_id');
// } 
// public function state(){
// return $this->belongsTo(State::class,'state_id');
// } 
// public function type(){
// return $this->belongsTo(Type::class,'type_id');
// } 
// public function days(){
// return $this->hasMany(Day::class,'package_id');
// } 

// public function destination(){
// return $this->belongsTo(Destination::class,'destination_id');
// } 


// $table->id();
// $table->unsignedBigInteger('type_id');
// $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
// $table->unsignedBigInteger('destination_id');
// $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');

// $table->unsignedBigInteger('country_id');
// $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
// $table->unsignedBigInteger('state_id');
// $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
// $table->unsignedBigInteger('city_id');
// $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

// $table->date('start_date');
// $table->date('end_date');

// $table->string('number_of_people');
// $table->text('description');
// $table->string('price');
// $table->timestamps();