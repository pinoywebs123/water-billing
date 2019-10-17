@extends('admin.template')

@section('styles')

@endsection

@section('contents')
    <div class="row">
        <div class="col-md-6">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="myChart2"></canvas>
        </div>
    </div>
	
@endsection

@section('scripts')
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
            label: 'Income Chart',
            
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 10]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>

<script type="text/javascript">
	var ctx = document.getElementById('myChart2').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Water Consumptions',
            
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 22, 10]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
@endsection