@extends('layouts.app')

@section('title')
Crear rol
@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
@include('notificador_validacion')

                            {!! Form::open(array('route'=>'roles.store', 'method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', null, [
                                            'class'=>'form-control'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Permisos para este Rol</label>
                                        <br>
                                        @foreach ($permission as $value)
                                        <label for="permission[]">
                                            {!! Form::checkbox('permission[]', $value->id, false, [
                                                'class' => 'name'
                                            ]) !!}
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