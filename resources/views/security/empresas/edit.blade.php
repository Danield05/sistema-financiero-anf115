@extends('layouts.app')

@section('title')
Editar empresa
@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar empresa</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
@include('notificador_validacion')

                            {!! Form::open(array('route'=>['empresa.update', $empresa], 'method'=>'PUT')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        {!! Form::text('nombre', $empresa->nombre, [
                                            'class'=>'form-control'
                                        ]) !!}
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nit">NIT</label>
                                        {!! Form::text('nit', $empresa->nit, [
                                            'class'=>'form-control',
                                            'max-length' => '15'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nrc">NRC</label>
                                        {!! Form::text('nrc', $empresa->nrc, [
                                            'class'=>'form-control',
                                            'max-length' => '15'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sector_id">Sector</label>
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