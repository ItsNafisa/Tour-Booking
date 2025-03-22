@extends('admin.index')
@section('styleing')
<link rel="stylesheet" href="{{asset('myselect/multi-select-tag.css')}}">
<style>
a{
    /* color:#899DC1; */
}
</style>
@endsection
@section('title')
Destination
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
        <!-- <span>Entries</span> -->
        <!-- <select name="" id="">
            <option value="">ID</option>
        </select> -->
 <button class="btn btn-primary" style="background-color:#22BAA0;margin-right:9px;"><a href="{{url('admin/destination')}}" style="color:white;">View All</a></button>   
        <button onclick="create()">Add Destination</button>
    </div>






    <div class="browse">

       <input type="search" placeholder="Search" class="record-search" name="search" id="search" onkeyup="searchTable()">
       <!-- <button type="submit" class="btn btn-primary" style="background-color:#22BAA0">Search</button> -->
    </div>
 
</div>
<div>
@if(Session::has('destination_created_successfully'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('destination_created_successfully')}}
</div>
@endif

@if(Session::has('updated'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('updated')}}
</div>
@endif

@if(Session::has('destination_deleted_successfully'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('destination_deleted_successfully')}}
</div>
@endif

@if(Session::has('same'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('same')}}
</div>
@endif

@if($destinations->count() > 0)
    <table width="100%" id="destinationsTable">
        <thead>
            <tr>
            
                <th>#</th>
                <th><span class="las la-sort"></span> Destination Name</th>
                
                <th><span class="las la-sort"></span> Destination Photo</th>
                <th><span class="las la-sort"></span> Activites</th>
                <th><span class="las la-sort"></span>  Action</th>
                <!-- <th><span class="las la-sort"></span> ISSUED DATE</th>
                <th><span class="las la-sort"></span> BALANCE</th>
                <th><span class="las la-sort"></span> ACTIONS</th> -->
            </tr>
        </thead>
        <tbody>
            
        <?php $i=0; ?>
            @foreach($destinations as $destination)
            
            <?php $i++; ?>
        <tr>
          
                <td>#{{$i}}</td>
                <td>
                {{$destination->country->sortname}}
                </td>
               
                <td>
                <img src="{{asset('destinationImage/'.$destination->image)}}" style="height:150px;width:150px;">
                </td>
                <td>
                    
                @foreach($destination->types as $type)
    <form method="GET" action="{{url('admin/package/create')}}">
        <input type="hidden" value="{{$destination->id}}" name="destination_id">
        <input type="hidden" value="{{$type->name}}" name="type_name">
        <input type="hidden" value="{{$type->id}}" name="type_id">
      
    <button style="border:none;background-color:transparent;display:inline-block;padding:5px;cursor:pointer;" type="submit"><span class="paid">{{$type->name}}</span></button>      
    </form>
              <!-- <a href="{{url('admin/package/index',[$destination->id,$type->name])}}"><span class="paid">{{$type->name}}</span><a> -->
              @endforeach
            
              </td>
              <td>
   <a href="{{url('admin/destination/edit',$destination->id)}}"><button class="btn btn-warning" style="background-color:#22BAA0;border:none;color:white;">Edit</button></a>
   <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDestination{{$destination->id}}">Delete</button>
                </td>
              
            </tr>

<!-- start delete modal -->
<div class="modal fade" id="deleteDestination{{$destination->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Destination</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('admin/destination/delete')}}" method="POST" enctype="multipart/form-data">
@csrf
<p>Are You Sure You Want to Delete <span style="color:green;">{{$destination->country->sortname}}</span> Destination</p>

<input type="hidden" value="{{$destination->id}}" name="id" class="form-control mt-2 mb-2">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end delete modal -->


         @endforeach   
      
        </tbody>
    </table>
    @else
       <h4 class="text-center mt-3">  No Destination Yet.</h4>
         @endif
</div>
</div>

@endsection
@section('scripting')
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('myselect/multi-select-tag.js')}}"></script>
<script>
    new MultiSelectTag('countries')  // id
    function create(){
        window.location='destination/create'
    }

    function goEditing(id){
      window.location='destination/edit/id'
    }
    function searchTable() {
  var input,filter,table,tr,td,i,txtValue;
  input=document.getElementById('search');
  filter=input.value.toUpperCase();
 table=document.getElementById('destinationsTable');
 tr=table.getElementsByTagName("tr");
 for(i=0;i<tr.length;i++){
  td=tr[i].getElementsByTagName("td")[1];
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
</script>
@endsection


