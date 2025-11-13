@extends('layouts.app')

@section('title')
Crear Presupuesto
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-plus-circle text-primary"></i> Crear Nuevo Presupuesto
                            </h4>
                        </div>
                        <div class="card-body">

                            @include('notificador_validacion')

                            {!! Form::open(['route' => 'presupuestos.store', 'method' => 'POST']) !!}

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('tipo', 'Tipo de Presupuesto') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                            </div>
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
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('periodo_id', 'Período') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            {!! Form::select('periodo_id', $periodos->pluck('anio', 'id'), null, [
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('descripcion', 'Descripción') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            </div>
                                            {!! Form::textarea('descripcion', null, [
                                                'class' => 'form-control',
                                                'rows' => 3,
                                                'placeholder' => 'Descripción del presupuesto',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('monto_presupuestado', 'Monto Presupuestado') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            </div>
                                            {!! Form::number('monto_presupuestado', null, [
                                                'class' => 'form-control',
                                                'min' => '0',
                                                'step' => '0.01',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                        <i class="fas fa-save"></i> Crear Presupuesto
                                    </button>
                                    <a href="{{ route('presupuestos.index') }}" class="btn btn-secondary ml-2">
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