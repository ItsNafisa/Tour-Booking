@extends('admin.index')
@section('styleing')

<style>

</style>
@endsection
@section('title')
Edit {{$day->title}}
@endsection
@section('content')
<div class="">

<form class="mb-5" action="{{url('admin/package/updateDay')}}" method="POST" enctype="multipart/form-data" style="margin-right:10px;margin-left:10px;">
@csrf
<div class="form-group mt-5">
<label>Day Title</label><br>
<input type="text" class="form-control mt-2" value="{{$day->title}}" name='title'>
    </div>

    <input type="hidden" class="form-control mt-2" value="{{$day->id}}" name='id'>
    <input type="hidden" class="form-control mt-2" value="{{$package_id}}" name='package_id'>
    

    <div class="form-group mt-5">
<label>Day Detail</label><br>
<textarea class="form-control mt-2 mb-2" name="detail" id="editor">{!! $day->detail !!}</textarea>
    </div>

    <img src="{{asset('dayImage/'.$day->image)}}" style="height:150px;width:150px;">

<div class="form-group mt-5">
<label>Choose image</label><br>
<input type="file" name='image'>
    </div>


    <button type="submit" class=" mt-5 btn btn-danger text-white w-100">Add</button>
</form>
  
</div>

</div>
@endsection
@section('scripting')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
   ClassicEditor
.create(document.querySelector('#editor'))
.catch(error=>{
    console.log('error');
});
 
</script>
@endsection