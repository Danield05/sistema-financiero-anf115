@extends('layouts.app')

@section('title')
Editar usuario
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @include('notificador_validacion')

                            {!! Form::open(array('route'=>['usuarios.update',$user], 'method'=>'PUT')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', $user->name, [
                                            'class'=>'form-control'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        {!! Form::email('email', $user->email, [
                                            'class'=>'form-control'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        {!! Form::password('password', [
                                            'class'=>'form-control'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar Contraseña</label>
                                        {!! Form::password('confirm-password', [
                                            'class'=>'form-control'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="roles">Roles</label>
                                        {!! Form::select('roles', $roles, null, [
                                            'class' => 'form-control'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="empresa_id">Empresa</label>
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

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        {!! Form::submit('Guardar', [
                                            'class'=>'btn btn-success'
                                        ]) !!}
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