@extends('cashier.template')

@section('styles')

@endsection

@section('contents')
	<h1 class="text-center">Income Report Graph</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2">
                <input type="date" id="filter_income_from" class="form-control">
            </div>
            <div class="col-md-2">
                    <input type="date" id="filter_income_to" class="form-control">
            </div>
            <div class="col-md-4">
                <button id="filter_income" class="btn btn-primary">Filter income</button>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <br><br><br><hr style="border-color: #333">
	<h1 class="text-center">List of Unpaid Clients</h1>
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
            labels: //['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            [
                <?php
                
                $count = 1;
                foreach($income as $month) {
                    $month = $month->month;
                    $temp = DateTime::createFromFormat('!m', $month);
                    $month = $temp->format('F');
                    
                    echo "'$month'"; 
                    
                    if ($count < count($income))
                        echo ", ";
                        
                    $count++;
                    
                }
                
                ?>
            ],
            datasets: [{
                label: 'Income Chart',
                
                borderColor: 'rgb(255, 99, 132)',
                data: //[0, 10]
                [
                    <?php
                    
                    $count = 1;
                    foreach($income as $bill) {
                        echo $bill->monthly_bill; 
                        
                        if ($count < count($income))
                            echo ", ";

                        $count++;
                        
                    }
                    
                    ?>
                ]
            }]
        },

        // Configuration options go here
        options: {}
    });

    $('#filter_income').click(function() {
        var from = $('#filter_income_from').val();
        var to = $('#filter_income_to').val();

        $.ajax({
            method: 'GET', // Type of response and matches what we said in the route
            url: '{{ route("cashier_filter_income_chart") }}', // This is the url we gave in the route
            data: {'from' : from, 'to' : to}, // a JSON object to send back
            success: function(response){ // What to do if we succeed
                console.log(response);
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: //['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            response[0]
                        ,
                        datasets: [{
                            label: 'Income Chart',
                            
                            borderColor: 'rgb(255, 99, 132)',
                            data: //[0, 10]
                                response[1]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });

            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
        
    });
</script>
@endsection