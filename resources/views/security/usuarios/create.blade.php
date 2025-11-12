@extends('layouts.app')

@section('title')
Crear usuario
@endsection


@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-user-plus text-primary"></i> Crear Nuevo Usuario
                            </h4>
                        </div>
                        <div class="card-body">
                            @include('notificador_validacion')

                            {!! Form::open(array('route'=>'usuarios.store', 'method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            <i class="fas fa-user"></i> Nombre Completo
                                        </label>
                                        {!! Form::text('name', null, [
                                            'class'=>'form-control',
                                            'placeholder'=>'Ingrese el nombre completo',
                                            'required'=>'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="fas fa-envelope"></i> Correo Electrónico
                                        </label>
                                        {!! Form::email('email', null, [
                                            'class'=>'form-control',
                                            'placeholder'=>'correo@ejemplo.com',
                                            'required'=>'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">
                                            <i class="fas fa-lock"></i> Contraseña
                                        </label>
                                        {!! Form::password('password', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Mínimo 8 caracteres',
                                            'required'=>'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirm-password">
                                            <i class="fas fa-lock"></i> Confirmar Contraseña
                                        </label>
                                        {!! Form::password('confirm-password', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Repita la contraseña',
                                            'required'=>'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="roles">
                                            <i class="fas fa-user-tag"></i> Rol
                                        </label>
                                        {!! Form::select('roles', $roles, null, [
                                            'class' => 'form-control',
                                            'required'=>'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="empresa_id">
                                            <i class="fas fa-building"></i> Empresa
                                        </label>
                                        {!! Form::select('empresa_id', $empresas, null, [
                                            'class' => 'form-control',
                                            'required'=>'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group text-center">
                                        {!! Form::submit('Crear Usuario', [
                                            'class'=>'btn btn-success btn-lg'
                                        ]) !!}
                                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary btn-lg ml-2">
                                            <i class="fas fa-arrow-left"></i> Cancelar
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