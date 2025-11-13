@extends('layouts.app')

@section('title')
Generar Planilla de Sueldo
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-plus-circle text-primary"></i> Generar Nueva Planilla
                            </h4>
                        </div>
                        <div class="card-body">

                            @include('notificador_validacion')

                            {!! Form::open(['route' => 'planillas.store', 'method' => 'POST']) !!}

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('empleado_id', 'Empleado') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            {!! Form::select('empleado_id', $empleados->pluck('nombre', 'id'), null, [
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('fecha_inicio', 'Desde') !!}
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
                                        {!! Form::label('fecha_fin', 'Hasta') !!}
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
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('dias_laborados', 'Días Laborados') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                            </div>
                                            {!! Form::number('dias_laborados', null, [
                                                'class' => 'form-control',
                                                'min' => '0',
                                                'max' => '31',
                                                'required' => 'required'
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('dias_faltados_con_permiso', 'Días Faltados con Permiso') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>
                                            {!! Form::number('dias_faltados_con_permiso', null, [
                                                'class' => 'form-control',
                                                'min' => '0',
                                                'max' => '31',
                                                'value' => '0'
                                            ]) !!}
                                        </div>
                                        <small class="form-text text-muted">No se descuenta</small>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('dias_faltados_sin_permiso', 'Días Faltados sin Permiso') !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-times"></i></span>
                                            </div>
                                            {!! Form::number('dias_faltados_sin_permiso', null, [
                                                'class' => 'form-control',
                                                'min' => '0',
                                                'max' => '31',
                                                'value' => '0'
                                            ]) !!}
                                        </div>
                                        <small class="form-text text-muted">Se descuenta del salario</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Generar Planilla
                                    </button>
                                    <a href="{{ route('planillas.index') }}" class="btn btn-secondary ml-2">
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