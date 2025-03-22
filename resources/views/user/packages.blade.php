<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Travel Package</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="{{asset('images/fav.jpg')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slider/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/notification.css')}}">
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
                <h2>Travel Packages</h2>
                <ul>
                    <li> <a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Our Packages</li>
                </ul>
            </div>
        </div>
    </div>

     
     <!--################### Packages Starts Here #######################--->
    
    <section class="top-packages container-fluid">
        <div class="container">
        <input type="search" placeholder="Search By City" class="record-search mb-3 p-2 w-100" name="search" id="search" onkeyup="searchTable()">
            <div class="pack-row row" id="mytable"> 
                    
                @forelse($packages as $package)
                <div class="col-md-4 mytr">
                    <div class="pac-col" style="height:400px;">
                    <a href="{{url('package-detail',$package->id)}}" style="text-decoration:none;">
                        <img src="{{asset('packageImage/'.$package->image)}}" alt="" style="height:250px;">
                        <div class="packdetail">
                           <?php 
                        $diff=strtotime($package->end_date) - strtotime($package->start_date);
                        $days=abs(round($diff / 86400));
                            ?>
                            <h4>{{$package->country->sortname}} - {{$days}} Days in <span class="city">{{$package->city->name}}</span>, {{$package->state->name}}</h4>
                        
                            <div class="daydet">
                                <span style="color:black;"><i class="far fa-clock"></i> {{date('d-m-y', strtotime($package->start_date))}}</span>
                                <b>${{$package->price}}</b>
                            </div>
                            <div class="eview-row row no-margin">
                                <ul>
                                @if($package->ratings->count() >0)
                                    <?php
                                    $rating_sum=$package->ratings->sum('stars_rated');
  $rating_value=$rating_sum/$package->ratings->count();
  $rate_num=number_format($rating_value)
                                    ?>
                                      @for($i=1;$i<=$rate_num;$i++)
                                       <i class="fa fa-star" style="color:gold;"></i>
       @endfor
     @for($j=$rate_num+1;$j<=5;$j++)
    <i class="fa fa-star" style="color:grey;"></i>
     @endfor
       <span>
        @if($package->ratings->count() > 0)
          <!-- {{$rating_value}}  <br> -->
          <!-- {{$package->ratings->count()}} people rate this. -->
        @else
        No Ratings
        @endif
                               @else
                               <i class="fa fa-star" style="color:grey;"></i>
                               <i class="fa fa-star" style="color:grey;"></i>
                               <i class="fa fa-star" style="color:grey;"></i>
                               <i class="fa fa-star" style="color:grey;"></i>
                               <i class="fa fa-star" style="color:grey;"></i>
                                    @endif
                                </ul>
                           </div>

                        </div>
</a>
                        </button>
</form>
                    </div>
                </div>
@empty
<p class="text-center">No Available Packages.</p>
                @endforelse
            </div>
        </div>
    </section> 
      
  
    

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
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/notification.js')}}"></script>

    <script>
function searchTable() {
    console.log('h');
  var input,filter,table,tr,td,i,txtValue;
  input=document.getElementById('search');
  filter=input.value.toUpperCase();
 table=document.getElementById('mytable');
 tr=table.getElementsByClassName("mytr");
 for(i=0;i<tr.length;i++){
  td=tr[i].getElementsByClassName("city")[0];
  console.log(td);
  if(td){
   txtValue=td.textContent || td.innerText;
   if(txtValue.toUpperCase().indexOf(filter) > -1){
tr[i].style.display="";
   }else{
    tr[i].style.display="none";
   }
  }
 }
}


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