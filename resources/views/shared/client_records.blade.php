@extends('admin.template')

@section('styles')

@endsection

@section('contents')
	<h1 class="text-center">{{$client->name}} Records</h1>
	<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">New Bill</button>
	@include('shared.notif')
	<table class="table">
		<thead>
			<th>Water Consumption</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Bill</th>
			<th>Status</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach($records as $rec)
				<tr>
					<td>{{$rec->water_consumption}}</td>
					<td>{{$rec->start_date}}</td>
					<td>{{$rec->end_date}}</td>
					<td>{{$rec->bill}}</td>
					<td>
						@if($rec->status_id == 0)
							<p style="color: red">Pending Payment</p>
						@else
							<p style="color: green">Paid</p>
						@endif
					</td>
					<td>
						<button class="btn btn-info btn-xs">Edit</button>
						<button class="btn btn-danger btn-xs">Paid</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  	<form action="{{route('admin_view_client_records_store',['id'=> Request::segment(3)])}}" method="POST">
  	@csrf	
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Water Consumption</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<label>Water Consumption</label>
        	<input type="number" name="water_consumption" class="form-control" required="">
        </div>
        <div class="form-group">
        	<label>Start Date:</label>
        	<input type="date" name="start_date" class="form-control" required="">
        </div>
        <div class="form-group">
        	<label>End Date:</label>
        	<input type="date" name="end_date" class="form-control" required="">
        </div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>	
@endsection

@section('scripts')

@endsection