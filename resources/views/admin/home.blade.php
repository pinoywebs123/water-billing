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
    <div class="row">
        <div class="col-md-6">
            <button id="try" class="btn btn-primary">Try</button>
        </div>
        <div class="col-md-6">
            <button id="try2" class="btn btn-primary">Try</button>
        </div>
    </div>
	
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

    $('#try').click(function() {
        firstChart();
    });

    $('#try2').click(function() {
        secondChart();
    });

    function firstChart() {
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
                    label: 'Water Consumptions',
                    
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