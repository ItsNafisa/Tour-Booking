<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destinations;
class AdminController extends Controller
{
    public function index(){
    
        return view('admin.index');
    }


    public function profile(){

        return view('admin.profile');
    }
    
  
}
