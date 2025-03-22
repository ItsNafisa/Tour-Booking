<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Destination;
class Type extends Model
{
    use HasFactory;
    protected $fillable=['id','name','image'];
    public function destinations(){
        return $this->belongsToMany(Destination::class,'destination_type');
    }
    
}