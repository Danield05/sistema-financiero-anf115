@extends('layouts.app')

@section('title')
Crear empresa
@endsection


@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-building text-primary"></i> Crear Nueva Empresa
                            </h4>
                        </div>
                        <div class="card-body">
                            @include('notificador_validacion')

                            {!! Form::open(array('route'=>'empresa.store', 'method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">
                                            <i class="fas fa-building"></i> Nombre
                                        </label>
                                        {!! Form::text('nombre', null, [
                                            'class'=>'form-control',
                                            'placeholder'=>'Ingrese el nombre de la empresa'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nit">
                                            <i class="fas fa-id-card"></i> NIT
                                        </label>
                                        {!! Form::text('nit', null, [
                                            'class'=>'form-control',
                                            'placeholder'=>'Número de Identificación Tributaria',
                                            'max-length' => '15'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nrc">
                                            <i class="fas fa-file-alt"></i> NRC
                                        </label>
                                        {!! Form::text('nrc', null, [
                                            'class'=>'form-control',
                                            'placeholder'=>'Número de Registro de Contribuyente',
                                            'max-length' => '15'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sector_id">
                                            <i class="fas fa-industry"></i> Sector
                                        </label>
                                        {!! Form::select('sector_id', $sectors, null, [
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group text-center">
                                        {!! Form::submit('Guardar', [
                                            'class'=>'btn btn-success btn-lg'
                                        ]) !!}
                                        <a href="{{ route('empresa.index') }}" class="btn btn-secondary btn-lg ml-2">
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