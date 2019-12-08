@extends('admin.template')

@section('styles')

@endsection

@section('contents')
	<h1 class="text-center">Water Rates</h1>
	<div class="row">
		
		<div class="col-md-6 col-md-offset-3">
			<!-- <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">New Rate</button> -->
			
			@include('shared.notif')
			<table class="table">
				<thead>
					<th>From</th>
					<th>To</th>
					<th>Rate</th>
					<th>Updated</th>
				</thead>
				<tbody>
					@if($new_rates->count() > 0)

						@foreach($new_rates as $rate)
						<tr>
							<td>{{$rate->from}} <strong style="color: red">(cu.m)</strong></td>
							<td>{{$rate->to}}<strong style="color: red">(cu.m)</strong></td>
							<td>{{$rate->summary_rate($rate->id)->price}}</td>
							<td>{{$rate->updated_at->toDayDateTimeString()}}</td>
						</tr>
					@endforeach

					@endif
				</tbody>
			</table>
		</div>
		
	</div>
@endsection
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  	<form action="{{route('admin_water_store')}}" method="POST">
  		@csrf
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Billing Rate</h4>
      </div>
      <div class="modal-body">
       
        	<div class="form-group">
        		<input type="number" name="rates" class="form-control" >
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
@section('scripts')

@endsection