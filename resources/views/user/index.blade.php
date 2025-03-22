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
            <!-- <div class="container">
              <div class="row">
                <div class="col-sm-4 d-none d-sm-block contacthd">
                  <p><a href="">Japan</a> &nbsp;&nbsp; <span>/</span> &nbsp;&nbsp; <a href="">Spain</a><span>/</span> <a href="">Italy</a></p>
                </div>
                <div class="col-sm-8">

                  <ul class="social-login">
                    <li>
                      <i class="fab fa-facebook-square"></i>
                    </li>
                    <li>
                      <i class="fab fa-twitter-square"></i>
                    </li>
                    <li>
                      <i class="fab fa-instagram"></i>
                    </li>
                    <li>
                      <i class="fab fa-linkedin"></i>
                    </li>
                  </ul>

                  <ul class="email">
                    <li><i class="fa fa-envelope" ></i>smartcam@gamil.com</li>
                  </ul>
                </div>
              </div>
            </div> -->

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

                            <!-- <li>                
  <select onchange="check(event)" style="border:none;color:#444;outline:none;font-weight:bold;">
 <option value="about" style="border:none;color:#444;outline:none;font-weight:bold;display:none;" ><a href="{{url('loginpage')}}">Contact Us</a></option>
 <option value="about" style="border:none;color:#444;outline:none;font-weight:bold;" ><a href="{{url('about')}}">About Us</a></option>
 <option value="contact" style="border:none;color:#444;outline:none;font-weight:bold;"><a href="{{url('contact')}}">Contact Us</a></option>
</select>
</li> -->
                            @auth
                            <li><a href="{{url('my-reservations')}}">Reservation</a></li>
                            @endauth
                        
                            @guest   
                        
<li><a href="{{url('loginpage')}}">Login</a></li>
<li><a href="{{url('register')}}">Register</a></li>
@endguest  
@auth 
<li>                
  <!-- <select onchange="check(event)" style="border:none;color:#444;outline:none;font-weight:bold;">
 <option value="" style="border:none;color:#444;outline:none;font-weight:bold;display:none;" ><a href="{{url('loginpage')}}">ACCOUNT</a></option>
 <option value="myaccount" style="border:none;color:#444;outline:none;font-weight:bold;" ><a href="{{url('loginpage')}}">Account</a></option>
 <option value="logout" style="border:none;color:#444;outline:none;font-weight:bold;"><a href="{{url('logout')}}">Logout</a></option>
</select> -->
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
   
    <!--################### Slider Starts Here #######################--->

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="d-block w-100" src="{{asset('images/slider/slid_1.jpg')}}" alt="First slide">
                    <div class="carousel-caption fvgb d-none d-md-block">
                        <h5 class="animated bounceInDown">Enjoy With Our Trips </h5>
                        <p class="animated fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                            aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                            sed sagittis at, sagittis quis neque. Praesent.</p>

                        <div class="row vbh">

                            <div class="btn btn-primary animated bounceInUp"> Apply Online </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('images/slider/slid_2.jpg')}}" alt="Third slide">
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Select Your Best Package</h5>
                        <p class="animated bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                            aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                            sed sagittis at, sagittis quis neque. Praesent.</p>

                        <div class="row vbh">

                            <!-- <div class="btn btn-primary animated bounceInUp"> Apply Online </div> -->
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
    
     <!--################### Slider Starts Here #######################--->
  
    <!-- <form method="GET" action="{{url('search-package')}}"> -->
    <div class="search-container contaienr-fluid">
       <div class="container">
           <div class="row search-box">
             
                <div class="col-md-3">
                   <select id="select_activity" class="form-control" name="type">
                       <option value="">Select Activity</option>
                       <option value="all">All</option>
                       @foreach($types as $type)
                       
                       <option value="{{$type->id}}">{{$type->name}}</option>
                      @endforeach
                   </select>
               </div>

               <div class="col-md-3">
               <input placeholder="Select Date" type="date" name="start_date" class="form-control" id="start-date">
               </div>

                <div class="col-md-3">
                   <input placeholder="Select Date" type="date" class="form-control" name="end_date" id="end-date">
               </div>
                <div class="col-md-3">
                   <button  class="btn w-100 btn-primary"  id="search_package">Search Package</button>
               </div>
           </div>
       </div> 
    </div>
<!-- </form> -->


    <!--################### Packages Starts Here #######################--->
    
    <section class="top-packages container-fluid">
        <div class="container">
            <div class="session-title row">
            @if($errors->any())
<div class="alert alert-danger w-100 text-center">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
     @endif
                <h2>Top Packages</h2>
                <p>There are many variations in our packages, choose one today!</p>
            </div>
            <div class="pack-row row" id="searchedPackage">
               
             
            @forelse($packages as $package)
            <div class="col-md-4">
                    <div class="pac-col" style="height:400px;">
                   <a href="{{url('package-detail',$package->id)}}" style="text-decoration:none;">
                        <img src="{{asset('packageImage/'.$package->image)}}" alt="" style="height:250px;">
                        <div class="packdetail">
                        <?php 
                        $diff=strtotime($package->end_date) - strtotime($package->start_date);
                        $days=abs(round($diff / 86400));
                            ?>
                            <h4>{{$package->country->sortname}} - {{$days}} Days in {{$package->city->name}}, {{\Illuminate\Support\Str::limit($package->state->name,2,'..')}}</h4>
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
                    </div>
                </div>
                @empty
                <p class="text-center" style="font-weight:bold;">No available packages</p>
      <button type="submit" class="btn btn-primary mt-4" style="display:block;margin-right:auto;margin-left:auto;"><a href="{{url('/')}}" style="color:white;">All Packages</a></button>
                @endforelse
            </div>
        </div>
    </section>
    
     <!--################### Offers Starts Here #######################--->
    
    <div class="lloking-for container-fluid">
        <div class="inn-lay">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 natur-col mx-auto">
                        <h2>Up to 40% Discount on Selected Packages</h2>
                        <h4 class="pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form  If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</h4>
                        <!-- <button class="btn btn-light">Book Now</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>  
    
    
 
    
    
     <!-- ******************** Travel Destination Starts Here ******************* -->

               
                   
                
              
             
              
                </div>
            </div>
        </div>
    </div> -->
    
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Explore Top Destination</h1>
            </div>
            <div class="row">
                @forelse($destinations as $destination)
                <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{url('/destination',$destination->country->sortname)}}">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('destinationImage/'.$destination->image)}}" alt="" style="height:300px;width:500px;">
                        <span class="destination-overlay text-white text-decoration-none">
                            <h5 class="text-white">{{$destination->country->sortname}}</h5>
                            <!-- <span>100 Cities</span> -->
</span>
                    </div>
</a>
                </div>
                @empty
                <p class="text-center" style="font-weight:bold;">No available destinations</p>
              @endforelse
             
            
              
            </div>
        </div>
    </div>
    <!-- end -->
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
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
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
    $.ajaxSetup({
		headers:{
"X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
		}
	});
 
var search_package=document.getElementById('search_package');

$(document).on('click','#search_package',function(e){
    var selected_activity_id=document.getElementById('select_activity');
    var selected_start_date=document.getElementById('start-date').value;
    var selected_end_date=document.getElementById('end-date').value;
    var v=selected_activity_id.value;
    if(v==''){
        v='none';
    }
  
    if(selected_start_date==''){
        selected_start_date='none';
    }
    if(selected_end_date==''){
        selected_end_date='none';
    }
   
e.preventDefault();
$.ajax({
	type:"POST",
	url:"{{route('searchPackage')}}",
    dataType:"json",

	data:{
		'activity_id':v,
		'selected_start_date':selected_start_date,
        'selected_end_date':selected_end_date
	},
	success:function(data){
        document.getElementById('searchedPackage').innerHTML="";

        var rate_ul=document.createElement('ul');
        if(data.status==true){
          for(let i=0;i<data.packages.length;i++){
            // console.log(data.packages[i].ratings);
            //start
            var start=new Date(data.packages[i].start_date);
    var end=new Date(data.packages[i].end_date);

 var diffy=Math.abs(end-start);


 var diffday=Math.floor(diffy/(1000*60*60*24));
 //end
            var rating_sum=0;
            var  $rating_value;
            var rate_num;
           
            if(data.packages[i].ratings.length >0){
                
                console.log('mor than zero');
                for(var j=0;j<data.packages[i].ratings.length;j++){
                    rate_ul.innerHTML='';
                    console.log(data.packages[i].ratings[j].stars_rated);
                     rating_sum= parseInt(rating_sum) + parseInt(data.packages[i].ratings[j].stars_rated); 
                     rating_value=rating_sum/data.packages[i].ratings.length;
                   
                }
               
                
                for(var k=1;k<=rating_value;k++){
                              
                                       rate_ul.innerHTML += '<i class="fa fa-star" style="color:gold;"></i>';
                                  console.log('gold');
                }
             
     for(var l=rating_value+1;l<=5;l++){
 
    rate_ul.innerHTML += '<i class="fa fa-star" style="color:grey;"></i>';
    console.log('grey');
            }
            // document.getElementById('rate_star').innerHTML=generateListFromArray(rate_ul);
            // console.log(rate_ul);   
            document.getElementById('searchedPackage').innerHTML +=`
            
        <div class="col-md-4">
                    <div class="pac-col" style="height:400px;">
                  
                   <a href="{{URL::to('package-detail/${data.packages[i].id}')}}" style="text-decoration:none;">
                   
                        <img src="packageImage/${data.packages[i].image}" alt="" style="height:250px;">
                        <div class="packdetail">

                            <h4>${data.packages[i].country.sortname} - ${diffday} Days in ${data.packages[i].city.name}, <?php echo \Illuminate\Support\Str::limit('data.packages[i].state.name',2,'..'); ?></h4>
                            <div class="daydet">
                          
                                <span style="color:black;"><i class="far fa-clock"></i> ${data.packages[i].start_date}</span>
                                <b>${data.packages[i].price}</b>
                            </div>
                            <div class="eview-row row no-margin" id="rate_star">
${rate_ul.innerHTML}
                            </div>
                        </div>
</a>
                    </div>
                </div>
`
            }
           
         
// let days=Math.abs(data.packages[i].end_date - data.packages[i].start_date);

// console.log(data.packages[i].start_date);
         //2024-10-17  
 
  
      //here
else{
    document.getElementById('searchedPackage').innerHTML +=`
        <div class="col-md-4">
                    <div class="pac-col" style="height:400px;">
                  
                   <a href="{{URL::to('package-detail/${data.packages[i].id}')}}" style="text-decoration:none;">
                   
                        <img src="packageImage/${data.packages[i].image}" alt="" style="height:250px;">
                        <div class="packdetail">

                            <h4>${data.packages[i].country.sortname} - ${diffday} Days in ${data.packages[i].city.name}, <?php echo \Illuminate\Support\Str::limit('data.packages[i].state.name',2,'..'); ?></h4>
                            <div class="daydet">
                          
                                <span style="color:black;"><i class="far fa-clock"></i> ${data.packages[i].start_date}</span>
                                <b>${data.packages[i].price}</b>
                            </div>
                            <div class="eview-row row no-margin">
                                <ul>
                                <i class="fa fa-star" style="color:grey;"></i>
                               <i class="fa fa-star" style="color:grey;"></i>
                               <i class="fa fa-star" style="color:grey;"></i>
                               <i class="fa fa-star" style="color:grey;"></i>
                               <i class="fa fa-star" style="color:grey;"></i>
                                </ul>
                            </div>
                        </div>
</a>
                    </div>
                </div>
`
}
        
          }


        }
	}, 
		error:function(reject){

}, 
});
})

    
 
</script>

<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/notification.js')}}"></script>
</html>