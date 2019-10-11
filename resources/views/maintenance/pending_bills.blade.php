@extends('maintenance.template')

@section('styles')

@endsection

@section('contents')
	<table id="example" class="display" style="width:100%">
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
              	<td>{{$req->created_at->diffForHumans()}}</td>
              	<td>
              		<button class="btn btn-info btn-xs">View</button>
              		<button class="btn btn-success btn-xs">Accept Job</button>
              	</td>
            </tr>
          @endforeach
        </tbody>
        
        
    </table>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
@endsection