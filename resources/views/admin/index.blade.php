<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset('admin/style.css')}}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/all.min.css')}}">
    @yield('styleing')
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>T<span>ravel</span></h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url({{asset('userImage/'.Auth::user()->image)}})"></div>
                <h4>{{Auth::user()->name}}</h4>
                <small>{{Auth::user()->email}}</small>
            </div>

       @include('admin.sidebar')
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <!-- <span class="las la-bars">hhhhhhhhhhhhh</span> -->
                    <i class="fa fa-bars" style="color:#999;"></i> 
                </label>
                
                <div class="header-menu">
                    <label for="">
                        <span class="las la-search"></span>
                    </label>
<!--                     
                    <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>
                    
                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div> -->
                    
                    <div class="user">
                        <div class="bg-img" style="background-image: url({{asset('userImage/'.Auth::user()->image)}})"></div>
                        
                        <span class="las la-power-off"></span>
                        <a href="{{url('logout')}}" style="text-decoration:none;color:black;"><span>Logout</span></a>
                    </div>
                </div>
            </div>
        </header>
        
        
        <main>
            
            <div class="page-header">
                <h1> @yield('title')</h1>
                <!-- <small>Home / Dashboard</small> -->
            </div>
            
            <div class="page-content">
            
            <div class="analytics">



<div class="card">
    <div class="card-head">
        <h2>{{App\Models\Destination::count();}}</h2>
        <span class="las la-user-friends"></span>
    </div>
    <div class="card-progress">
        <small>DESTINATIONS</small>
        <div class="card-indicator">
            <div class="indicator one" style="width: 60%"></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>{{App\Models\Package::count();}}</h2>
        <span class="las la-eye"></span>
    </div>
    <div class="card-progress">
        <small>PACKAGES</small>
        <div class="card-indicator">
            <div class="indicator two" style="width: 80%"></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>{{App\Models\Type::count();}}</h2>
        <span class="las la-shopping-cart"></span>
    </div>
    <div class="card-progress">
        <small>ACTIVITIES</small>
        <div class="card-indicator">
            <div class="indicator three" style="width: 65%"></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>{{App\Models\Reservation::count();}}</h2>
        <span class="las la-envelope"></span>
    </div>
    <div class="card-progress">
        <small>RESERVATIONS</small>
        <div class="card-indicator">
            <div class="indicator four" style="width: 90%"></div>
        </div>
    </div>
</div>

</div>


  @yield('content')
            
            </div>
            
        </main>
        
    </div>
  
        @yield('scripting')
   
</body>
</html>