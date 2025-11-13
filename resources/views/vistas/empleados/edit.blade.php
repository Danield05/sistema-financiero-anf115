@extends('layouts.app')

@section('title')
Editar Empleado
@endsection

@section('content')
<section class="section" style="margin-top: 20px;">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-edit text-primary"></i> Editar Empleado
                        </h4>
                    </div>
                    <div class="card-body">

                        @include('notificador_validacion')

                        {!! Form::model($empleado, ['route' => ['empleados.update', $empleado->id], 'method' => 'PUT']) !!}

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('nombre', 'Nombre') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        {!! Form::text('nombre', null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Nombre del empleado',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('apellido', 'Apellido') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        {!! Form::text('apellido', null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Apellido del empleado',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('dui', 'DUI') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        {!! Form::text('dui', null, [
                                            'class' => 'form-control',
                                            'placeholder' => '00000000-0',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('nit', 'NIT') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                        </div>
                                        {!! Form::text('nit', null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Número de NIT (opcional)'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                        </div>
                                        {!! Form::date('fecha_nacimiento', null, [
                                            'class' => 'form-control',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('fecha_contratacion', 'Fecha de Contratación') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                                        </div>
                                        {!! Form::date('fecha_contratacion', null, [
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
                                    {!! Form::label('salario_base', 'Salario Base') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        {!! Form::number('salario_base', null, [
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
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Actualizar Empleado
                                </button>
                                <a href="{{ route('empleados.index') }}" class="btn btn-secondary ml-2">
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