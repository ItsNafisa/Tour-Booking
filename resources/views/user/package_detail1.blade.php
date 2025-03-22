<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{csrf_token()}}" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- <link rel = "stylesheet" href = "{{asset('css/detail_package_middle_style.css')}}"> -->
  <link rel = "stylesheet" href = "{{asset('css/middle_package_detail_style.css')}}">
  
  <link rel="stylesheet" href="{{asset('css/detail_package_slider.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/tab_style.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slider/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slider/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
  <title>Bootstrap 5 Carousel Slider</title>
</head>
<body>
  
<!-- start slider
<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
 

    <div class="carousel-inner">
      @foreach($package->days as $key => $day)
      <div class="carousel-item {{$key == '0' ?'active':''}}  c-item">
        <img src="{{asset('dayImage/'.$day->image)}}" class="d-block w-100 c-img" alt="Slide 1">
        <div class="carousel-caption top-0 mt-4">
          <p class="mt-5 fs-3 text-uppercase">Discover the hidden world</p>
          <h1 class="display-1 fw-bolder text-capitalize">The {{$package->city->name}} Tours</h1>
          @guest
          <button class="px-4 py-2 fs-5 mt-5" style="color:white;background-color:#08703a;outline:none;border:none;"><a href="{{url('loginpage')}}" style="color:white;text-decoration:none;">Book a tour</a></button>
       @endguest
        </div>
      </div>
    @endforeach
  
    </div>
    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
  </div> -->
   <!-- end slider -->


   <!--################### Slider Starts Here #######################--->

   <div class="slider-detail" style="padding-top:0px;">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
    @foreach($package->days as $key => $day)
        <div class="carousel-item {{$key == '0' ?'active':''}} ">
            <img class="d-block w-100" src="{{asset('dayImage/'.$day->image)}}" alt="First slide" style="height:600px;">
            <div class="carousel-caption fvgb d-none d-md-block">
                <h5 class="animated bounceInDown">The {{$package->city->name}} Tours</h5>
                <p class="animated fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                    aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                    sed sagittis at, sagittis quis neque. Praesent.</p>

                <div class="row vbh">
@auth
                    <div class="btn btn-primary animated bounceInUp"> Apply Online </div>
                    @endauth

                    @guest
          <button class="px-4 py-2 fs-5 mt-5" style="color:white;background-color:#08703a;outline:none;border:none;"><a href="{{url('loginpage')}}" style="color:white;text-decoration:none;"> Book a tour </a></button>
       @endguest
                </div>
            </div>
        </div>
@endforeach
        <!-- <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('images/slider/slid_2.jpg')}}" alt="Third slide">
            <div class="carousel-caption vdg-cur d-none d-md-block">
                <h5 class="animated bounceInDown">Best Free Educational Template</h5>
                <p class="animated bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                    aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                    sed sagittis at, sagittis quis neque. Praesent.</p>

                <div class="row vbh">

                    <div class="btn btn-primary animated bounceInUp"> Apply Online </div>
                </div>
            </div>
        </div> -->

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


  <!-- services section starts  -->
<section class="services">
   <h1 class="heading-title"> Tour Detail </h1>
   <div class="box-container">
      <div class="box">
         <!-- <img src="images/icon-2.png" alt=""> -->
	
		 <i class="fas fa-money-bill-alt" style="font-size:30px;color:black;"></i>
         <h3>Price</h3>
		 <h4 style="font-weight:bold;color:black;">${{$package->price}}</h4>
      </div>
      <div class="box">
	  <i class="fas fa-stopwatch" style="font-size=30px;color:black;"></i>
         <h3>Duration</h3>
		 <?php 
                        $diff=strtotime($package->end_date) - strtotime($package->start_date);
                        $days=abs(round($diff / 86400));
                            ?>
		 <h4 style="font-weight:bold;color:black;">{{$days}} Days</h4>
      </div>
      <div class="box">
	  <i class="fas fa-user-alt" style="font-size:30px;color:black;"></i>
         <h3>Max People</h3>
		 <h4 style="font-weight:bold;color:black;">{{$package->number_of_people}}</h4>
      </div>
      <div class="box">
	  <i class="fas fa-paper-plane" style="font-size:30px;color:black;"></i>
         <h3>Tour Type</h3>
		 <h4 style="font-weight:bold;color:black;">{{$package->type->name}}</h4>
      </div>
   </div>
</section>
<!-- services section ends -->
<!-- home about section starts  -->

<section class="home-about">
   <div class="image">
      <!-- <img src="images/about-img.jpg" alt=""> -->
      <!-- <div class="hdtab"> -->
      @if(Session::has('rate_status'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('rate_status')}}
</div>
@endif
      
				<div class="hdtab_nav">
					<div class="hdtab_nav_item hdtab_nav_item_active" tabindex="0" data-id="description" aria-role="button" style="color:black;">Description</div>
					<div class="hdtab_nav_item" data-id="ingredients" tabindex="0" aria-role="button" style="color:black;">Tour Plan</div>
					<div class="hdtab_nav_item" data-id="reviews" tabindex="0" aria-role="button" style="color:black;">Reviews</div>
				</div>
				<div class="hdtab_content">
					<div class="hdtab_content_item hdtab_content_item_active" id="hdtab_description">
						<h3>Description</h3>
               
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, doloribus unde, perferendis odio enim cupiditate, rem nostrum illo consequatur recusandae expedita omnis veritatis repellendus
							ratione nobis quisquam eaque officiis possimus.
						</p>
  <span style="font-weight:bold;display:inline-block;">Remaining Chair:</span> <span style="display:inline-block;">{{$package->remaining_chair == '0'? 'No Remaining Chair' : $package->remaining_chair}}</span><br>
  <span style="font-weight:bold;display:inline-block;">Start Date:</span> <span style="display:inline-block;">{{$package->start_date}}</span><br>
  <span style="font-weight:bold;display:inline-block;">End Date:</span> <span style="display:inline-block;">{{$package->end_date}}</span>
  <?php 
                        $diff=strtotime($package->end_date) - strtotime($package->start_date);
                        $days=abs(round($diff / 86400));
                            ?>
         <p style="font-weight:bold;">{{$package->country->sortname}} - {{$days}} Days in {{$package->city->name}}, {{$package->state->name}}</p>
					</div>
					<div class="hdtab_content_item" id="hdtab_ingredients">
          @forelse($package->days as $day)
						<h3 class="tourtitle">{{$day->title}}</h3>
            <div class="styling">
            <div class="onee">
@foreach(preg_split('/[-]/',$day->detail) as $k)
<h1 style="display:inline;padding-right:5px;">.</h1>{{$k}}<br>
                    @endforeach
                    </div>
                    <img src="{{asset('dayImage/'.$day->image)}}" style="height:150px;width:150px;">
</div>
            @empty
            <p class="text-center">No available plan.</p>
            @endforelse
					</div>
					<div class="hdtab_content_item" id="hdtab_reviews">
            <div class="myRate">
						<h3>Reviews</h3>
            <button type="button" class="btn btn-warning r" data-bs-toggle="modal" data-bs-target="#rating" style="margin-top:0px;">Rate</button>
</div>
            <!-- start rate modal -->
<div class="modal fade" id="rating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate this package</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('add-rating')}}" method="POST">
@csrf
<input type="hidden" value="{{$package->id}}" name="package_id">
    
<div class="rating-css">
    <div class="star-icon">
      @if($user_rating)
      @for($i=1;$i<=$user_rating->stars_rated;$i++)
      <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
      <label for="rating{{$i}}" class="fa fa-star"></label>
      @endfor
      @for($j=$user_rating->stars_rated+1;$j<=5;$j++)
      <input type="radio" value="{{$j}}" name="product_rating"  id="rating{{$j}}">
      <label for="rating{{$j}}" class="fa fa-star"></label>
      @endfor
      @else
        <input type="radio" value="1" name="product_rating" checked id="rating1">
        <label for="rating1" class="fa fa-star"></label>
        <input type="radio" value="2" name="product_rating" id="rating2">
        <label for="rating2" class="fa fa-star"></label>
        <input type="radio" value="3" name="product_rating" id="rating3">
        <label for="rating3" class="fa fa-star"></label>
        <input type="radio" value="4" name="product_rating" id="rating4">
        <label for="rating4" class="fa fa-star"></label>
        <input type="radio" value="5" name="product_rating" id="rating5">
        <label for="rating5" class="fa fa-star"></label>
        @endif
    </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end rate modal -->
           
       
       <div>
       @php $rate_num=number_format($rating_value) @endphp
       @for($i=1;$i<=$rate_num;$i++)
       <i class="fa fa-star checked"></i>
       @endfor
     @for($j=$rate_num+1;$j<=5;$j++)
     <i class="fa fa-star"></i>
     @endfor
       <span>
        @if($ratings->count() > 0)
          {{$rating_value}}  <br>
          {{$ratings->count()}} people rate this.
        @else
        No Ratings
        @endif
      </span><br><br>
      @foreach($ratings as $r)
<div>
  <img src="{{asset('userImage/'.$r->user->image)}}" style="height:50px;width:50px;border-radius:50%;">
  <span>{{$r->user->name}}</span><br>
  @for($i=1;$i<=$r->stars_rated;$i++)
       <i class="fa fa-star checked" style="font-size:10px;"></i>
       @endfor
     @for($j=$r->stars_rated+1;$j<=5;$j++)
     <i class="fa fa-star" style="font-size:10px;"></i>
     @endfor  
     <span>rated at {{date('d-m-y', strtotime($r->created_at))}}</span>
</div>
          @endforeach
       </div>
					</div>
        
				</div>
			<!-- </div> -->
       
   </div>
   <div class="content">
    @guest
      <h3>about us</h3>
      <p>Amazing Tours a Best tour Operator and Travel agent in Bangladesh. We are Tour Package, Hotel booking. Bangladesh Tours & Travel agent. Find international and domestic tour packages from bangladesh at low prices including best ... Travel Package | Honeymoon Package | Tour Package</p>
      <a href="about.php" class="btn">read more</a>
      @endguest
      @auth
      <h3>Book This Tour</h3>
    
<div class="alert alert-success" style="display:none;" id="fail">
    <button type="button" class="close" data-bs-dismiss="alert">X</button>
    You have already Booked in this tour
</div>

      <form method="POST" action="{{url('reservation')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group mt-3">
<label>Name</label>
<input type="text" class="form-control mt-2" placeholder="Enter name" name='name' value="{{Auth::user()->name}}">
<input type="hidden" class="form-control mt-2" placeholder="Enter name" name='price' value="{{$package->price}}">
<input type="hidden" class="form-control mt-2" placeholder="Enter name" name='user_id' value="{{Auth::user()->id}}">
<input type="hidden" class="form-control mt-2" placeholder="Enter name" name='package_id' value="{{$package->id}}">
<input type="hidden" class="form-control mt-2" placeholder="Enter name" name='remaining_chair' value="{{$package->remaining_chair}}">
<div class="alert alert-danger mt-3 p-1" id="name_error" style="display:none;"></div>
    </div>
@error('name')
<div style="color:red;">{{$message}}</div>
@enderror

    <div class="form-group mt-5">
<label>Email</label>
<input type="email" class="form-control mt-2" placeholder="Enter email" name='email' value="{{Auth::user()->email}}">
<div class="alert alert-danger mt-3 p-1" id="email_error" style="display:none;"></div>
    </div>
    @error('email')
<div style="color:red;">{{$message}}</div>
@enderror


    <div class="form-group mt-5">
<label>Phone Number</label>
<input type="text" class="form-control mt-2" placeholder="Enter phone number" name='phone' value="{{Auth::user()->phone}}">
<div class="alert alert-danger mt-3 p-1" id="phone_error" style="display:none;"></div>
    </div>
    @error('phone')
<div style="color:red;">{{$message}}</div>
@enderror

<div class="form-group mt-5">
<label>Number Of People</label>
<input type="text" class="form-control mt-2" placeholder="Enter number Of People" name='number_of_people' id="people_number" onkeyup="mih()">
<div class="alert alert-danger mt-3 p-1" id="phone_error" style="display:none;"></div>
    </div>
    <div class="mt-3 p-1" id="number_of_people_error" style="display:none;color:red;"></div>
    <div class="mt-3 p-1" id="no_remain_chair" style="display:none;color:red;">There is No Remaining Chair</div>
<hr>
<div class="total">
  <p>Total Price: </p>
  <p id="total_price" style="font-weight:bold;">${{$package->price}}</p>
</div>
    <!-- <button class="mt-2 mb-4 btn btn-warning text-white w-100 book_now">Book Now</button> -->
    <div class="my-btn">
    @if($package->end_date > Carbon\Carbon::now())
    <span class="btn btn-primary animated bounceInUp book_now" style="background-color:green;display:inline-block;"><a href="{{url('/')}}" style="color:white;text-decoration:none;display:inline-block;">Book Now</a> </span>
 @else
 <span class="btn btn-danger animated bounceInUp" style="display:inline-block;">Finished</span>
    @endif
    <span class="btn btn-primary animated bounceInUp" style="background-color:green;display:inline-block;"><a href="{{url('/')}}" style="color:white;text-decoration:none;display:inline-block;">Back Home</a> </span>
</div>
  </form>
  @endauth
   </div>
</section>
<!-- home about section ends -->
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/tab_script.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script>
    function check(evt){
        if(evt.target.value==='login'){
           window.location.='login';
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
  function mih(){
    console.log('kkk');
      let mytotal=document.getElementById('total_price');
  mytotal.innerHTML='';
 let price= $("input[name=price]").val();
 let qantity= $("input[name=number_of_people]").val();
 console.log(price);
 console.log(qantity);
 let total=price * qantity;

 mytotal.innerHTML='$'+total;
  }
   $.ajaxSetup({
		headers:{
"X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
		}
	});
  $('.book_now').click(function(e){
	
	e.preventDefault();

	$.ajax({
	type:"POST",
    
	url:"{{route('reservation')}}",
	data:{
        'user_id' : $("input[name=user_id]").val(),
        'price' :$("input[name=price]").val(),
        'package_id' :$("input[name=package_id]").val(),
        'remaining_chair' :$("input[name=remaining_chair]").val(),
        'number_of_people' :$("input[name=number_of_people]").val(),
        
        
    },
    
  
	success:function(data){
   if(data.status==false){
      console.log('op');
      $('#no_remain_chair').show();
      
    }
    if(data.status==true){
     window.location="/thank-you";
      
    }
    if(data.status=='exists' && data.msg=='fail'){
      console.log('pppp');
      console.log(data);
      $('#fail').show(); 
    }
    console.log(data);
 
	}, 
		error:function(reject){
            console.log('reject');
var response=$.parseJSON(reject.responseText);
$.each(response.errors,function(key,val){
    $('#' + key + "_error").show();
    $('#' + key + "_error").text(val[0]);
});

}, 
})
})
  </script>
</body>
</html>

