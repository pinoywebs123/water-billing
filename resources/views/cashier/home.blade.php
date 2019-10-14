@extends('cashier.template')

@section('styles')

@endsection

@section('contents')
	<h1 class="text-center">Income Report Graph</h1>
	<canvas id="myChart"></canvas>
	<h1 class="text-center">List of unpad clients</h1>
	<table id="example" class="display" style="width:100%">
    @include('shared.notif')
        <thead>
            <tr>
              	<th>Account ID</th>
            	<th>Customer</th>
                <th>Water Consumpton (cum)</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Bill</th>
                <th>Payment Status</th>
                <th>Date Created</th>
                
                
            </tr>
        </thead>
        <tbody>
          @foreach($unpaid as $un)
            <tr>
                <td>{{$un->user->account_id}}</td>
            	<td>{{$un->user->email}}</td>
              	<td>{{$un->water_consumption}}</td>
              	<td>{{$un->start_date}}</td>
              	<td>{{$un->end_date}}</td>
              	<td>{{$un->bill}}</td>
              	<td style="color: red">Pending</td>
              	<td>{{$un->created_at->toDayDateTimeString()}}</td>
              	

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

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Water Billing',
            
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
@endsection