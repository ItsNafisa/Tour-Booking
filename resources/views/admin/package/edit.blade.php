@extends('admin.index')
@section('styleing')
<meta name="csrf-token" content="{{csrf_token()}}" />
<style>
#countries{
    height: fit-content;
}
</style>
@endsection
@section('title')
Edit Package
@endsection
@section('content')
<div class="">


<form class="mb-5" action="{{url('admin/package/update-one-package')}}" method="POST" enctype="multipart/form-data" style="margin-right:10px;margin-left:10px;">
@csrf

<input type="hidden" class="form-control mt-2" name='package_id' value="{{$package->id}}">
<input type="hidden" class="form-control mt-2" name='type_id' value="{{$package->type_id}}">
<input type="hidden" class="form-control mt-2" name='destination_id' value="{{$package->destination_id}}">
<input type="hidden" class="form-control mt-2" name='country_id' value="{{$package->country_id}}">

<div class="form-group mt-5">
<label>Package State</label>
<select name="state_id" id="states-list"  class="form-control">
<option value="">Select State</option>
    @foreach($states as $state)
    <option value="{{$state->id}}" {{$package->state_id==$state->id?'selected':''}}>{{$state->name}}</option>
    @endforeach
</select>
</div>
 


<div class="form-group mt-5">
    city
<select id="cities-list"  class="form-control" name="city_id">
<option value="{{$package->city_id}}">Select City</option>
</select>
</div>
@if(Session::has('select_city'))
<div style="color:red;">
    {{Session::get('select_city')}}
</div>
@endif

<img src="{{asset('packageImage/'.$package->image)}}" style="height:150px;width:150px;">
<div class="form-group mt-5">
<label>Choose new image</label><br>
<input type="file" name='image'>
    </div>


<label>Package Price</label>
<input type="text" class="form-control mt-2 mb-3" name='price' value="{{$package->price}}">


<label>Package Description</label>
<input type="text" class="form-control mt-2 mb-3" name='description' value="{{$package->description}}">

<label>Package number of people</label>
<input type="number" class="form-control mt-2 mb-3" name='number_of_people' value="{{$package->number_of_people}}">


<label>Start Date</label>
<input type="date" name="start_date" class="form-control mt-2 mb-2" value="{{$package->start_date}}">


<label>End Date</label>
<input type="date" name="end_date" class="form-control mt-2 mb-2" value="{{$package->end_date}}">

    <button type="submit" class=" mt-5 btn btn-warning text-white w-100">Update</button>
</form>
  
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
    
    console.log(result.data);
    $('#cities-list').html('<option value="">Select City</option>');
    $.each(result.data,function(key,value){
        $('#cities-list').append('<option value="'+value.id+'">'+value.name+'</option>');  
    });

},
error:function(reject){
console.log(reject);
}
})
}); 
 
</script>
@endsection