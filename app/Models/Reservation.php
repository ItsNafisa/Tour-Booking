<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;
class Reservation extends Model
{
    use HasFactory;
    public function package(){
        return $this->belongsTo(Package::class,'package_id');
        } 
}



