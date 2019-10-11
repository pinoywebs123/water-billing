@extends('maintenance.template')

@section('styles')

@endsection

@section('contents')
	<table id="example" class="display" style="width:100%">
    @include('shared.notif')
        <thead>
            <tr>
              <th>Account ID</th>
            	<th>Customer</th>
                <th>Title</th>
                <th>Biller Approved</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($all_request as $req)
            <tr>
                <td>{{$req->user->account_id}}</td>
            	   <td>{{$req->user->email}}</td>
              	<td>{{$req->title}}</td>
              	<td>{{$req->biller->email}}</td>
              	<td>{{$req->status->name}}</td>
              	<td>{{$req->created_at->toDayDateTimeString()}}</td>
              	<td>
              		<form action="{{route('maintenance_accpet_job')}}" method="POST" id="form{{$req->id}}">
                    @csrf
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">View</button>
                    <input type="hidden" name="request_id" value="{{$req->id}}">
                    <button class="btn btn-success btn-xs request_modal" data-toggle="modal" data-target="#myModal2" value="{{$req->id}}">Accept Job</button>  
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
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
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
        <h4 class="modal-title">Oppps!!!</h4>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Are you sure want to approved?</h3>
      </div>
      <div class="modal-footer">
        <form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default approved_request">Yes</button>
        </form>
      </div>
    </div>

  </div>
</div>    
@endsection

@section('scripts')
<script type="text/javascript">
  var id;
  $(document).ready(function() {
    $('#example').DataTable();

    $(".request_modal").click(function(){
      id = $(this).val();
      
    });

    $(".approved_request").click(function(){
      $("#form"+id).submit();
    });
  } );
</script>
@endsection