@extends('client.template')

@section('styles')
    <style>
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #8e8e93 !important;
            opacity: 1 !important; /* Firefox */
        }

        td#answer { white-space:pre }
    </style>
@endsection

@section('contents')

  <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Date Created</th>
                <th>Title</th>
                <th>Update info</th>
                <th>Content</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
          @foreach($all_request as $req)
            <tr>
              <td>{{$req->created_at->toDayDateTimeString()}}</td>
              <td>{{$req->title}}</td>
              <td>{{$req->answer}}</td>
              <td>{{$req->content}}</td>
              <td>{{$req->status->name}}</td>
            </tr>
          @endforeach
        </tbody>
        
        
    </table>

    <br>
    <button class="btn btn-primary" type="button" class="btn btn-info btn" data-toggle="modal" data-target="#myModal">New Request</button>
    @include('shared.notif')



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request Information</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('client_request_pending_store')}}" method="POST">
       		<div class="form-group">
                <label>Request to</label>
                            
                <select class="form-control" id="title" name="title" required>
                    <option value="Change name">Change name</option>
                    <option value="Change location">Change location</option>  
                    <option value="Temporary closed/Disconnection">Temporary closed/Disconnection</option> 
                    <option value="Others">Others</option>  
                </select>
            </div>
            <div class="form-group" id="update_container">
                <div id="update">
                    <label>Update</label>
                    <textarea class="form-control" id="answer" name="answer" placeholder="First Name: 
Middle Name: 
Last Name: "></textarea>
                </div>
            </div>
       		<div class="form-group">
       			<label>Request Reason/Content</label>
       			<textarea class="form-control" name="content" placeholder="Insert more info if needed" required></textarea>
       		</div>
       		<div class="form-group">
       			<button type="submit" class="btn btn-primary">Submit</button>
            @csrf
       		</div>
       </form>
      </div>
     
    </div>

  </div>
</div>	
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  
    var update = $("#update");
    $("#title").change(function () {

        if ($("#title").val() == "Change name") {
            $("#update").remove();
            update.appendTo("#update_container");
            $("#answer").attr("placeholder", "First Name: \nMiddle Name: \nLast Name: ");
        }
        else if ($("#title").val() == "Change location") {
            $("#update").remove();
            update.appendTo("#update_container");
            $("#answer").attr("placeholder", "Address: \nCity: \nProvince: ");
        }
        else if ($("#title").val() == "Temporary closed/Disconnection")
            $("#update").remove();
        else {
            $("#update").remove();
            update.appendTo("#update_container");
            $("#answer").attr("placeholder", "Add more info");
        }
    });
  });
</script>
@endsection