@extends('client.template')

@section('styles')

@endsection

@section('contents')
	<button class="btn btn-primary btn-xs" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Request</button>
  @include('shared.notif')

  <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Date Created</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($all_request as $req)
            <tr>
              <td>{{$req->title}}</td>
              <td>{{$req->content}}</td>
              <td>{{$req->status->name}}</td>
              <td>{{$req->created_at->toDayDateTimeString()}}</td>
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
        <h4 class="modal-title">Request Informations</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('client_request_pending_store')}}" method="POST">
       		<div class="form-group">
       			<label>Request title</label>
       			<input type="text" name="title" class="form-control" placeholder="Ex: Water Pipe Damage Repair" required>
       		</div>
       		<div class="form-group">
       			<label>Request Reason/Content</label>
       			<textarea class="form-control" name="content" placeholder="Ex: Nasagasaan nang motor" required></textarea>
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
  } );
</script>
@endsection