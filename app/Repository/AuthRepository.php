<?php

namespace App\Repository;

use Redirect;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Auth;
use Hash;
use App\Models\User;
class AuthRepository implements IAuthRepository{
    public function loginview(){
        Redirect::setIntendedUrl(url()->previous());
        return view('user.login'); 
    }

    public function login(LoginRequest $request){
        $input=$request->all();
        if(auth()->attempt(['email'=>$input['email'], 'password'=>$input['password']])){
        
         if(auth()->user()->role==1){
            //  return redirect('users');
            return response()->json([
                'status'=>true,
                'role'=>'admin',
               
                                      ]);
         }else{
        
            return response()->json([
                'status'=>true,
                'role'=>'user',
                'mylocation'=>redirect()->intended()->getTargetUrl()
                 ]);
         }
        }else{
            return response()->json([
                'status'=>false,
                
               
                                      ]);
       
        }
    }

    public function registerUser(RegisterRequest $request){
        $user=new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->city=$request->city;
        
        $user->country=$request->country;
        if($request->hasFile('image')){
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('userImage',$imagename);
            $user->image=$imagename;
        }
        
        $saved=$user->save();
        if($saved){
            Auth::login($user);
            return redirect('/');
        }else{
            return redirect()->back()->withErrors([
                   'incorrect'=>'Creating Account Failed'
                ]);
        }
    }

    public function logout(){
        Auth::logout();
        // return redirect()->intended();
        return redirect('/');
    }
}