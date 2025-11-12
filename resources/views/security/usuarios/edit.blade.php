@extends('layouts.app')

@section('title')
Editar usuario
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-user-edit text-primary"></i> Editar Usuario: {{$user->name}}
                            </h4>
                        </div>
                        <div class="card-body">
                            @include('notificador_validacion')

                            {!! Form::open(array('route'=>['usuarios.update',$user], 'method'=>'PUT')) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            <i class="fas fa-user"></i> Nombre
                                        </label>
                                        {!! Form::text('name', $user->name, [
                                            'class'=>'form-control',
                                            'placeholder'=>'Ingrese el nombre completo'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="fas fa-envelope"></i> E-mail
                                        </label>
                                        {!! Form::email('email', $user->email, [
                                            'class'=>'form-control',
                                            'placeholder'=>'correo@ejemplo.com'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">
                                            <i class="fas fa-lock"></i> Nueva Contraseña (opcional)
                                        </label>
                                        {!! Form::password('password', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Dejar vacío para mantener la actual'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirm-password">
                                            <i class="fas fa-lock"></i> Confirmar Nueva Contraseña
                                        </label>
                                        {!! Form::password('confirm-password', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Repita la nueva contraseña'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="roles">
                                            <i class="fas fa-user-tag"></i> Rol
                                        </label>
                                        {!! Form::select('roles', $roles, null, [
                                            'class' => 'form-control'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="empresa_id">
                                            <i class="fas fa-building"></i> Empresa
                                        </label>
                                        <select name="empresa_id" id="empresa_id" class="form-control">
                                            @foreach ($empresas as $empresa)
                                            <option value="{{$empresa->id}}"
                                                @if ($empresa->id == $user->empresa_id)
                                                    selected
                                                @endif
                                                >{{$empresa->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group text-center">
                                        {!! Form::submit('Guardar Cambios', [
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