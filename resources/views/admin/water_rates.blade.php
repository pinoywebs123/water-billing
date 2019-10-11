@extends('admin.template')

@section('styles')

@endsection

@section('contents')
	<h1 class="text-center">Water Rates</h1>
	<div class="row">
		
		<div class="col-md-6">
			<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">New Rate</button>
			<h3>Previous Rates</h3>
			@include('shared.notif')
			<table class="table">
				<thead>
					<th>Rate</th>
					<th>Date</th>
				</thead>
				<tbody>
					@if($rates->count() > 0)

						@foreach($rates as $rate)
						<tr>
							<td><strong>P</strong>{{$rate->rates}} <strong style="color: red">(cu.m)</strong></td>
							<td>{{$rate->created_at->diffForHumans()}}</td>
						</tr>
					@endforeach

					@endif
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			
			<h3>Current Rates: P @if( !is_null($current) ) {{$current->rates}} @else 0 @endif <strong style="color: red">(cu.m)</h3>
			
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