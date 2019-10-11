
@extends($usertype . '.template')

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
					<td>{{$rec->water_consumption}} <strong style="color: red">(cu.m)</strong></td>
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
						<button class="btn btn-info btn-xs biller_edit" data-toggle="modal" data-target="#myModal2" value="{{$rec->id}}">Edit</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  	<form action="{{route($usertype . '_client_store',['id'=> Request::segment(3)])}}" method="POST">
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

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	<form action="{{route($usertype . '_client_update_water')}}" method="POST">
    		@csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Client Water Consumption</h4>
      </div>
      <div class="modal-body">
        
        	<div class="form-group">
        		<label>Current Water Cosumption</label>
        		<input type="number" name="water_consumption" class="form-control" id="waterConsumption">
        		<input type="text" name="bill_id" id="bill_id" class="bill_id" hidden="">
        	</div>
        
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>	
@endsection

@section('scripts')
<script>
	var token = '{{Session::token()}}';
	var url = '{{route($usertype . '_get_client_info')}}';
	$(document).ready(function(){
		$(".biller_edit").click(function(){
			var biller_id = $(this).val();
			console.log(biller_id); 
			$(".bill_id").val(biller_id);
			$.ajax({
				method: 'POST',
				data: {biller_id: biller_id, _token: token},
				url: url,
				success: function(data){
					console.log(data.water_consumption);
					$("#waterConsumption").val(data.water_consumption);
				}
			});
		});
	});
</script>
@endsection