
<table width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th><span class="las la-sort"></span> Activity Name</th>
                <th><span class="las la-sort"></span> Activity Photo</th>
                <!-- <th><span class="las la-sort"></span>  Action</th> -->
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
                <img src="{{asset('typeImage/'.$type->image)}}" style="height:150px;width:150px;">
                </td>
              <!-- <td>
   <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editType{{$type->id}}">Edit</button>
   <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteType{{$type->id}}">Delete</button>
                </td> -->
            </tr>


         @endforeach   
        </tbody>

    </table>
   