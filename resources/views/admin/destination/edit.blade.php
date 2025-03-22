@extends('admin.index')
@section('styleing')
<link rel="stylesheet" href="{{asset('myselect/multi-select-tag.css')}}">
<style>
#countries{
    height: fit-content;
}
</style>
@endsection
@section('title')
Edit Destination
@endsection
@section('content')
<div class="">
@if($errors->has('alreadyEditingDestination'))
<div style="color:red;">{{$errors->first('alreadyEditingDestination')}}</div>
@endif

<form class="mb-5" action="{{url('admin/destination/update')}}" method="POST" enctype="multipart/form-data" style="margin-right:10px;margin-left:10px;">
@csrf

<input type="hidden" class="form-control mt-2" name='id' value="{{$destination->id}}">

<div class="form-group mt-5">
<label>Destination Name</label>
<!-- <input type="text" class="form-control mt-2" placeholder="Enter destination country name" name='name' value="{{$destination->name}}"> -->
   
<select name="country_id" id="selectCountry"  class="form-control">
<option value="">Select Country</option>
    @foreach($countries as $country)
    <option value="{{$country->id}}" {{$destination->country_id==$country->id?'selected':''}}>{{$country->sortname}}</option>
    @endforeach
</select>
</div>
    @error('country_id')
<div style="color:red;">{{$message}}</div>
@enderror

<!-- <div class="form-group mt-5">
<label>Continent</label>
<input type="text" class="form-control mt-2" placeholder="Enter continent" name='continent' value="{{$destination->continent}}">
    </div>
    @error('continent')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror -->


<img src="{{asset('destinationImage/'.$destination->image)}}" style="height:150px;width:150px;">

<div class="form-group mt-5">
<label>Choose image</label><br>
<input type="file" name='image'>
    </div>
    @error('image')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror

<div class="form-group mt-5">

<label>Destination Activites</label><br>
<select name="types[]" id="countries" multiple>
@foreach($types as $type)
    <option @foreach($destination->types as $dest) {{$dest->id==$type->id? 'selected' : ''}} @endforeach value="{{$type->id}}">{{$type->name}}</option>
    @endforeach
</select>
    </div>
    <button type="submit" class=" mt-5 btn btn-danger text-white w-100" style="background-color:#22BAA0;border:none;outline:none;">Update</button>
</form>
  
</div>

</div>
@endsection
@section('scripting')
<script src="{{asset('myselect/multi-select-tag.js')}}"></script>
<script>
    new MultiSelectTag('countries')  // id
 
</script>
@endsection