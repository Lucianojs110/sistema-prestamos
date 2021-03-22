@extends('layouts.app')

@section('content')
    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12 col-lg-8 col-lg-offset-2">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="widget-title">Estadistica cartera: {{$wallet->name}}</h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                            <canvas id="myChart" width="200" height="100"></canvas>
                                <br><br>
                                <form method="POST" action="{{url('history')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                   
                                
                                   
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="sell">Ventas:</label>
                                            <input type="text" name="sell" id="ventas" readonly value="{{$credit}}" class="form-control" id="sell" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                             <label for="sell">Total a recaudar:</label>
                                            <input type="text" name="sell" id="a_recaudar" readonly value="{{$total_utility}}" class="form-control" id="sell" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="average">Recaudado:</label>
                                            <input type="text" name="average" id="recaudado" value="{{$summary}}" readonly class="form-control" id="average" required>
                                        </div>
                                       
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-4">
                                        <label for="average">Falta Recaudar:</label>
                                            <input type="text" name="average" id="falta_recaudar" value="{{$falta_recaudar}}" readonly class="form-control" id="average" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="sell">Gastos:</label>
                                        <input type="text" name="sell" id="gastos" readonly value="{{$bills}}" class="form-control" id="sell" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="days">Cantidad días:</label>
                                        <input type="text" name="days" value="{{$days}}" readonly class="form-control" id="days" required>
                                        </div>
                                       
                                    </div>

                                        <input name="days" id="dias" value="{{$range}}" readonly class="form-control" id="days" type="hidden">
                                   
                                </form>

                            </div><!-- .widget-body -->
                        </div><!-- .widget -->
                    </div><!-- END column -->
                </div><!-- .row -->
            </section>
        </div>
    </main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>


<script>

recaudado =  $("#recaudado").val();
ventas =  $("#ventas").val();
a_recaudar =  $("#a_recaudar").val();
falta_recaudar =  $("#falta_recaudar").val();
gastos =  $("#gastos").val();
dias =  $("#dias").val();
     
  


var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Ventas', 'Total a Recaudar', 'Recaudado', 'Falta recaudar', 'Gastos'],
        datasets: [{
            label: dias,
            data: [ventas, a_recaudar, recaudado, falta_recaudar , gastos],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
               
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
               
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

@endsection


