@extends('layouts.app')

@section('title')
Editar Presupuesto
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Presupuesto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @include('notificador_validacion')

                            {!! Form::model($presupuesto, ['route' => ['presupuestos.update', $presupuesto->id], 'method' => 'PUT']) !!}

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('tipo', 'Tipo de Presupuesto') !!}
                                        {!! Form::select('tipo', [
                                            'general' => 'General',
                                            'ventas' => 'Ventas',
                                            'produccion' => 'Producción',
                                            'maestro' => 'Maestro'
                                        ], null, [
                                            'class' => 'form-control',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('periodo_id', 'Período') !!}
                                        {!! Form::select('periodo_id', $periodos->pluck('anio', 'id'), null, [
                                            'class' => 'form-control',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('descripcion', 'Descripción') !!}
                                        {!! Form::textarea('descripcion', null, [
                                            'class' => 'form-control',
                                            'rows' => 3,
                                            'placeholder' => 'Descripción del presupuesto',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('monto_presupuestado', 'Monto Presupuestado') !!}
                                        {!! Form::number('monto_presupuestado', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
                                        {!! Form::date('fecha_inicio', null, [
                                            'class' => 'form-control',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('fecha_fin', 'Fecha de Fin') !!}
                                        {!! Form::date('fecha_fin', null, [
                                            'class' => 'form-control',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    {!! Form::submit('Actualizar Presupuesto', [
                                        'class' => 'btn btn-primary'
                                    ]) !!}
                                    <a href="{{ route('presupuestos.index') }}" class="btn btn-secondary">Cancelar</a>
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