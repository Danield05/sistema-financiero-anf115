@extends('layouts.app')

@section('title')
Crear rol
@endsection


@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-user-shield text-primary"></i> Editar Rol: {{$role->name}}
                            </h4>
                        </div>
                        <div class="card-body">
                            {{-- Manejador de Errores que muestra aquellos que no estan llenos --}}
                            @include('notificador_validacion')

                            {!! Form::open(array('route'=>['roles.update', $role], 'method'=>'PUT')) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">
                                            <i class="fas fa-tag"></i> Nombre del Rol
                                        </label>
                                        {!! Form::text('name', $role->name, [
                                            'class'=>'form-control',
                                            'placeholder'=>'Ingrese el nombre del rol',
                                            'required'=>'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            <i class="fas fa-key"></i> Permisos para este Rol
                                        </label>
                                        <div class="row" style="color: black;">
                                            @foreach ($permission as $value)
                                            <div class="col-md-4 mb-2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="permission[]" class="form-check-input" value="{{ $value->id }}"
                                                    @if (in_array($value->id, $rolePermissions) == true) checked @endif
                                                    id="perm_{{ $value->id }}">
                                                    <label class="form-check-label" for="perm_{{ $value->id }}">
                                                        <small>{{$value->name}}</small>
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group text-center">
                                        {!! Form::submit('Guardar Cambios', [
                                            'class'=>'btn btn-success btn-lg'
                                        ]) !!}
                                        <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-lg ml-2">
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