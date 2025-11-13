@extends('layouts.app')

@section('title')
Agregar Producto al Inventario
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Agregar Producto al Inventario</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @include('notificador_validacion')

                            {!! Form::open(['route' => 'inventario.store', 'method' => 'POST']) !!}

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('producto', 'Producto') !!}
                                        {!! Form::text('producto', null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Nombre del producto',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('cantidad', 'Cantidad') !!}
                                        {!! Form::number('cantidad', null, [
                                            'class' => 'form-control',
                                            'min' => '1',
                                            'step' => '1',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('costo_unitario', 'Costo Unitario') !!}
                                        {!! Form::number('costo_unitario', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('metodo', 'Método de Valuación') !!}
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

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('fecha', 'Fecha') !!}
                                        {!! Form::date('fecha', null, [
                                            'class' => 'form-control',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    {!! Form::submit('Guardar Producto', [
                                        'class' => 'btn btn-primary'
                                    ]) !!}
                                    <a href="{{ route('inventario.index') }}" class="btn btn-secondary">Cancelar</a>
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