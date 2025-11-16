@extends('layouts.app')

@section('title')
Análisis Vertical - Resultados
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-chart-bar text-primary"></i> Resultados del Análisis Vertical
                            </h4>
                            <div class="card-header-action">
                                <a href="{{ route('vertical.index') }}" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i> Nuevo Análisis
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            @include('notificador_validacion')

                            <!-- Información del análisis realizado -->
                            <div class="alert alert-info">
                                <h6><i class="fas fa-info-circle"></i> Análisis Realizado</h6>
                                <p class="mb-0">
                                    Análisis vertical comparativo entre el período <strong>{{$periodo1}}</strong>
                                    y el período <strong>{{$periodo2}}</strong>
                                </p>
                            </div>

                            <!-- Navegación entre análisis -->
                            <div class="d-flex justify-content-center mb-4">
                                <div class="btn-group" role="group">
                                    <a href="{{route('horizontal.index')}}" class="btn btn-success">
                                        <i class="fas fa-chart-line"></i> Análisis Horizontal
                                    </a>
                                    <a href="{{route('vertical.index')}}" class="btn btn-primary active">
                                        <i class="fas fa-chart-bar"></i> Análisis Vertical
                                    </a>
                                </div>
                            </div>

                            <!-- Estadísticas resumen -->
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                        <div class="card-body text-center">
                                            <h6>Total Activos {{$periodo1}}</h6>
                                            <h3>${{ number_format($totales['activo1'], 2) }}</h3>
                                            <i class="fas fa-coins fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                                        <div class="card-body text-center">
                                            <h6>Total Pasivos {{$periodo1}}</h6>
                                            <h3>${{ number_format($totales['pasivo1'], 2) }}</h3>
                                            <i class="fas fa-credit-card fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                                        <div class="card-body text-center">
                                            <h6>Total Patrimonio {{$periodo1}}</h6>
                                            <h3>${{ number_format($totales['patrimonio1'], 2) }}</h3>
                                            <i class="fas fa-building fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                        <div class="card-body text-center">
                                            <h6>Total Activos {{$periodo2}}</h6>
                                            <h3>${{ number_format($totales['activo2'], 2) }}</h3>
                                            <i class="fas fa-coins fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                                        <div class="card-body text-center">
                                            <h6>Total Pasivos {{$periodo2}}</h6>
                                            <h3>${{ number_format($totales['pasivo2'], 2) }}</h3>
                                            <i class="fas fa-credit-card fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                                        <div class="card-body text-center">
                                            <h6>Total Patrimonio {{$periodo2}}</h6>
                                            <h3>${{ number_format($totales['patrimonio2'], 2) }}</h3>
                                            <i class="fas fa-building fa-2x opacity-75"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped" id="analisis-vertical-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th><i class="fas fa-tag"></i> Cuenta</th>
                                            <th class="text-center">
                                                <i class="fas fa-dollar-sign"></i> {{$periodo1}}
                                                <br><small>(Monto)</small>
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-percentage"></i> % del Total {{$periodo1}}
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-dollar-sign"></i> {{$periodo2}}
                                                <br><small>(Monto)</small>
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-percentage"></i> % del Total {{$periodo2}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="background: linear-gradient(90deg, #667eea 0%, #764ba2 100%); color: white;">
                                            <td colspan="5"><strong><i class="fas fa-coins"></i> ACTIVOS</strong></td>
                                        </tr>
                                        @foreach ($cuenta_supreme as $cuenta)
                                            @if ($cuenta['tipo'] == 1)
                                                <tr>
                                                    <td>
                                                        <strong style="color: black;">{{$cuenta['cuenta']}}</strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-light">${{ number_format($cuenta['cuenta1'], 2) }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if($cuenta['variacion1'] !== 'N/A')
                                                            <span class="badge badge-success">{{ number_format($cuenta['variacion1'], 2) }}%</span>
                                                        @else
                                                            <span class="badge badge-secondary">N/A</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-light">${{ number_format($cuenta['cuenta2'], 2) }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if($cuenta['variacion2'] !== 'N/A')
                                                            <span class="badge badge-success">{{ number_format($cuenta['variacion2'], 2) }}%</span>
                                                        @else
                                                            <span class="badge badge-secondary">N/A</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        <tr class="table-info">
                                            <td><strong>Total Activos</strong></td>
                                            <td class="text-center"><strong>${{ number_format($totales['activo1'], 2) }}</strong></td>
                                            <td class="text-center"><strong>100.00%</strong></td>
                                            <td class="text-center"><strong>${{ number_format($totales['activo2'], 2) }}</strong></td>
                                            <td class="text-center"><strong>100.00%</strong></td>
                                        </tr>

                                        <tr style="background: linear-gradient(90deg, #f093fb 0%, #f5576c 100%); color: white;">
                                            <td colspan="5"><strong><i class="fas fa-credit-card"></i> PASIVOS</strong></td>
                                        </tr>
                                        @foreach ($cuenta_supreme as $cuenta)
                                            @if ($cuenta['tipo'] == 0)
                                                <tr>
                                                    <td>
                                                        <strong style="color: black;">{{$cuenta['cuenta']}}</strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-light">${{ number_format($cuenta['cuenta1'], 2) }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if($cuenta['variacion1'] !== 'N/A')
                                                            <span class="badge badge-info">{{ number_format($cuenta['variacion1'], 2) }}%</span>
                                                        @else
                                                            <span class="badge badge-warning">N/A</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-light">${{ number_format($cuenta['cuenta2'], 2) }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if($cuenta['variacion2'] !== 'N/A')
                                                            <span class="badge badge-info">{{ number_format($cuenta['variacion2'], 2) }}%</span>
                                                        @else
                                                            <span class="badge badge-warning">N/A</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        <tr class="table-info">
                                            <td><strong>Total Pasivos</strong></td>
                                            <td class="text-center"><strong>${{ number_format($totales['pasivo1'], 2) }}</strong></td>
                                            <td class="text-center"><strong>100.00%</strong></td>
                                            <td class="text-center"><strong>${{ number_format($totales['pasivo2'], 2) }}</strong></td>
                                            <td class="text-center"><strong>100.00%</strong></td>
                                        </tr>

                                        <tr style="background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%); color: white;">
                                            <td colspan="5"><strong><i class="fas fa-building"></i> PATRIMONIO</strong></td>
                                        </tr>
                                        @foreach ($cuenta_supreme as $cuenta)
                                            @if ($cuenta['tipo'] == 2)
                                                <tr>
                                                    <td>
                                                        <strong style="color: black;">{{$cuenta['cuenta']}}</strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-light">${{ number_format($cuenta['cuenta1'], 2) }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if($cuenta['variacion1'] !== 'N/A')
                                                            <span class="badge badge-info">{{ number_format($cuenta['variacion1'], 2) }}%</span>
                                                        @else
                                                            <span class="badge badge-warning">N/A</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-light">${{ number_format($cuenta['cuenta2'], 2) }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if($cuenta['variacion2'] !== 'N/A')
                                                            <span class="badge badge-info">{{ number_format($cuenta['variacion2'], 2) }}%</span>
                                                        @else
                                                            <span class="badge badge-warning">N/A</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        <tr class="table-info">
                                            <td><strong>Total Patrimonio</strong></td>
                                            <td class="text-center"><strong>${{ number_format($totales['patrimonio1'], 2) }}</strong></td>
                                            <td class="text-center"><strong>100.00%</strong></td>
                                            <td class="text-center"><strong>${{ number_format($totales['patrimonio2'], 2) }}</strong></td>
                                            <td class="text-center"><strong>100.00%</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Botones de acción -->
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <a href="{{ route('vertical.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Nuevo Análisis
                                    </a>
                                </div>
                                <div class="d-flex">
                                    <button onclick="window.print()" class="btn btn-info mr-2">
                                        <i class="fas fa-print"></i> Imprimir
                                    </button>
                                    <a href="{{ route('periodo.index') }}" class="btn btn-primary">
                                        <i class="fas fa-list"></i> Ver Períodos
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#analisis-vertical-table').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "pageLength": 20,
            "responsive": true,
            "order": [[0, 'asc']], // Ordenar por cuenta
            "columnDefs": [
                { "orderable": false, "targets": [1,2,3,4] } // No ordenar columnas de montos y porcentajes
            ]
        });
    });
</script>
@endsection