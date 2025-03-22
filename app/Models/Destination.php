<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Country;
use App\Models\Package;
class Destination extends Model
{
    use HasFactory;
     public $table='destinations';
    protected $fillable=['name','image','continent'];
    public function types(){
        return $this->belongsToMany(Type::class,'destination_type');
    }

    public function packages(){
        return $this->hasMany(Package::class);
    } 

    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    } 
}
