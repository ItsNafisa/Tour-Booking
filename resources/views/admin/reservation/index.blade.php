@extends('admin.index')
@section('styleing')

<style>
a{
    /* color:#899DC1; */
}
</style>
@endsection
@section('title')
Resrvations
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

@if($reservations->count() >0)

    <table width="100%">
        <thead>
            <tr>
            
                <th>#</th>
                <th><span class="las la-sort"></span> Destination</th>
                
                <th><span class="las la-sort"></span> Total Price</th>
                <th><span class="las la-sort"></span> Number of People</th>
                <th><span class="las la-sort"></span>  Date</th>
                <th><span class="las la-sort"></span>  Status</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=0; ?>
            @foreach($reservations as $reservation)
            <?php $i++; ?>
        <tr>
          
                <td>#{{$i}}</td>
                <td>
                <?php 
      $diff=strtotime($reservation->package->end_date) - strtotime($reservation->package->start_date);
         $days=abs(round($diff / 86400));
               ?>   
                {{$reservation->package->country->sortname}} - {{$days}} Days in {{$reservation->package->city->name}}, {{$reservation->package->state->name}}
                </td>
               
                <td>
                {{$reservation->total_price}} 
                </td>
                <td>
                {{$reservation->number_of_people}}       
              </td>
              <td>
<span style="font-weight:bold;">From:</span> {{date('d-m-y', strtotime($reservation->package->start_date))}} <br>
<span style="font-weight:bold;">To:</span> {{date('d-m-y', strtotime($reservation->package->end_date))}}
                </td>
                <td>
        @if($reservation->package->end_date > Carbon\Carbon::now())
<span style="background-color:green;color:white;padding:6px;">opening</span>
        @else
        <span style="background-color:red;color:white;padding:6px;">closed</span>
        @endif
                </td>
            </tr>


         @endforeach   
        </tbody>
    </table>
    @else
<h3 class="mt-3 text-center">No Resevation Yet.</h3>
    @endif
</div>
</div>

@endsection
@section('scripting')
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script>

</script>
@endsection


