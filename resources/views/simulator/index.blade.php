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
                                <h4 class="widget-title">Simulador</h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <form method="POST" action="{{url('summary')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="amount">Monto:</label>
                                        <input type="number" step="any" min="1" name="amount" class="form-control amount-input" id="amount" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="utility">Utilidad:</label>
                                        <select name="utility" class="form-control" id="utility">
                                        <option value="0.0">0%</option>
                                        <option value="0.0">0%</option>
                                            <option value="0.05">5%</option>
                                            <option value="0.1">10%</option>
                                            <option value="0.15">15%</option>
                                            <option value="0.2" selected >20%</option>
                                            <option value="0.25">25%</option>
                                            <option value="0.30">30%</option>
                                            <option value="0.35">35%</option>
                                            <option value="0.40">40%</option>
                                            <option value="0.45">45%</option>
                                            <option value="0.50">50%</option>
                                            <option value="0.55">55%</option>
                                            <option value="0.60">60%</option>
                                            <option value="0.65">65%</option>
                                            <option value="0.70">70%</option>
                                            <option value="0.75">75%</option>
                                            <option value="0.80">80%</option>
                                            <option value="0.85">85%</option>
                                            <option value="0.90">90%</option>
                                            <option value="0.95">95%</option>
                                            <option value="1.0">100%</option>
                                            <option value="1.05">105%</option>
                                            <option value="1.10">110%</option>
                                            <option value="1.15">115%</option>
                                            <option value="1.20">120%</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_number">Cuotas:</label>
                                        <input type="number" step="any" min="1" name="payment_number" class="form-control amount-input" id="payment_number" required>
                                    </div>
                                    <div class="form-group text-center total-box hidden">
                                        <h4>Total + Utilidad</h4>
                                        <h2 id="total_show"></h2>
                                        <h4>Cuota</h4>
                                        <h2 id="quote"></h2>
                                    </div>
                                </form>

                            </div><!-- .widget-body -->
                        </div><!-- .widget -->
                    </div><!-- END column -->
                </div><!-- .row -->
            </section>
        </div>
    </main>
@endsection
