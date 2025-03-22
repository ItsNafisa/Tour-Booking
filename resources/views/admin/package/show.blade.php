@extends('admin.index')
@section('styleing')
<style>
a{
    /* color:#899DC1; */
}
</style>
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
    </div>
</div>
@if(Session::has('day_deleted_successfully'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('day_deleted_successfully')}}
</div>
@endif

@if(Session::has('day_updated_successfully'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('day_updated_successfully')}}
</div>
@endif

<h2 class="fw-bold text-center">Package Detail</h2>
<div class="p-5">
    <div class="row pb-5">
        <div class="col-4">
        <h4 style="color:#22baa0;" class="fw-bold">Package Country</h4>
        <p> {{$package->country->sortname}}</p>
        </div>
        <div class="col-4">
        <h4 style="color:#22baa0;" class="fw-bold">Package State</h4>
        <p> {{$package->state->name}}</p>
        </div>
        <div class="col-4">
        <h4 style="color:#22baa0;" class="fw-bold">Package City</h4>
        <p> {{$package->city->name}}</p>
        </div>
    </div>

<hr>
    <div class="row mt-5">
        <div class="col-4">
        <h4 style="color:#22baa0;" class="fw-bold">Package Price</h4>
        <p> {{$package->price}}</p>
        </div>
        <div class="col-4">
        <h4 style="color:#22baa0;" class="fw-bold">Package Max People</h4>
        <p> {{$package->number_of_people}}</p>
        </div>
        <div class="col-4">
        <h4 style="color:#22baa0;" class="fw-bold">Package Image</h4>
 <img src="{{asset('packageImage/'.$package->image)}}" style="height:150px;width:150px;border-radius:10px;">
        </div>
    </div>

<hr>

 <h4 style="color:#22baa0;" class="fw-bold">Package Description</h4>
 <p> {{$package->description}}</p>
 <hr>





 <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePackage{{$package->id}}">Delete Package</button> -->
<!-- start delete package modal -->
<!-- <div class="modal fade" id="deletePackage{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> -->
<!-- end delete package modal -->



@if($package->days->count() > 0)
 <table width="100%">
        <thead>
            <tr>
            
                
             
                <th><span class="las la-sort"></span>Day Title</th>
                <th><span class="las la-sort"></span>Day Detail</th>
                <th><span class="las la-sort"></span> Day Image</th>
                <th><span class="las la-sort"></span>  Action</th>
            </tr>
        </thead>
        <tbody>
     
            @foreach($package->days as $d)
           
        <tr>
          
               
                <td>
                {{$d->title}}
                </td>
                <td>
                    @foreach(preg_split('/[-]/',$d->detail) as $k)
<h1 style="display:inline;">.</h1>{{$k}}<br>
                    @endforeach
               
                </td>
                <td>
                <img src="{{asset('dayImage/'.$d->image)}}" style="height:150px;width:150px;">
                </td>
                <td>
   
     <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDay{{$d->id}}">Delete</button>   
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDay{{$d->id}}" style="background-color:#22BAA0;border:none;color:white;">Edit</button>          
            </td> 
            </tr>
<!-- start delete day modal -->
<div class="modal fade" id="deleteDay{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Day</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('admin/package/delete-day')}}" method="POST" enctype="multipart/form-data">
@csrf
<p>Are You Sure You Want to Delete <span style="color:green;">{{$d->title}}</span> </p>

<input type="hidden" value="{{$d->id}}" name="id" class="form-control mt-2 mb-2">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end delete day modal -->

<!-- start edit modal -->
<div class="modal fade" id="editDay{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Day</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('admin/package/updateDay')}}" method="POST" enctype="multipart/form-data">
@csrf

<label style="color:#22BAA0;">Day Title</label>
<input type="text" value="{{$d->title}}" name="title" class="form-control  mb-2">

<input type="hidden" value="{{$d->id}}" name="id" class="form-control mt-2 mb-2">

<input type="hidden" value="{{$package->id}}" name="package_id" class="form-control mt-2 mb-2">

<label style="color:#22BAA0;" class="mt-3">Day Detail</label><br>
<p style="color:red;">Please put (-) sign to separate between activities</p>
<textarea name="detail" class="w-100">{{$d->detail}}</textarea><br>

<img src="{{asset('dayImage/'.$d->image)}}" style="height:150px;width:150px;" class="mt-3"><br><br>

<label style="color:#22BAA0;">Choose New image</label><br>
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
         @endforeach   
        </tbody>
    </table>
@endif




</div>
</div>

@endsection
@section('scripting')
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
ClassicEditor
.create(document.querySelector('.editor'))
.catch(error=>{
    console.log('error');
});
function closing(){
    console.log('ppppppp');
}
</script>
@endsection


