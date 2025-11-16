@extends('layouts.app')

@section('title')
Editar empresa
@endsection


@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-building text-primary"></i> Editar Empresa: {{$empresa->nombre}}
                            </h4>
                        </div>
                        <div class="card-body">
                            @include('notificador_validacion')

                            {!! Form::open(array('route'=>['empresa.update', $empresa], 'method'=>'PUT')) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">
                                            <i class="fas fa-building"></i> Nombre
                                        </label>
                                        {!! Form::text('nombre', $empresa->nombre, [
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
                                        {!! Form::text('nit', $empresa->nit, [
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
                                        {!! Form::text('nrc', $empresa->nrc, [
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
                                        <select name="sector_id" id="sector_id" class="form-control">
                                            @foreach ($sectors as $sector)
                                            <option value="{{$sector->id}}"
                                                @if ($sector->id == $empresa->sector_id)
                                                    selected
                                                @endif
                                                >{{$sector->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group text-center">
                                        {!! Form::submit('Guardar Cambios', [
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