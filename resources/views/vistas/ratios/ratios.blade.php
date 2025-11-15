@extends('layouts.app')

@section('title')
Ratios
@endsection



@section('content')
    <section class="section" style="margin-top: 20px">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-chart-pie text-primary"></i> Ratios Financieros - {{\Illuminate\Support\Facades\Auth::user()->empresa->nombre}}
                            </h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h5 class="text-primary"><i class="fas fa-balance-scale"></i> Razones Financieras</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped" style="color: black;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Año</th>
                                                    <th>Razón Circulante</th>
                                                    <th>Prueba Ácida</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($razones_financieras as $razon)
                                                <tr>
                                                    <td><strong>{{$razon['anio']}}</strong></td>
                                                    <td>{{$razon['razon_circulante']}}</td>
                                                    <td>{{$razon['prueba_acida']}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <h5 class="text-success mt-4"><i class="fas fa-cogs"></i> Razones de Eficiencia</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped" style="color: black;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Año</th>
                                                    <th>Rotación de Inventario</th>
                                                    <th>Cuentas por Cobrar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($razones_eficiencia as $razon)
                                                <tr>
                                                    <td><strong style="color: black !important;">{{$razon['anio']}}</strong></td>
                                                    <td>{{$razon['rotacion_inventario']}}</td>
                                                    <td>{{$razon['rotacion_cuentas_por_cobrar']}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <h5 class="text-warning"><i class="fas fa-credit-card"></i> Razones de Endeudamiento</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped" style="color: black !important;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Año</th>
                                                    <th>Grado de Endeudamiento</th>
                                                    <th>Razón Endeudamiento Patrimonial</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($razones_endeudamiento as $razon)
                                                <tr>
                                                    <td><strong>{{$razon['anio']}}</strong></td>
                                                    <td>{{$razon['grado_endeudamiento']}}</td>
                                                    <td>{{$razon['razon_endeudamiento_patrimonial']}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <h5 class="text-danger mt-4"><i class="fas fa-dollar-sign"></i> Razones de Rentabilidad</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped" style="color: black;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Año</th>
                                                    <th>Rentabilidad Neta del Patrimonio</th>
                                                    <th>Rentabilidad del Activo</th>
                                                    <th>Rentabilidad sobre Ventas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($razones_rentabilidad as $razon)
                                                <tr>
                                                    <td><strong>{{$razon['anio']}}</strong></td>
                                                    <td>{{$razon['rentabilidad_neta_del_patrimonio']}}</td>
                                                    <td>{{$razon['rentabilidad_del_activos']}}</td>
                                                    <td>{{$razon['rentabilidad_sobre_ventas']}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center flex-wrap mt-4">
                                <a href="{{route('ratios.comparacion')}}" class="btn btn-info btn-sm mx-2">
                                    <i class="fas fa-balance-scale"></i> Comparación de Ratios
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection