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
   
    <!--################### Slider Starts Here #######################--->

    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Travel Package</h2>
                <ul>
                    <li> <a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Reservation</li>
                </ul>
            </div>
        </div>
    </div>

     <!-- ******************** Travel Destination Starts Here ******************* -->
  <div class="untree_co-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 pt-5">
        @if(Session::has('cancel'))
<div class="alert alert-success">
    <button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('cancel')}}
</div>
@endif
@if(Session::has('succcess'))
<div class="alert alert-success">
    <button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('succcess')}}
</div>
@endif
  
@if($reservations->count() > 0)
<div class="table-responsive">
        <table class="table" width="100%">
            <div class="h2 mb-3">My Reservations</div>
        <thead>
            <tr>
            
            <td>Destination</td>
     <td>Date</td>
     <td>Total Price</td>
     <td>Booked Chair</td>
     <td>Action</td>
             
            </tr>
        </thead>
        <tbody>
  @foreach($reservations as $reservation)
        <tr>
        <?php 
      $diff=strtotime($reservation->package->end_date) - strtotime($reservation->package->start_date);
         $days=abs(round($diff / 86400));
               ?>   
 <td><a href="{{url('package-detail',$reservation->package->id)}}" style="text-decoration:none;color:black;">{{$reservation->package->country->sortname}} - {{$days}} Days in {{$reservation->package->city->name}}, {{$reservation->package->state->name}} </a></td> 
                <td>
                <span style="font-weight:bold;">From</span>: {{date('d-m-y', strtotime($reservation->package->start_date))}}<br>
                <span style="font-weight:bold;">To</span>: {{date('d-m-y', strtotime($reservation->package->end_date))}}
                </td>
                <td>${{$reservation->total_price}}.00</td>
                <td>{{$reservation->number_of_people}}</td>
                @if($reservation->package->end_date > Carbon\Carbon::now())
                <td>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancel{{$reservation->id}}">Cancel</button>   
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPeople{{$reservation->id}}" style="background-color:#08703a;color:white;border:none;">Edit</button>       
                </td>
                @else
                <td>Finished</td>
                @endif
    <!-- start cancel modal -->
<div class="modal fade" id="cancel{{$reservation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel reservation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('cancel-reservation')}}" method="POST" enctype="multipart/form-data">
@csrf
<p>Are You Sure You Want to Cancel this reservation ?</p>

<input type="hidden" value="{{$reservation->id}}" name="reservation_id" class="form-control mt-2 mb-2">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end cancel modal -->       

<!-- start edit modal -->
<div class="modal fade" id="editPeople{{$reservation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit in reservation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('edit-reservation')}}" method="POST" enctype="multipart/form-data">
@csrf
<label>Number of People</label>
<input type="text" value="{{$reservation->number_of_people}}" name="number_of_people" class="form-control mt-2 mb-2">
<div class="mt-3 p-1" id="no_remain_chair" style="color:red;"></div>
<input type="hidden" value="{{$reservation->id}}" name="reservation_id" class="form-control mt-2 mb-2">
<input type="hidden" value="{{$reservation->number_of_people}}" name="old" class="form-control mt-2 mb-2">
<input type="hidden" value="{{$reservation->package_id}}" name="package_id" class="form-control mt-2 mb-2">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning edit_btn" style="background-color:#08703a;color:white;border:none;">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end edit modal -->

            </tr>

  @endforeach
        </tbody>
    </table>
</div>
    @else
<h4 class="text-center">No Reservation Yet</h4>
    @endif
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
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
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
 
  $('.edit_btn').click(function(e){
	console.log('kkkkkk');
	e.preventDefault();
    // $('#email_error').hide();
    // $('#password_error').hide();


    // $('#login_fail').hide();
	$.ajax({
	type:"POST",
    
	url:"{{route('edit-reservation')}}",
	data:{
        'reservation_id' : $("input[name=reservation_id]").val(),
        'number_of_people' : $("input[name=number_of_people]").val(),
        'package_id' : $("input[name=package_id]").val(),
    },
    
  
	success:function(data){
       
     if(data.status==false){
        // 
        $('#no_remain_chair').text('There is just '+data.msg+' remaining chair');
     }
     if(data.status==true){
 console.log('lll');
 window.location=data.location;
     }
	}, 
		error:function(reject){
            console.log('reject');


}, 
})
})
 
</script>

<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/notification.js')}}"></script>
</html>