<header class="container-fluid">
       <div class="header-top">
            <div class="container">
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
                    <li><i class="fa fa-envelope"></i>smartcam@gamil.com</li>
                  </ul>
                </div>
              </div>
            </div>

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
                          <li ><a class="{{Request::is('packages') ? 'active-li':'disactive-li'}}" href="{{url('packages')}}">Packages</a></li>
                            <li class="{{Request::is('destinations') ? 'active-li':''}}"><a href="{{url('destinations')}}">Destinations</a></li>

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