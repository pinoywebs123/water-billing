@extends('admin.template')

@section('styles')

@endsection

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="date" id="filter_income_from" class="form-control">
                        </div>
                        <div class="col-md-4">
                                <input type="date" id="filter_income_to" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <button id="filter_income" class="btn btn-primary">Filter income</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="date" id="filter_cons_from" class="form-control">
                        </div>
                        <div class="col-md-4">
                                <input type="date" id="filter_cons_to" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <button id="filter_consumption" class="btn btn-primary">Filter consumption</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><hr style="border-color: #333">
    <h1 class="text-center">Services handled Reports</h1>

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
                      
    
                </tr>
              @endforeach
            </tbody>
            
            
        </table>
	
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    
    $( document ).ready(function() {
        firstChart();
        secondChart();
    });

    $('#filter_income').click(function() {
        var from = $('#filter_income_from').val();
        var to = $('#filter_income_to').val();

        $.ajax({
            method: 'GET', // Type of response and matches what we said in the route
            url: '{{ route("admin_filter_income_chart") }}', // This is the url we gave in the route
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

    $('#filter_consumption').click(function() {
        var from = $('#filter_cons_from').val();
        var to = $('#filter_cons_to').val();

        $.ajax({
            method: 'GET', // Type of response and matches what we said in the route
            url: '{{ route("admin_filter_consumption_chart") }}', // This is the url we gave in the route
            data: {'from' : from, 'to' : to}, // a JSON object to send back
            success: function(response){ // What to do if we succeed
                console.log(response);
                var chart = new Chart(ctx2, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: //['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            response[0]
                        ,
                        datasets: [{
                            label: 'Water Consumptions Chart',
                            
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

    function firstChart(month, income) {

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

    }

    function secondChart() {
        var chart = new Chart(ctx2, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: //['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                [
                    <?php
                    
                    $count = 1;
                    foreach($consumption as $month) {
                        $month = $month->month;
                        $temp = DateTime::createFromFormat('!m', $month);
                        $month = $temp->format('F');
                        
                        echo "'$month'"; 
                        
                        if ($count < count($consumption))
                            echo ", ";
                            
                        $count++;
                        
                    }
                    
                    ?>
                ],
                datasets: [{
                    label: 'Water Consumptions Chart',
                    
                    borderColor: 'rgb(255, 99, 132)',
                    data: //[0, 10, 5, 2, 20, 22, 10]
                        [
                            <?php
                        
                        $count = 1;
                        foreach($consumption as $water_cons) {
                            echo $water_cons->monthly_ws; 
                            
                            if ($count < count($consumption))
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
    }
</script>
@endsection