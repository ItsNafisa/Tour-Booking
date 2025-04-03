<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Travel Package</title>
    <link rel="shortcut icon" href="{{asset('images/fav.png')}}" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/fav.jpg')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slider/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slider/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/notification.css')}}">
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
                        <img src="{{asset('images/logo.png')}}" alt="">
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
<li><a href="{{url('register')}}">git hub</a></li>
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


  <div class="untree_co-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center pt-5">
          <span class="display-3 thankyou-icon text-primary">
          <img src="assets/images/logo.png" alt="">
          </span>
          <h2 class="display-3 text-black">Thank you!</h2>
          <p class="lead mb-5">You successfully booking in the tour.</p>
          <!-- <p><a href="{{url('/')}}" class="btn btn-sm btn-outline-black" style="background-color:green;color:white;">Back to home</a></p> -->
          <div class="btn btn-primary animated bounceInUp"><a href="{{url('/')}}" style="color:white;">Back to home</a> </div>
        </div>
      </div>
    </div>
  </div>



      <!-- ######## Footer Starts Here ####### -->   
    
      <footer class="container-fluid footer-cont">
        <div class="container">
            <div class="footer-top row">
                <div class="col-md-4 foot-logo">
                    <h2>Travel Packages</h2>
                </div>
                <div class="col-md-8 foot-addr">
                    <p>Donec venenatis metus at diam condimentum pretiuteger aliquet a turpis quis pel len tesque ueta turpis quis venenatissolelementum</p>
                    <ul>
                        <li class="pl-0"><i class="fas fa-map-marker-alt"></i> Antonya Street, 23/H-2, Building, TA, AUS </li>
                        <li><i class="fas fa-mobile-alt"></i> +177 (089) 987665  </li>
                        <li><i class="far fa-envelope"></i> support@smarteyeapps.com </li>
                    </ul>
                </div>
            </div>
            <div class="foot-botom row">
                <div class="col-md-3">
                    <div class="fotter-coo">
                        <h5>IMPORTANT LINKS</h5>
                        <ul>
                            <li><i class="fas fa-caret-right"></i> ABOUT US</li>
                            <li><i class="fas fa-caret-right"></i> COMPANY PROFILE</li>
                            <li><i class="fas fa-caret-right"></i> OUR SERVICES</li>
                            <li><i class="fas fa-caret-right"></i> CONTACT US</li>
                            <li><i class="fas fa-caret-right"></i> READ BLOG</li>
                        </ul>
                    </div>
                    
                </div>
                 <div class="col-md-4">
                    <div class="fotter-coo">
                        <h5>GLOBAL UPDATE NEWS</h5>
                        <ul>
                            <li><i class="fas fa-caret-right"></i> 100 CHILDREN RESCUE FROM WAR ZONE</li>
                            <li><i class="fas fa-caret-right"></i> THR FRESH HOUSE CHILD</li>
                            <li><i class="fas fa-caret-right"></i> CREATE AWARENESS IN EDUCATON</li>
                            <li><i class="fas fa-caret-right"></i> WHAT HAPPEN WHEN WE LIVE!</li>
                            <li><i class="fas fa-caret-right"></i> READ BLOG</li>
                        </ul>
                    </div>
                    
                </div>
                <div class="col-md-5">
                    <div class="fotter-coo">
                        <h5>PHOTO GALLERY</h5>
                        <div class="gallery-row row">
                            <div class="col-md-4 col-6 gall-col">
                                <img src="{{asset('images/blog/blog1.jpg')}}" alt="">
                            </div>
                            <div class="col-md-4 col-6 gall-col">
                                <img src="{{asset('images/blog/blog2.jpg')}}" alt="">
                            </div>
                            <div class="col-md-4 col-6 gall-col">
                                <img src="{{asset('images/blog/blog3.jpg')}}" alt="">
                            </div>
                            <div class="col-md-4 col-6 gall-col">
                                <img src="{{asset('images/blog/blog4.jpg')}}" alt="">
                            </div>
                            <div class="col-md-4 col-6 gall-col">
                                <img src="{{asset('images/blog/blog5.jpg')}}" alt="">
                            </div>
                            <div class="col-md-4 col-6 gall-col">
                                <img src="{{asset('images/blog/blog6.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>

     <div class="copy">
        <div class="container">
            <a href="https://www.smarteyeapps.com/">2015 &copy; All Rights Reserved | Designed and Developed by Smarteyeapps</a>

            <span>
                <a><i class="fab fa-github"></i></a>
                <a><i class="fab fa-google-plus-g"></i></a>
                <a><i class="fab fa-pinterest-p"></i></a>
                <a><i class="fab fa-twitter"></i></a>
                <a><i class="fab fa-facebook-f"></i></a>
        </span>
        </div>

    </div>                 
    
    
</body>
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
        }
    }
</script>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/notification.js')}}"></script>

</html>