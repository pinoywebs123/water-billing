@extends('maintenance.template')

@section('styles')
    <style>
        .answer { white-space:pre }
    </style>
@endsection

@section('contents')
	<table id="example" class="display" style="width:100%">
    @include('shared.notif')
        <thead>
            <tr>
                <th>Date Created</th>
                <th>Account ID</th>
            	<th>Customer</th>
                <th>Title</th>
                <th>Update info</th>
                <th>Content</th>
                <th>Biller</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach($all_request as $req)
            <tr>
                <td>{{$req->created_at->toDayDateTimeString()}}</td>
                <td>{{$req->user->account_id}}</td>
                <td>{{$req->user->email}}</td>
                <td>{{$req->title}}</td>
                <td class="answer">{{$req->answer}}</td>
                <td>{{$req->content}}</td>
              	<td>{{$req->biller->email}}</td>
              	<td>
              		<form action="{{route('maintenance_accpet_job')}}" method="POST" id="form_accept_job">
                        <button class="btn btn-info btn-xs view-jobs" data-toggle="modal" data-target="#myModal" value="{{$req->id}}">View</button>
                        <input type="hidden" name="id" value="{{$req->id}}">
                        <button class="btn btn-success btn-xs request_modal accept-jobs" data-toggle="modal" data-target="#myModal2" data-repair=<?php if ($req->title == 'Repair') echo true; else echo false; ?>>Accept Job</button>  
                        @csrf
                    </form>
              	</td>
            </tr>
          @endforeach
        </tbody>
        
        
    </table>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Request Informations</h4>
      </div>
      <div class="modal-body">
        <div id="req_info">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request approval</h4>
      </div>
      <div class="modal-body">
        <form id="confirm_ar" method="POST" action="{{route('maintenance_accept_repair')}}">
            <h3 id="confirm_accept" class="text-center">Are you sure want to approve?</h3>
            <div id="confirm_repair">
                <h3 class="text-center">Set the schedule of the repairing:</h3>
                <input type="hidden" name="id" value="<?php try { echo $req->id; } catch(Exception $e){} ?>">
                <input type="datetime-local" class="form-control" name="answer" style="width: 50%; margin: 0 auto;" required>
            </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-default approved_request">Yes</button>
          @csrf
        </form>
      </div>
    </div>

  </div>
</div>    
@endsection

@section('scripts')
<script type="text/javascript">
  var id;
  var url = '{{route('maintenance_client_job_info')}}';
  var token = '{{Session::token()}}';

  $(document).ready(function() {
    $('#example').DataTable({
		"order": []
	});

    $(".request_modal").click(function(){
      id = $(this).val();
      
    });

    $(".approved_request").click(function(){
        if ($(this).data("repair") != true) {
            $("#confirm_ar").submit(function(e){
                e.preventDefault();
            });
            
            $("#form_accept_job").submit();
        }
    });

    $(".view-jobs").click(function(){
        $("#req_info").html("");
        $("#req_info").append("");
        $("#req_info").append("<h3>" + $("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(1)").html() + "</h3>");
        $("#req_info").append("<p> Title : " + $("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(3)").html() + "</p>");
        
        var info = $("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(4)").html();
        if (info != '')
        $("#req_info").append("<p> Update info: " + info + "</p>");

        var reason = $("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(5)").html();
        if (reason != '')
        $("#req_info").append("<p> Content: " + reason + "</p>");
    });

    var accept = $("#confirm_accept");
    var repair = $("#confirm_repair");
    $(".accept-jobs").click(function(){
        if ($(this).data("repair") == true) {

            $(".approved_request").data("repair", true);

            $("#confirm_accept").remove();
            $("#confirm_ar").append(repair);

        }
        else {

            $(".approved_request").data("repair", false);

            $("#confirm_repair").remove();
            $("#confirm_ar").append(accept);

        }
    });

  } );
</script>
@endsection