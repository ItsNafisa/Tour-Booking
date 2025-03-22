@extends('admin.index')
@section('styleing')

<style>
a{
    /* color:#899DC1; */
}
</style>
@endsection
@section('title')
My Profile
@endsection

@section('content')
<div class="records table-responsive">

<div class="record-header">
    <div class="add">
        <!-- <span>Entries</span>
        <select name="" id="">
            <option value="">ID</option>
        </select> -->
        <!-- <button onclick="create()">Add Destination</button> -->
    </div>

    <div class="browse">
       <!-- <input type="search" placeholder="Search" class="record-search"> -->
        <!-- <select name="" id="">
            <option value="">Status</option>
        </select> -->
    </div>
</div>
<div>



    <table width="100%">
        <thead>
            <tr>
            
                <th>#</th>
                <th><span class="las la-sort"></span> Name</th>
                
                <th><span class="las la-sort"></span> Email</th>
                <th><span class="las la-sort"></span> Image</th>
           
          
            </tr>
        </thead>
        <tbody>
        <?php $i=0; ?>
        
            <?php $i++; ?>
        <tr>
          
                <td>#{{$i}}</td>
                <td>
           
     <p>{{Auth::user()->name}}</p>
                </td>
               
                <td>
                <p>{{Auth::user()->email}}</p>
                </td>
                <td>
                <img src="{{asset('userImage/'.Auth::user()->image)}}" style="width:70px;height:70px;border-radius:50%;">
                </td>
            
            </tr>


    
        </tbody>
    </table>
</div>
</div>

@endsection
@section('scripting')
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script>

</script>
@endsection


