<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>Travel Package</title>
    <link rel="shortcut icon" href="{{asset('images/fav.png')}}" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/fav.jpg')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/notification.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slider/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slider/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    
</head>

<body>
  
    <!----- ############# Header ################ ----->
    
   <header class="container-fluid">
       <div class="header-top" style="background-color:white;">
        

       </div>
       <div id="menu-jk" class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="logo col-md-3">
                       <a href="{{url('/')}}"> <img src="{{asset('images/logo.png')}}" alt=""></a>
                        <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="navs d-none d-md-block col-md-9">
                        <ul>
                            <li><a href="{{url('packages')}}">Packages</a></li>
                            <li><a href="{{url('destinations')}}">Destinations</a></li>

                
                            @auth
                            <li><a href="{{url('my-reservations')}}">Reservation</a></li>
                            @endauth
                        
                            @guest   
                        
<li><a href="{{url('loginpage')}}">Login</a></li>
<li><a href="{{url('register')}}">Register</a></li>
@endguest  
@auth 
<li>                

<a href="{{url('logout')}}">Logout</a> 
</li>
@endauth
@auth
<li>
  
<div class="icon" onclick="toggleNotifi()">
			<img src="{{asset('assets/images/icons8-notification-100.png')}}" alt=""> 
             <!-- <i class="fa-solid fa-bell"></i> -->
            <span>{{Auth::user()->unreadNotifications->count()}}</span>
		</div>
		<div class="notifi-box" id="box">
			<h2>Notifications <span>{{Auth::user()->unreadNotifications->count()}}</span></h2>
            @foreach(Auth::user()->unreadNotifications as $notification)
            <form method="GET" action="{{url('my-reservations')}}">
            <input type="hidden" value="{{$notification->data['package_id']}}" name="package_id">
            <input type="hidden" value="{{$notification->data['user_id']}}" name="user_id">
                <button type="submit" style="background-color:transparent;border:none;outline:none;">
            
               
			<div class="notifi-item">
				<img src="{{asset('packageImage/'.$notification->data['package_image'])}}" alt="img">
				<div class="text">
				   <h4>{{Auth::user()->name}}</h4>
				   <p>Your Trip to <span style="color:green;">{{$notification->data['country']}}</span> , <span style="">{{$notification->data['state']}}</span> , <span style="">{{$notification->data['city']}}</span> <span style="color:green;">Will start tommorow</span> [{{$notification->data['start_date']}}].</p>
			    </div> 
			</div>
</button>
</form>
@endforeach

		</div>
</li>
@endauth
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
  </header>
   
         <!--  ************************* Page Title Starts Here ************************** -->
         <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Create Account</h2>
                <ul>
                    <li> <a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                    <!-- <li><i class="fas fa-angle-double-right"></i> Login</li> -->
                </ul>
            </div>
        </div>
    </div>
<div class="container">
@if($errors->has('incorrect'))
<div style="color:red;">{{$errors->first('incorrect')}}</div>
@endif
<form id="registerForm" method="POST" action="{{url('register')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group mt-3">
<label>Name</label>
<input type="text" class="form-control mt-2" placeholder="Enter name" name='name' value="{{old('name')}}">
<div class="alert alert-danger mt-3 p-1" id="name_error" style="display:none;"></div>
    </div>
@error('name')
<div style="color:red;">{{$message}}</div>
@enderror

    <div class="form-group mt-5">
<label>Email</label>
<input type="email" class="form-control mt-2" placeholder="Enter email" name='email' value="{{old('email')}}">
<div class="alert alert-danger mt-3 p-1" id="email_error" style="display:none;"></div>
    </div>
    @error('email')
<div style="color:red;">{{$message}}</div>
@enderror

    <div class="form-group mt-5">
<label>Password</label>
<input type="password" class="form-control mt-2" placeholder="Enter password" name='password' value="{{old('password')}}">
<div class="alert alert-danger mt-3 p-1" id="password_error" style="display:none;"></div>
    </div>
    @error('password')
<div style="color:red;">{{$message}}</div>
@enderror

    <div class="form-group mt-5">
<label>Phone Number</label>
<input type="text" class="form-control mt-2" placeholder="Enter phone number" name='phone' value="{{old('phone')}}">
<div class="alert alert-danger mt-3 p-1" id="phone_error" style="display:none;"></div>
    </div>
    @error('phone')
<div style="color:red;">{{$message}}</div>
@enderror

    <div class="form-group mt-5">
<label>Your image</label>
    <input type="file" class="form-control mt-2" name='image' value="{{old('image')}}">
    <div class="alert alert-danger mt-3 p-1" id="image_error" style="display:none;"></div>
    </div>
    @error('image')
<div style="color:red;">{{$message}}</div>
@enderror

    <div class="form-group mt-5">
<label>City</label>
<input type="text" class="form-control mt-2" placeholder="Enter your city" name='city' value="{{old('city')}}">
<div class="alert alert-danger mt-3 p-1" id="city_error" style="display:none;"></div>
    </div>
    @error('city')
<div style="color:red;">{{$message}}</div>
@enderror

    <div class="form-group mt-5">
<label>Country</label>
<input type="text" class="form-control mt-2" placeholder="Enter your country" name='country' value="{{old('country')}}">
<div class="alert alert-danger mt-3 p-1" id="country_error" style="display:none;"></div>
    </div>
    @error('country')
<div style="color:red;">{{$message}}</div>
@enderror

   
    <button class="btn btn-primary animated bounceInUp  w-100 mt-4 mb-4">Create </button>
  </form>
</div>             
    
    
</body>
<script src="{{asset('jquery-3.7.1.min.js')}}"></script>
<script>


    function check(evt){
        if(evt.target.value==='login'){
           window.location='loginpage';
        }else if(evt.target.value==='register'){
            window.location='register';
        } if(evt.target.value==='logout'){
            window.location='logout';
        }else if(evt.target.value==='myaccount'){
            window.location='/';
        }else if(evt.target.value==='about'){
            window.location='about';
        }else if(evt.target.value==='contact'){
            window.location='contact';
        }
    }

    </script>

<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/notification.js')}}"></script>
</html>