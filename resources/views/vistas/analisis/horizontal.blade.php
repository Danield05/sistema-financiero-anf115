@extends('layouts.app')

@section('title')
Análisis horizontal
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-chart-line text-primary"></i> Análisis Horizontal
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center mb-4">
                                <a href="{{route('vertical.index')}}" class="btn btn-success btn-sm mx-2">
                                    <i class="fas fa-chart-bar"></i> Análisis Vertical
                                </a>
                            </div>

                            {!! Form::open([
                                'route'=>'horizontal',
                                'method' => 'POST'
                                ]) !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="periodo_1" class="form-label">
                                            <i class="fas fa-calendar"></i> Selecciona el período 01
                                        </label>
                                        {!! Form::select('periodo_1', $cuentas, null, [
                                            'class'=>'form-control',
                                            'id'=>'periodo_1'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="periodo_2" class="form-label">
                                            <i class="fas fa-calendar"></i> Selecciona el período 02
                                        </label>
                                        {!! Form::select('periodo_2', $cuentas, null, [
                                            'class'=>'form-control',
                                            'id'=>'periodo_2'
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                @if ($cuentas->count() > 1)
                                {!! Form::submit('Calcular Análisis', [
                                    'class' => 'btn btn-primary btn-lg'
                                ]) !!}
                                @else
                                    <div class="alert alert-warning" role="alert">
                                        <i class="fas fa-info-circle"></i> Primero debe ingresar períodos para realizar el análisis.
                                    </div>
                                @endif
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection