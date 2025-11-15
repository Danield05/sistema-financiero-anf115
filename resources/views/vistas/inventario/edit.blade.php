@extends('layouts.app')

@section('title')
Editar Producto del Inventario
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-edit text-primary"></i> Gestionar Movimientos de Inventario
                            </h4>
                        </div>
                        <div class="card-body">

                            @include('notificador_validacion')

                            <!-- Historial de Movimientos -->
                            <div class="mb-4">
                                <h5 class="text-primary"><i class="fas fa-history"></i> Historial de Movimientos - {{ $inventario->producto }}</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" style="color: black;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Tipo Movimiento</th>
                                                <th>Cantidad</th>
                                                <th>Costo Unitario</th>
                                                <th>Valor Total</th>
                                                <th>Método</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($movimientos as $movimiento)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($movimiento->fecha)->format('d/m/Y') }}</td>
                                                    <td>
                                                        @if ($movimiento->tipo_movimiento == 'entrada')
                                                            <span class="badge badge-success"><i class="fas fa-plus"></i> Entrada</span>
                                                        @else
                                                            <span class="badge badge-danger"><i class="fas fa-minus"></i> Salida</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $movimiento->cantidad ?? 'N/A' }}</td>
                                                    <td>${{ $movimiento->costo_unitario ? number_format($movimiento->costo_unitario, 2) : '0.00' }}</td>
                                                    <td>${{ $movimiento->cantidad && $movimiento->costo_unitario ? number_format($movimiento->cantidad * $movimiento->costo_unitario, 2) : '0.00' }}</td>
                                                    <td>
                                                        @if ($movimiento->metodo == 'PEPS')
                                                            <span class="badge badge-primary">PEPS</span>
                                                        @elseif($movimiento->metodo == 'UEPS')
                                                            <span class="badge badge-success">UEPS</span>
                                                        @else
                                                            <span class="badge badge-info">Costo Promedio</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr>

                            <h5 class="text-primary"><i class="fas fa-edit"></i> Editar Movimiento</h5>

                            {!! Form::model($inventario, ['route' => ['inventario.update', $inventario->id], 'method' => 'PUT']) !!}

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('producto', 'Producto') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                                            </div>
                                            {!! Form::text('producto', null, [
                                                'class' => 'form-control',
                                                'placeholder' => 'Nombre del producto',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('cantidad', 'Cantidad') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            </div>
                                            {!! Form::number('cantidad', null, [
                                                'class' => 'form-control',
                                                'min' => '1',
                                                'step' => '1',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('costo_unitario', 'Costo Unitario') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            </div>
                                            {!! Form::number('costo_unitario', null, [
                                                'class' => 'form-control',
                                                'min' => '0',
                                                'step' => '0.01',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('tipo_movimiento', 'Tipo de Movimiento') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
                                            </div>
                                            {!! Form::select('tipo_movimiento', [
                                                'entrada' => 'Entrada (Agregar al Inventario)',
                                                'salida' => 'Salida (Quitar del Inventario)'
                                            ], null, [
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('metodo', 'Método de Valuación') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                            </div>
                                            {!! Form::select('metodo', [
                                                'PEPS' => 'PEPS (Primero en Entrar, Primero en Salir)',
                                                'UEPS' => 'UEPS (Último en Entrar, Primero en Salir)',
                                                'costo_promedio' => 'Costo Promedio'
                                            ], null, [
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('fecha', 'Fecha') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            {!! Form::date('fecha', null, [
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="total_cost">Costo Total Estimado</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calculator"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="total_cost" readonly value="$0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Actualizar Movimiento
                                            </button>
                                            <a href="{{ route('inventario.create') }}?metodo={{ $inventario->metodo }}" class="btn btn-success ml-2">
                                                <i class="fas fa-plus"></i> Nuevo Movimiento
                                            </a>
                                        </div>
                                        <a href="{{ route('inventario.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-times"></i> Volver
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {!! Form::close() !!}
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
        function calculateTotal() {
            var cantidad = parseFloat($('#cantidad').val()) || 0;
            var costoUnitario = parseFloat($('#costo_unitario').val()) || 0;
            var total = cantidad * costoUnitario;
            $('#total_cost').val('$' + total.toFixed(2));
        }

        // Calculate initial total on page load
        calculateTotal();

        // Recalculate when inputs change
        $('#cantidad, #costo_unitario').on('input', function() {
            calculateTotal();
        });
    });
</script>
@endsection