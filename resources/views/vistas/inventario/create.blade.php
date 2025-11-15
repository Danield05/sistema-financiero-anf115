@extends('layouts.app')

@section('title')
Agregar Inventario
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-plus-circle text-primary"></i> Agregar Inventario
                            </h4>
                        </div>
                        <div class="card-body">

                            @include('notificador_validacion')

                            {!! Form::open(['route' => 'inventario.store', 'method' => 'POST']) !!}

                            <!-- Formulario para crear nuevo contenedor de inventario -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('producto', 'Nombre del Inventario') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                                            </div>
                                            {!! Form::text('producto', null, [
                                                'class' => 'form-control',
                                                'placeholder' => 'Nombre del inventario',
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
                                            ], $metodo ?? null, [
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Campos para contenedor -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            {!! Form::date('fecha_inicio', null, [
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('fecha_fin', 'Fecha de Fin') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                                            </div>
                                            {!! Form::date('fecha_fin', null, [
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Guardar Inventario
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