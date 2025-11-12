@extends('layouts.app')

@section('title')
Crear rol
@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            {{-- Manejador de Errores que muestra aquellos que no estan llenos --}}
                            @include('notificador_validacion')

                            {!! Form::open(array('route'=>['roles.update', $role], 'method'=>'PUT')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', $role->name, [
                                            'class'=>'form-control'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Permisos para este Rol</label>
                                        <br>
                                        @foreach ($permission as $value)
                                        <label for="name">
                                            {{-- {!! Form::checkbox('permission[]', $value->id, true, [
                                                'class' => 'name'
                                            ]) !!} --}}
                                            <input type="checkbox" name="permission[]" class="name" value="{{ $value->id }} "
                                            @if (in_array($value->id, $rolePermissions) == true) checked @endif>
                                            {{$value->name}}
                                        </label>
                                        <br>
                                        @endforeach
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