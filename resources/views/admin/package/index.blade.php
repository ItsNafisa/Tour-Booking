
@extends('admin.index')
@section('styleing')
<style>
a{
    /* color:#899DC1; */
}
</style>
<meta name="csrf-token" content="{{csrf_token()}}" />
@endsection
@section('title')
All Packages
@endsection
@section('analysis')

<div class="analytics">
<div class="card">
    <div class="card-head">
        <h2>107,200</h2>
        <span class="las la-user-friends"></span>
    </div>
    <div class="card-progress">
        <small>User activity this month</small>
        <div class="card-indicator">
            <div class="indicator one" style="width: 60%"></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>340,230</h2>
        <span class="las la-eye"></span>
    </div>
    <div class="card-progress">
        <small>Page views</small>
        <div class="card-indicator">
            <div class="indicator two" style="width: 80%"></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>$653,200</h2>
        <span class="las la-shopping-cart"></span>
    </div>
    <div class="card-progress">
        <small>Monthly revenue growth</small>
        <div class="card-indicator">
            <div class="indicator three" style="width: 65%"></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>47,500</h2>
        <span class="las la-envelope"></span>
    </div>
    <div class="card-progress">
        <small>New E-mails received</small>
        <div class="card-indicator">
            <div class="indicator four" style="width: 90%"></div>
        </div>
    </div>
</div>

</div>
@endsection
@section('content')
<div class="records table-responsive">

<div class="record-header">
    <div class="add">
    <button class="btn btn-primary" style="background-color:#22BAA0;margin-right:9px;"><a href="{{url('admin/package/index')}}" style="color:white;">View All</a></button>  
        <!-- <span>Entries</span>
        <select name="" id="">
            <option value="">ID</option>
        </select> -->
        <!-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addType">Add Type</button> -->
    </div>


    <div class="browse">
       <!-- <input type="search" placeholder="Search" class="record-search">
        <select name="" id="">
            <option value="">Status</option>
        </select> -->
    
        <form method="GET" action="{{url('admin/filter')}}">

        <label>Start Date</label>
        <input type="date" class="record-search" name="start" required>

        <label>End Date</label>
        <input type="date" class="record-search" name="end" required>

        <button type="submit" class="btn btn-warning" style="background-color:#22baa0;outline:none;border:none;color:white;">Filter</button>
</form>
    </div>
</div>
<div>
@if(Session::has('day_added'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('day_added')}}
</div>
@endif

@if(Session::has('day_added_fail'))
<div class="alert alert-danger">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('day_added_fail')}}
</div>
@endif

@if(Session::has('update_package'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('update_package')}}
</div>
@endif

@if(Session::has('package_deleted_successfully'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('package_deleted_successfully')}}
</div>
@endif

@if($packages->count() >0)
    <table width="100%">
        <thead>
            <tr>
            
                <th><span class="las la-sort"></span>#</th>
             
                <th><span class="las la-sort"></span> Package</th>
                <th><span class="las la-sort"></span> Package Activity</th>
                <th><span class="las la-sort"></span> Package Price</th>
                <th><span class="las la-sort"></span> Date</th>
                <th><span class="las la-sort"></span> Status</th>
                <th><span class="las la-sort"></span>  Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=0; ?>
            @foreach($packages as $package)
            <?php $i++; ?>
        <tr>
          
                <td>#{{$i}}</td>
                <?php 
      $diff=strtotime($package->end_date) - strtotime($package->start_date);
         $days=abs(round($diff / 86400));
               ?>  
                <td>
 {{$package->country->sortname}} - {{$days}} Days in {{$package->city->name}}, {{$package->state->name}}
                </td>
                <td>
                {{$package->type->name}}
                </td>
                <td>
                {{$package->price}}
                </td>
                <td>
  <span style="font-weight:bold;">From:</span> {{date('d-m-y', strtotime($package->start_date))}} <br>
<span style="font-weight:bold;">To:</span> {{date('d-m-y', strtotime($package->end_date))}}
                </td>
                <td>
                  <?php
                 
 //get date of the day
 $now=Carbon\Carbon::now();
 $date_now=$now->toDateString();
 //convert the two dates to carbon format
 $Date_Now=Carbon\Carbon::parse($date_now);

 $Start_Date=Carbon\Carbon::parse($package->start_date);
 $end_Date=Carbon\Carbon::parse($package->end_date);
                  ?>
                @if($che=$Date_Now->gt($Start_Date) && $hm=$Date_Now->lt($end_Date))
<span style="background-color:green;color:white;padding:6px;">Already Started</span>
        @elseif($che=$Date_Now->gt($end_Date))
        <span style="background-color:red;color:white;padding:6px;">Closed</span>
        @elseif($Start_Date->eq($Date_Now))
        <span style="background-color:pink;color:white;padding:6px;">Start Today</span>
        @else
        <span style="background-color:purple;color:white;padding:6px;">Will Start</span>
        @endif
                </td>
              <td>
              @if($package->end_date > Carbon\Carbon::now())
<button style="display:inline-block;" type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addDay{{$package->id}}">Add Day</button><br>
@endif
  <form method="GET" action="{{url('admin/package/show')}}" style="display:inline-block;">
  <input type="hidden"  name="package_id" value="{{$package->id}}">
  <button type="submit" class="btn btn-info btn-sm mt-2" >Show Package</button><br>
</form></br>
<button type="button" class="btn btn-danger btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#deletePackage{{$package->id}}">Delete Package</button><br>
<form method="POST" action="{{url('admin/package/edit-one-package')}}" style="display:inline-block;">
@csrf 
<input type="hidden"  name="package_id" value="{{$package->id}}">
  <button type="submit" class="btn btn-warning btn-sm mt-2" >Edit Package</button><br>
</form>                
</td>
            </tr>
<!-- start delete package modal -->
<div class="modal fade" id="deletePackage{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Package</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('admin/package/delete-one-package')}}" method="POST" enctype="multipart/form-data">
@csrf
<p>Are You Sure You Want to Delete this Package </p>

<input type="hidden" value="{{$package->id}}" name="id" class="form-control mt-2 mb-2">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end delete package modal -->
<!-- start add modal -->
<!-- <div class="modal fade" id="addDay{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="addDay">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Day</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="" method="POST" enctype="multipart/form-data" id="day">
@csrf
<label>Day Title</label>
<input type="text"  name="title" class="form-control mt-2 mb-2">
<div  id="title_error" style="display:none;color:red;"></div>
<input type="hidden"  name="package_id" value="{{$package->id}}">


<label>Day Detail</label>
<input type="text" class="form-control mt-2 mb-2" name="detail">
<div  id="detail_error" style="display:none;color:red;"></div>


<label>image</label><br>
<input type="file" name='image'><br>
<div  id="image_error" style="display:none;color:red;"></div>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
<!-- end add modal -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- start edit modal -->
<div class="modal fade" id="addDay{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('admin/package/add-one-day')}}" method="POST" enctype="multipart/form-data">
@csrf
<label>Day Name</label>
<input type="text"  name="title" class="form-control mt-2 mb-2">

<label>Day detail</label><br>
<p style="color:red;">Please put (-) sign to separate between activities</p>
<input type="text"  name="detail" class="form-control mt-2 mb-2">


<input type="hidden" value="{{$package->id}}" name="package_id" class="form-control mt-2 mb-2">


<label>Choose New image</label><br>
<input type="file" name='image'><br>

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" style="background-color:#22BAA0;border:none;color:white;">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end edit modal -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
         @endforeach   
        </tbody>
    </table>
    @else
    <h4 class="text-center mt-3">  No Package Yet.</h4>
         @endif
</div>
</div>

@endsection
@section('scripting')
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('jquery-3.7.1.min.js')}}"></script>
<script>

$.ajaxSetup({
		headers:{
"X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
		}
	});
  $(document).ready(function(){
    $('#sub').on('submit',function(event){
event.preventDefault();

$('#title_error').hide();
    $('#image_error').hide();
    $('#detail_error').hide();
console.log('hhhhhhhhhhhhhhhhh');
    // var formData=new FormData($('#registerForm')[0]);
    // console.log(formData);
	$.ajax({
	type:"POST",
    
	url:"{{route('add-one-day')}}",
	data:new FormData(this),
    
    // processData:false,
    // contentType:false,
    // cache:false,
    // dataType:'JSON',
	success:function(data){
    console.log(data.msg);
    // $('#addType').modal('hide');
    // $('#addType').find('input').val("");
    window.location.href='/admin/package/index';
    // $('#activity_success').text(data.msg);

	}, 
  error:function(reject){
var response=$.parseJSON(reject.responseText);
$.each(response.errors,function(key,val){
    $('#' + key + "_error").show();
    $('#' + key + "_error").text(val[0]);
});
}, 
})
});
  });
</script>
@endsection


