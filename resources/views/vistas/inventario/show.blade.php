@extends('layouts.app')

@section('title')
Detalles del Inventario: {{ $inventario->producto }}
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-box-open text-primary"></i> Detalles del Inventario: {{ $inventario->producto }}
                            </h4>
                            <div class="card-header-action">
                                <a href="{{ route('inventario.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Volver
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            @include('notificador_validacion')

                            <!-- Información del Inventario -->
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="card border-primary">
                                        <div class="card-body text-center">
                                            <h6 class="text-primary">Método</h6>
                                            @if ($inventario->metodo == 'PEPS')
                                                <span class="badge badge-primary badge-lg">PEPS</span>
                                            @elseif($inventario->metodo == 'UEPS')
                                                <span class="badge badge-success badge-lg">UEPS</span>
                                            @else
                                                <span class="badge badge-info badge-lg">Costo Promedio</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-success">
                                        <div class="card-body text-center">
                                            <h6 class="text-success">Fecha Inicio</h6>
                                            <strong>{{ $inventario->fecha_inicio ? \Carbon\Carbon::parse($inventario->fecha_inicio)->format('d/m/Y') : 'N/A' }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-warning">
                                        <div class="card-body text-center">
                                            <h6 class="text-warning">Fecha Fin</h6>
                                            <strong>{{ $inventario->fecha_fin ? \Carbon\Carbon::parse($inventario->fecha_fin)->format('d/m/Y') : 'N/A' }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-info">
                                        <div class="card-body text-center">
                                            <h6 class="text-info">Valor Total</h6>
                                            <strong class="text-info">${{ number_format($inventario->valor_total ?? 0, 2) }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
