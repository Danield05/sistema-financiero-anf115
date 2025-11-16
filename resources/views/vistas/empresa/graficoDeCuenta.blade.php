@extends('layouts.app')

@section('title')
Gráficos de cuentas
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-chart-bar text-primary"></i> Gráfico de Cuenta: {{$cuenta->nombre}}
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">
                            @include('notificador_validacion')

                            @if($sinRegistros==True)
                                <div class="alert alert-info" role="alert">
                                    <i class="fas fa-info-circle"></i> No hay datos para gráficar de la cuenta <strong style="color: black;">{{$cuenta->nombre}}</strong>.
                                </div>
                            @else
                                <div id="container"></div>

                                <script src="https://code.highcharts.com/highcharts.js"></script>
                                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                                <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                                <script>
                                    Highcharts.chart('container', {

                                title: {
                                    text: 'Gráfico de cuenta <?= $cuenta->nombre ?>'
                                },

                                subtitle: {
                                    text: ''
                                },

                                yAxis: {
                                    title: {
                                        text: 'Monto'
                                    }
                                },

                                xAxis: {
                                    accessibility: {
                                        rangeDescription: ''
                                    }
                                },

                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },

                                plotOptions: {
                                    series: {
                                        label: {
                                            connectorAllowed: false
                                        },
                                        pointStart: <?= $periodoInicial->anio ?>
                                    }
                                },

                                series: [{
                                    name: '<?= $cuenta->nombre ?>',
                                    data: <?= $puntos ?>
                                }
                                ],

                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                                });
                                </script>
                            @endif

                            <div class="d-flex justify-content-center flex-wrap mt-3">
                                <div class="mx-2 mb-2">
                                    <a href="{{ route('catalogo.index') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-list"></i> Catálogo de Cuentas
                                    </a>
                                </div>
                                <div class="mx-2 mb-2">
                                    <a href="{{route('vinculacion.index')}}" class="btn btn-success btn-sm">
                                        <i class="fas fa-link"></i> Relacionar Cuentas
                                    </a>
                                </div>
                                <div class="mx-2 mb-2">
                                    <a href="{{ route('graficos.index') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-chart-bar"></i> Gráficas
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection