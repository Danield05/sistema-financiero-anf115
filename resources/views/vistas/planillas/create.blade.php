@extends('layouts.app')

@section('title')
Generar Planilla de Sueldo
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Generar Planilla de Sueldo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @include('notificador_validacion')

                            {!! Form::open(['route' => 'planillas.store', 'method' => 'POST']) !!}

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('empleado_id', 'Empleado') !!}
                                        {!! Form::select('empleado_id', $empleados->pluck('nombre', 'id'), null, [
                                            'class' => 'form-control',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('periodo', 'Período') !!}
                                        {!! Form::text('periodo', date('Y-m'), [
                                            'class' => 'form-control',
                                            'placeholder' => 'YYYY-MM',
                                            'required' => 'required'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    {!! Form::submit('Generar Planilla', [
                                        'class' => 'btn btn-primary'
                                    ]) !!}
                                    <a href="{{ route('planillas.index') }}" class="btn btn-secondary">Cancelar</a>
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