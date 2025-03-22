<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
Route::get('/',[HomeController::class,'index']); 

// Route::get('/admin/home', function () {
//     return view('admin.home');
// });
Route::middleware(['auth','admin:1'])->prefix('admin')->group(function(){
    Route::get('/index',[AdminController::class,'index']); 

    //Destination
    Route::get('/destination',[DestinationController::class,'index']); 
    Route::get('/destination/create',[DestinationController::class,'create']); 
    Route::post('/destination/store',[DestinationController::class,'store']); 
    Route::get('/destination/edit/{id}',[DestinationController::class,'edit']); 
    Route::post('/destination/delete',[DestinationController::class,'delete']); 
    Route::post('/destination/update',[DestinationController::class,'update']); 
    Route::post('/search',[DestinationController::class,'search']); 
    
    //Type
    Route::get('/type',[TypeController::class,'index']); 
    Route::post('/type/store',[TypeController::class,'store'])->name('add-type'); 
    Route::post('/type/update',[TypeController::class,'update'])->name('update-type'); 
    Route::post('/type/delete',[TypeController::class,'delete'])->name('delete-type'); 
    Route::get('/search-type',[TypeController::class,'search'])->name('search-type'); 
    Route::get('/find-type/{id}',[TypeController::class,'getType'])->name('find-type'); 
    //packadge
    Route::get('/package/create',[PackageController::class,'create']); 
    Route::post('/package/store',[PackageController::class,'store']); 
    Route::get('/package/index',[PackageController::class,'index']); 
    Route::post('/package/add-one-day',[PackageController::class,'addOneDay'])->name('add-one-day'); 
    Route::get('/package/show',[PackageController::class,'show']); 
    Route::post('/package/delete-day',[PackageController::class,'deleteDay']); 
    Route::post('/package/updateDay',[PackageController::class,'updateDay']); 
    Route::get('/package/editDay',[PackageController::class,'editDay']); 
    Route::post('/package/delete-one-package',[PackageController::class,'deleteOnePackage']); 
    Route::post('/package/edit-one-package',[PackageController::class,'editOnePackage']); 
    Route::post('/package/update-one-package',[PackageController::class,'updateOnePackage']); 
    Route::get('filter',[PackageController::class,'filter']); 
    
    //
    Route::post('get-states',[PackageController::class,'getState'])->name('allState'); 
    Route::post('cities',[PackageController::class,'getcities'])->name('allCity'); 

    //reservation
    Route::get('/reservation/index',[ReservationController::class,'index']); 

     //profile
     Route::get('/profile',[AdminController::class,'profile']); 
    
});

//AUTH
route::post('/login',[AuthController::class,'login'])->name('login-user');
Route::get('/loginpage',[AuthController::class,'loginview'])->name('loginpage');
Route::get('/register',[AuthController::class,'register']);
Route::post('/register',[AuthController::class,'registerUser'])->name('register-user');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


Route::middleware(['auth','admin:0'])->group(function(){
    Route::post('/reservation',[UserController::class,'reservation'])->name('reservation'); 
    Route::get('/thank-you',[UserController::class,'thankyou']);
    Route::get('/my-reservations',[UserController::class,'myReservations']);
    Route::post('/cancel-reservation',[UserController::class,'cancelReservation']);
    Route::post('/edit-reservation',[UserController::class,'editReservation'])->name('edit-reservation');
    Route::post('/add-rating',[UserController::class,'rating']);
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
   
    
    
});

Route::get('/destinations',[HomeController::class,'destinations']);
Route::get('/packages',[HomeController::class,'packages']);
Route::get('/destination/{name}',[HomeController::class,'destinationDetail']);
Route::get('/package-detail/{id}',[HomeController::class,'packageDetail']);
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/search-package',[HomeController::class,'searchPackage']);
Route::post('/searchppp',[HomeController::class,'searchPackagev2'])->name('searchPackage');




