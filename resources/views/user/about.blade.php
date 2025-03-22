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

                            <li>                
  <select onchange="check(event)" style="border:none;color:#444;outline:none;font-weight:bold;">
 <option value="about" style="border:none;color:#444;outline:none;font-weight:bold;display:none;" ><a href="{{url('loginpage')}}">Contact Us</a></option>
 <option value="about" style="border:none;color:#444;outline:none;font-weight:bold;" ><a href="{{url('about')}}">About Us</a></option>
 <option value="contact" style="border:none;color:#444;outline:none;font-weight:bold;"><a href="{{url('contact')}}">Contact Us</a></option>
</select>
</li>
                            @auth
                            <li><a href="{{url('my-reservations')}}">Reservation</a></li>
                            @endauth
                        
                            @guest   
                            <li>                
  <select onchange="check(event)" style="border:none;color:#444;outline:none;font-weight:bold;">
 <option value="login" style="border:none;color:#444;outline:none;font-weight:bold;display:none;" ><a href="{{url('loginpage')}}">ACCOUNT</a></option>
 <option value="login" style="border:none;color:#444;outline:none;font-weight:bold;" ><a href="{{url('loginpage')}}">Login</a></option>
 <option value="register" style="border:none;color:#444;outline:none;font-weight:bold;"><a href="{{url('register')}}">register</a></option>
</select>
</li>
@endguest  
@auth 
<li>                
  <select onchange="check(event)" style="border:none;color:#444;outline:none;font-weight:bold;">
 <option value="" style="border:none;color:#444;outline:none;font-weight:bold;display:none;" ><a href="{{url('loginpage')}}">ACCOUNT</a></option>
 <option value="myaccount" style="border:none;color:#444;outline:none;font-weight:bold;" ><a href="{{url('loginpage')}}">Account</a></option>
 <option value="logout" style="border:none;color:#444;outline:none;font-weight:bold;"><a href="{{url('logout')}}">Logout</a></option>
</select>
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
            <h2>About Tour & Travel</h2>
            <ul>
                <li> <a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                <li><i class="fas fa-angle-double-right"></i> About Us</li>
            </ul>
        </div>
    </div>
</div>
     
      
  <!--  ************************* About Us Starts Here ************************** -->    
       
<div class="about-us container-fluid">
    <div class="container">

        <div class="row natur-row no-margin w-100">
            <div class="text-part col-md-6">
                <h2>About Travel Packages</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius faucibus
                    ligula non congue. Suspendisse at pretium massa, sit amet
                    vulputate nibh. Nam posuere eros dolor. Donec vel arcu sagittis, pretium nisl </p>
                <p> Cras faucibus laoreet nibh, sit amet tincidunt leo mollis in. Etiam eu mauris metus.
                    Nulla facilisi. Etiam vestibulum,
                    nisi et convallis elementum, leo orci aliquam metus, id posuere massa neque vitae
                    arcu.</p>

                <p>Integer vulputate vehicula dolor a eleifend. Duis aliquam condimentum sapien,
                    eget tempor justo. Aenean porttitor nibh metus, sollicitudin egestas metus posuere et
                    . Fusce egestas volutpat metus, in sodales sem bibendum porta. Nunc hendrerit nunc sit
                    amet tellus posuere, at malesuada sem gravida. Integer maximus ultricies augue, at
                    dapibus elit bibendum consequat. Cras faucibus tellus eleifend, fermentum purus in,
                    dapibus sapien. Praesent nec ornare risus. Etiam iaculis, ligula vel gravida
                    vestibulum, urna justo posuere ante,
                    id pretium massa arcu sed mi. Nunc a sollicitudin sem. Duis tempus </p>
            </div>
            <div class="image-part col-md-6">
                <img src="assets/images/about.jpg" alt="">
            </div>
        </div>
    </div>
    </div> 
       

    <!-- ################# Our Team Starts Here#######################--->
    <section class="our-team">
        <div class="container">
            <div class="session-title row">
                <h2>Our Team</h2>
               
            </div>
            <div class="row team-row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="assets/images/team/team-memb1.jpg" alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Facial Surgan</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="assets/images/team/team-memb2.jpg" alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Facial Surgan</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="assets/images/team/team-memb3.jpg" alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Facial Surgan</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="assets/images/team/team-memb4.jpg" alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Facial Surgan</i>
                        </div>
                    </div>
                </div>
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
    
    
</body>


<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
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
</html>