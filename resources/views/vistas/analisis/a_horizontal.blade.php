@extends('layouts.app')

@section('title')
Análisis Horizontal - Resultados
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-chart-line text-primary"></i> Resultados del Análisis Horizontal
                            </h4>
                            <div class="card-header-action">
                                <a href="{{ route('horizontal.index') }}" class="btn btn-primary">
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
                                    Comparación entre el período <strong>{{$periodo1_nombre}}</strong> (base)
                                    y el período <strong>{{$periodo2_nombre}}</strong> (comparación)
                                </p>
                            </div>

                            <!-- Navegación entre análisis -->
                            <div class="d-flex justify-content-center mb-4">
                                <div class="btn-group" role="group">
                                    <a href="{{route('horizontal.index')}}" class="btn btn-primary active">
                                        <i class="fas fa-chart-line"></i> Análisis Horizontal
                                    </a>
                                    <a href="{{route('vertical.index')}}" class="btn btn-success">
                                        <i class="fas fa-chart-bar"></i> Análisis Vertical
                                    </a>
                                </div>
                            </div>

                            <!-- Estadísticas resumen -->
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="card border-primary">
                                        <div class="card-body text-center">
                                            <h6 class="text-primary">Total Cuentas Analizadas</h6>
                                            <h3 class="text-primary">{{ count($cuenta_supreme) }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-success">
                                        <div class="card-body text-center">
                                            <h6 class="text-success">Cuentas con Aumento</h6>
                                            <h3 class="text-success">{{ collect($cuenta_supreme)->where('absoluta', '>', 0)->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-danger">
                                        <div class="card-body text-center">
                                            <h6 class="text-danger">Cuentas con Disminución</h6>
                                            <h3 class="text-danger">{{ collect($cuenta_supreme)->where('absoluta', '<', 0)->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-warning">
                                        <div class="card-body text-center">
                                            <h6 class="text-warning">Cuentas Sin Cambio</h6>
                                            <h3 class="text-warning">{{ collect($cuenta_supreme)->where('absoluta', '=', 0)->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped" id="analisis-horizontal-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th><i class="fas fa-tag"></i> Cuenta</th>
                                            <th class="text-center">
                                                <i class="fas fa-calendar-check"></i> {{$periodo1_nombre}}
                                                <br><small>(Base)</small>
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-calendar-plus"></i> {{$periodo2_nombre}}
                                                <br><small>(Comparación)</small>
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-plus-minus"></i> Variación Absoluta
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-percentage"></i> Variación Relativa
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-chart-line"></i> Tendencia
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuenta_supreme as $cuenta)
                                            <tr>
                                                <td>
                                                    <strong style="color: black;">{{$cuenta['cuenta']}}</strong>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-light">${{ number_format($cuenta['cuenta1'], 2) }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-light">${{ number_format($cuenta['cuenta2'], 2) }}</span>
                                                </td>
                                                <td class="text-center">
                                                    @if($cuenta['absoluta'] > 0)
                                                        <span class="badge badge-success">${{ number_format($cuenta['absoluta'], 2) }}</span>
                                                    @elseif($cuenta['absoluta'] < 0)
                                                        <span class="badge badge-danger">${{ number_format($cuenta['absoluta'], 2) }}</span>
                                                    @else
                                                        <span class="badge badge-secondary">${{ number_format($cuenta['absoluta'], 2) }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($cuenta['relativa'] === 'N/A')
                                                        <span class="badge badge-warning">N/A</span>
                                                    @elseif($cuenta['relativa'] > 0)
                                                        <span class="badge badge-success">{{ number_format($cuenta['relativa'], 2) }}%</span>
                                                    @elseif($cuenta['relativa'] < 0)
                                                        <span class="badge badge-danger">{{ number_format($cuenta['relativa'], 2) }}%</span>
                                                    @else
                                                        <span class="badge badge-secondary">{{ number_format($cuenta['relativa'], 2) }}%</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($cuenta['absoluta'] > 0)
                                                        <i class="fas fa-arrow-up text-success" title="Aumento"></i>
                                                    @elseif($cuenta['absoluta'] < 0)
                                                        <i class="fas fa-arrow-down text-danger" title="Disminución"></i>
                                                    @else
                                                        <i class="fas fa-minus text-secondary" title="Sin cambio"></i>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Botones de acción -->
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <a href="{{ route('horizontal.index') }}" class="btn btn-secondary">
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
        $('#analisis-horizontal-table').DataTable({
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
            "pageLength": 15,
            "responsive": true,
            "order": [[3, 'desc']], // Ordenar por variación absoluta
            "columnDefs": [
                { "orderable": false, "targets": 5 } // No ordenar columna de tendencia
            ]
        });
    });
</script>
@endsection