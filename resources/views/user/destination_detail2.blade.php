<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Package</title>
    <link rel = "stylesheet" href = "{{asset('css/destination_detail_style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slider/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slider/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/notification.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
</head>
<body>
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
                <h2>{{$destination->country->sortname}}</h2>
                <ul>
                    <li> <a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Our Destinations</li>
                </ul>
            </div>
        </div>
    </div>

     <!-- ******************** Travel Destination Starts Here ******************* -->
<div class="container ">
    <div class="one p-5">
        <div class="row">
        <div class="col-md st">
            <div>
        <span class ="product-name text-center text-md-start">{{$destination->country->sortname}}</span>
        <p class = "product-description text-start text-md-start mt-4 mb-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae animi ad minima veritatis dolore. Architecto facere dignissimos voluptate fugit ratione molestias quis quidem exercitationem voluptas.</p>
</div>
    </div>

        <div class="col-md">
            <div class="row">
            <img id="selectedImage" src = "{{asset('destinationImage/'.$destination->image)}}" style="height:300px;display:block;margin:0 auto;" class="allImages w-100">
            </div>
        <div class="row mt-3">
        @forelse($destination->packages->take(4) as $pack)
                        <div class="col-md">
         <img src = "{{asset('packageImage/'.$pack->image)}}" style="cursor:pointer;" class="allImages w-md-50 w-100 h-75 h-md-100 img-fluid">
</div>
                           
                        @empty
                      
                        @endforelse
        </div>
        </div>
      
        </div>
    </div>
    <hr>

  @if($destination->packages->count() > 0)
                <span class = "product-name">Related Packages</span>
                @endif
              <div class="row mb-4 ">
                @forelse($destination->packages->take(6) as $pack)
              <div class="col-md-6 col-lg-4 mt-4">
              <a href="{{url('package-detail',$pack->id)}}" style="text-decoration:none;">
              <div class="card d-flex justify-content-center align-items-center" style="width:300px;box-shadow:0px 6px 4.7px 0.3px rgba(0, 0, 0, 0.2);cursor:pointer;">
              <img src = "{{asset('packageImage/'.$pack->image)}}" class="card-img-top img-fluid" style="height:200px;">
              <div class="card-body">
                <h5 class="card-title">{{$pack->type->name}}</h5>
                <?php 
                        $diff=strtotime($pack->end_date) - strtotime($pack->start_date);
                        $days=abs(round($diff / 86400));
                            ?>
      <p style="color:black;">{{$pack->country->sortname}} - {{$days}} Days in {{$pack->city->name}}, {{$pack->state->name}}</p>
              </div>
</div>
</a>
              </div>
              @empty
              @endforelse
              </div>  
</div>

  <!-- ######## Footer Start Here ####### -->   
    
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

    <script src = "{{asset('js/destination_detail_script.js')}}"></script>
    <script src="{{asset('js/notification.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/notification.js')}}"></script>
    <script>
        let allImages=document.querySelectorAll('.allImages');
        let selectedImage=document.getElementById('selectedImage');
        allImages.forEach(function(e){
e.onmouseover=function(){
console.log('kkk');
selectedImage.src=e.src;
}
});

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
</body>
</html>
