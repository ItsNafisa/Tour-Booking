
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
Activity
@endsection

@section('content')
<div class="records table-responsive">

<div class="record-header">
    <div class="add">
        <!-- <span>Entries</span>
        <select name="" id="">
            <option value="">ID</option>
        </select> -->
        <button class="btn btn-primary" style="background-color:#22BAA0;margin-right:9px;"><a href="{{url('admin/type')}}" style="color:white;">View All</a></button>   
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addType">Add Activity</button>
    </div>
    <div  id="activity_success">
        
        </div>
    
        
<!-- start add modal -->
<div class="modal fade" id="addType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('admin/type/store')}}" id="sub" method="POST" enctype="multipart/form-data">
@csrf
<label>Type Name</label>
<input type="text"  name="name" class="form-control mt-2 mb-2">
<!-- @error('name')
<div style="color:red;">{{$message}}</div>
@enderror -->
<div  id="name_error" style="display:none;color:red;"></div>

<label>Choose New image</label><br>
<input type="file" name='image'><br>
<!-- @error('image')
<div style="color:red;">{{$message}}</div>
@enderror -->
<div  id="image_error" style="display:none;color:red;"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" style="background-color:#22BAA0;border:none;color:white;" id="AddType">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end add modal -->

    <div class="browse">
       <input type="search" placeholder="Search" class="record-search" name="search" id="search" onkeyup="searchTable()">
        <!-- <select name="" id="">
            <option value="">Status</option>
        </select> -->
    </div>
</div>
<div>
@if($errors->has('Failing'))
<div style="color:red;">{{$errors->first('Failing')}}</div>
@endif
@if(Session::has('activity_added'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('activity_added')}}
</div>
@endif

@if(Session::has('delete_type'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('delete_type')}}
</div>
@endif

@if(Session::has('update_type'))
<div class="alert alert-success">
<button type="button" class="close" data-bs-dismiss="alert">X</button>
    {{Session::get('update_type')}}
</div>
@endif

<div class="table-data">
  @if($types->count() >0)
    <table width="100%" id="typesTable">
        <thead>
            <tr>
                <th>#</th>
                <th><span class="las la-sort"></span> Activity Name</th>
                <th><span class="las la-sort"></span> Activity Photo</th>
                <th><span class="las la-sort"></span>  Action</th>
            </tr>
        </thead>
      
        <tbody>
        <?php $i=0; ?>
            @foreach($types as $type)
            <?php $i++; ?>
        <tr>
          
                <td>#{{$i}}</td>
                <td>
              {{$type->name}}
                </td>
               
                <td>
                <img src="{{asset('admin/typeImage/'.$type->image)}}" style="height:150px;width:150px;">
                </td>
              <td>
   <!-- <button type="button" class="btn btn-info editButton" data-id="{{$type->id}}" data-bs-toggle="modal" data-bs-target="#editType{{$type->id}}">Edit</button> -->
   <button type="button" class="btn btn-info editButton" data-id="{{$type->id}}" data-bs-toggle="modal" data-bs-target="#editType" style="background-color:#22BAA0;border:none;color:white;">Edit</button>
   <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteType{{$type->id}}">Delete</button>
                </td>
            </tr>

<!-- start edit modal -->
<!-- <div class="modal fade" id="editType{{$type->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('admin/type/update')}}" method="POST" enctype="multipart/form-data">
@csrf
<label>Type Name</label>
<input type="text" value="{{$type->name}}" name="name" class="form-control mt-2 mb-2">

<input type="hidden" value="{{$type->id}}" name="id" class="form-control mt-2 mb-2">

<img src="{{asset('typeImage/'.$type->image)}}" style="height:150px;width:150px;"><br>
<label>Choose New image</label><br>
<input type="file" name='image'><br>

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
<!-- end edit modal -->

<div class="modal fade" id="editType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form id="EditTypee">
@csrf
<label>Type Name</label>
<input type="text"  name="name" id="type_name" class="form-control mt-2 mb-2">

<input type="hidden"  name="id" id="type_id" class="form-control mt-2 mb-2">

<img src="{{asset('typeImage/'.$type->image)}}" style="height:150px;width:150px;" id="old_image"><br>
<label>Choose New image</label><br>
<input type="file" name='image' id="type_image"><br>

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" style="background-color:#22BAA0;border:none;color:white;">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- start delete modal -->
<div class="modal fade" id="deleteType{{$type->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="{{url('admin/type/delete')}}" method="POST" enctype="multipart/form-data">
@csrf
<p>Are You Sure You Want to Delete <span style="color:green;">{{$type->name}}</span> Type</p>

<input type="hidden" value="{{$type->id}}" name="id" class="form-control mt-2 mb-2">
    
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
<h3 class="text-center mt-3">No Activity Yet.</h3>
    @endif
</div>
</div>
</div>

@endsection

@section('scripting')
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('jquery-3.7.1.min.js')}}"></script>
<script>

// AddType
$.ajaxSetup({
		headers:{
"X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
		}
	});
  $(document).ready(function(){
$('#sub').on('submit',function(event){
event.preventDefault();

$('#name_error').hide();
    $('#image_error').hide();

console.log('hhhhhhhhhhhhhhhhh');
    // var formData=new FormData($('#registerForm')[0]);
    // console.log(formData);
	$.ajax({
	type:"POST",
    
	url:"{{route('add-type')}}",
	data:new FormData(this),
    
    processData:false,
    contentType:false,
    cache:false,
    dataType:'JSON',
	success:function(data){
    console.log(data.msg);
    $('#addType').modal('hide');
    $('#addType').find('input').val("");
    window.location.href='/admin/type';
    $('#activity_success').text(data.msg);

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

/////////////////////////////////////////////////////////////////////////////////////////////////////////



$(".editButton").click(function(){
var id=$(this).attr('data-id');
$("#type_id").val(id);

var url= '{{route("find-type","id")}}';
url=url.replace('id',id);
$.ajax({
  url:url,
  type:"GET",
  success:function(data){
   if(data.success==true){
    console.log(data);
var type=data.data;
$("#type_name").val(type[0].name);
// $("#old_image").src('typeImage/'+type[0].image);
$("#old_image").attr("src",'typeImage/'+type[0].image)
   }else{
    alert(data.msg);
   }
  }
});

});

$("#EditTypee").submit(function(e){
e.preventDefault();
var formData=$(this).serialize();
$.ajax({
  url:"{{route('update-type')}}",
  type:"POST",
  data:formData,
success:function(data){
  if(data.success==true){
    location.reload();
  }
}
});
});
////////////////////////////////////////////////////////////////////////////////////////////////////////


// typesTable
// $('#search').on('keyup',function(e){
// e.preventDefault();

// let search=$('#search').val();
// // console.log(search);
// // $('.table-data').remove();
// $.ajax({
// 	type:"GET",
// 	url:"{{route('search-type')}}",
// 	data:{'search':search},
 
   
  
// 	success:function(res){
 
//     // $('.table-data').html(res);
  

// 	}, 
//   error:function(reject){
//     console.log(reject);
// }, 
// });
// });
  });
  function searchTable() {
  var input,filter,table,tr,td,i,txtValue;
  input=document.getElementById('search');
  filter=input.value.toUpperCase();
 table=document.getElementById('typesTable');
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


