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
New Destination
@endsection
@section('content')
<div class="">
@if($errors->has('Failing'))
<div style="color:red;">{{$errors->first('attaching')}}</div>
@endif

@if($errors->has('already'))
<div style="color:red;">{{$errors->first('already')}}</div>
@endif
<form class="mb-5" action="{{url('admin/destination/store')}}" method="POST" enctype="multipart/form-data" style="margin-right:10px;margin-left:10px;">
@csrf
<div class="form-group mt-5">
<label>Destination Name</label><br>
<!-- <input type="text" class="form-control mt-2" placeholder="Enter destination country name" name='name'> -->
<select name="country_id" id="selectCountry"  class="form-control">
<option value="">Select Country</option>
    @foreach($countries as $country)
    <option value="{{$country->id}}">{{$country->sortname}}</option>
    @endforeach
</select>
    </div>
    @error('country_id')
<div style="color:red;">{{$message}}</div>
@enderror

<!-- <div class="form-group mt-5">
<label>Continent</label>
<input type="text" class="form-control mt-2" placeholder="Enter continent" name='continent'>
    </div>
    @error('continent')
<div class="alert alert-danger mt-2">{{$message}}</div>
@enderror -->


<div class="form-group mt-5">
<label>Destination image</label><br>
<input type="file" name='image'>
    </div>
    @error('image')
<div style="color:red;">{{$message}}</div>
@enderror

<div class="form-group mt-5">
@if($errors->has('type'))
<div style="color:red;">{{$errors->first('type')}}</div>
@endif
<label>Destination Types</label><br>
<select name="types[]" id="countries" multiple>
    @foreach($types as $type)
    <option value="{{$type->id}}">{{$type->name}}</option>
    @endforeach
</select>
    </div>
    <button type="submit" class=" mt-5 btn btn-danger text-white w-100" style="background-color:#22BAA0;outline:none;border:none;">Add</button>
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