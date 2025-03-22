@extends('admin.index')
@section('styleing')
<meta name="csrf-token" content="{{csrf_token()}}" />
<!-- <link rel="stylesheet" href="{{asset('myselect/multi-select-tag.css')}}"> -->
<style>
#countries{
    height: fit-content;
}
</style>
@endsection
@section('title')
Add Packadge
@endsection
@section('content')
<div class="">
<form class="mb-5" action="{{url('admin/package/store')}}" method="POST" enctype="multipart/form-data" style="margin-right:10px;margin-left:10px;">
@csrf
<label>Activity Name</label>
<input type="text" value="{{$type_name}}" name="type" class="form-control mt-2 mb-2" readonly="readonly">
<input type="hidden" value="{{$type_id}}" name="type_id" class="form-control mt-2 mb-2" readonly="readonly">
<br><br>

<label>Desination Name</label>
<input type="text" value="{{$destination->country->sortname}}" name="country" class="form-control mt-2 mb-2" readonly="readonly">
<input type="hidden" value="{{$destination->country->id}}" name="countryID" class="form-control mt-2 mb-2" readonly="readonly">
<input type="hidden" value="{{$destination->id}}" name="destination_id" class="form-control mt-2 mb-2" readonly="readonly">


<br><br>
<select id="states-list"  class="form-control" name="state_id">
<option value="">Select State</option>
</select>
@error('state_id')
<div style="color:red;">{{$message}}</div>
@enderror
<br><br>

<select id="cities-list"  class="form-control" name="city_id">
<option value="">Select City</option>
</select>
@error('city_id')
<div style="color:red;">{{$message}}</div>
@enderror
<br><br>

<label>Start Date</label>
<input type="date" name="start_date" class="form-control mt-2 mb-2" id="sta_date">
@error('start_date')
<div style="color:red;">{{$message}}</div>
@enderror
<br><br>

<label>End Date</label>
<input type="date" name="end_date" class="form-control mt-2 mb-2">
@error('end_date')
<div style="color:red;">{{$message}}</div>
@enderror
<br><br>

<label>Max People</label>
<input type="number" name="number_of_people" class="form-control mt-2 mb-2" min="1" placeholder="People">
@error('number_of_people')
<div style="color:red;">{{$message}}</div>
@enderror
<br><br>

<label>Description</label>
<input type="text" name="description" class="form-control mt-2 mb-2"  placeholder="Description">
@error('description')
<div style="color:red;">{{$message}}</div>
@enderror
<br><br>

<label>Price</label>
<input type="text" name="price" class="form-control mt-2 mb-2" placeholder="Price">
@error('price')
<div style="color:red;">{{$message}}</div>
@enderror
<br><br>

<div class="form-group mt-5">
<label>Package image</label><br>
<input type="file" name='image'>
    </div>

<!-- <div class="row my-4">
<div class="col-lg-10 mx-auto">
    <div class="card shadow">
<div class="card-header">
    <h4>Add Package Plan</h4>
</div> -->
<!-- <div class="card-body p-4">

<div id="show_item">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label>Day Title</label>
<input type="text" name="title[]" class="form-control">
        </div>

        <div class="col-md-3 mb-3">
        <label>Day Detail</label>
<input type="textarea" name="detail[]" class="form-control">
        </div>

       
       <div class="col-md-2 mb-3 d-grid">
        <button class="btn btn-success add_item_btn">Add More</button>
       </div> 
    </div>
</div>
<div>

</div>

</div>
    </div>
</div>
</div> -->





    <button type="submit" class="mt-5 btn btn-danger text-white w-100" style="background-color:#22BAA0;border:none;color:white;">Add</button>
</form>
  
</div>

</div>
@endsection
@section('scripting')
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('repeater.js')}}"></script>
<script>
    $('.repeater').repeater({
initEmpty:true,
defaultValues:{
    'text-input':'foo'
},
show:function(){
    $(this).slideDown();
},
hide:function(deleteElement){
    if(confirm('are you')){
        $(this).slideUp(deleteElement);
    }
},
    });
    $.ajaxSetup({
		headers:{
"X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
		}
	});
$(document).ready(function(){
let sta_date=document.querySelector('#sta_date');
sta_date.addEventListener('input',function(){
    let da=new Date(sta_date.value);
 
});


//start
$(".add_item_btn").click(function(e){
    e.preventDefault();
$("#show_item").prepend('<div class="row"> <div class="col-md-4 mb-3"> <label>Day Title</label><input type="text" name="title[]" class="form-control"></div>  <div class="col-md-3 mb-3"> <label>Day Detail</label><input type="text" name="detail[]" class="form-control"></div> <div class="col-md-2 mb-3 d-grid"><button class="btn btn-danger remove_item_btn">Remove</button></div> </div>')
});
$(document).on('click','.remove_item_btn',function(e){
    e.preventDefault();
    let row_item=$(this).parent().parent();
    $(row_item).remove();
})
//end
var idCountry=$("input[name=countryID]").val();
$('#states-list').html('');
$.ajax({
    url:"{{route('allState')}}",
    type:"POST",
data:{
    country_id:idCountry
},
dataType:'json',
success:function(result){
    console.log('success');
    console.log(idCountry);
    console.log(result.data);
    $('#states-list').html('<option value="">Select State</option>');
    $.each(result.data,function(key,value){
        $('#states-list').append('<option value="'+value.id+'">'+value.name+'</option>');  
    });
    $('#cities-list').html('<option value="">Select City</option>');
} 

})

$('#states-list').on('change',function(){
    var idState=this.value;
    $('#cities-list').html(''); 
    $.ajax({
    url:"{{route('allCity')}}",
    type:"POST",
data:{
    state_id:idState
},
dataType:'json',
success:function(result){
    console.log('success');
    console.log(idCountry);
    console.log(result.data);
    $('#cities-list').html('<option value="">Select City</option>');
    $.each(result.data,function(key,value){
        $('#cities-list').append('<option value="'+value.id+'">'+value.name+'</option>');  
    });

} 

})
});

});
</script>
@endsection
