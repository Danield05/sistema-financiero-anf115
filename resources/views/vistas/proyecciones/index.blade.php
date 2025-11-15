@extends('layouts.app')

@section('title')
Proyecciones Financieras
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-chart-line text-primary"></i> Proyecciones Financieras
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">

                            @include('notificador_validacion')

                            @if(count($proyecciones) > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Año</th>
                                                <th>Ventas Proyectadas</th>
                                                <th>Activos Proyectados</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proyecciones as $proyeccion)
                                                <tr>
                                                    <td>{{ $proyeccion['anio'] }}</td>
                                                    <td>${{ number_format($proyeccion['ventas_proyectadas'], 2) }}</td>
                                                    <td>${{ number_format($proyeccion['activos_proyectados'], 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info" role="alert">
                                    <i class="fas fa-info-circle"></i> No hay suficientes datos históricos para generar proyecciones. Necesitas al menos 2 períodos con balances y estados de resultados.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection