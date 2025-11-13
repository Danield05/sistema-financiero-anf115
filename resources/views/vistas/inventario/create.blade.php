@extends('layouts.app')

@section('title')
Agregar Producto al Inventario
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-plus-circle text-primary"></i> Agregar Nuevo Producto
                            </h4>
                        </div>
                        <div class="card-body">

                            @include('notificador_validacion')

                            {!! Form::open(['route' => 'inventario.store', 'method' => 'POST']) !!}

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
                                <div class="col-xs-12 col-sm-12 col-md-6">
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

                                <div class="col-xs-12 col-sm-12 col-md-6">
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
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Guardar Producto
                                    </button>
                                    <a href="{{ route('inventario.index') }}" class="btn btn-secondary ml-2">
                                        <i class="fas fa-times"></i> Cancelar
                                    </a>
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

        $('#cantidad, #costo_unitario').on('input', function() {
            calculateTotal();
        });
    });
</script>
@endsection