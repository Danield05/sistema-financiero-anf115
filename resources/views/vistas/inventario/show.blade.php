@extends('layouts.app')

@section('title')
Detalles del Producto
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-box text-primary"></i> Detalles del Producto
                            </h4>
                            <div class="card-header-action">
                                <a href="{{ route('inventario.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Volver
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Producto:</strong></label>
                                        <p>{{ $inventario->producto }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Cantidad:</strong></label>
                                        <p>{{ $inventario->cantidad }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Costo Unitario:</strong></label>
                                        <p>${{ number_format($inventario->costo_unitario, 2) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Método de Valuación:</strong></label>
                                        <p>
                                            @if ($inventario->metodo == 'PEPS')
                                                <span class="badge badge-primary">PEPS</span>
                                            @elseif($inventario->metodo == 'UEPS')
                                                <span class="badge badge-success">UEPS</span>
                                            @else
                                                <span class="badge badge-info">Costo Promedio</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Fecha:</strong></label>
                                        <p>{{ \Carbon\Carbon::parse($inventario->fecha)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Valor Total:</strong></label>
                                        <p>${{ number_format($inventario->cantidad * $inventario->costo_unitario, 2) }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('inventario.edit', $inventario->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Editar
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