@extends('layouts.app')

@section('title')
Periodo
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Periodo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('notificador_validacion')
                            <div class="row">
                                @if ($bandera != null)
                                    <div class="alert alert-danger alerta" role="alert">
                                        {{$bandera}}
                                    </div>   
                                @endif
                            </div>
                            @if ($periodos->count() > 0)
                                {!! Form::open(['route'=>'periodo.guardar', 'method'=>'get']) !!}
                                {!! Form::submit('Nuevo periodo', [
                                    'class' => 'btn btn-warning mb-4'
                                ]) !!}
                                {!! Form::close() !!}
                            @else
                                <a class="btn btn-warning mb-4" data-toggle="modal" data-target="#nuevoPeriodoModal">Nueva periodo</a>
                            @endif
                            <table class="table table-striped-columns">
                                <thead>
                                    <th>Año</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($periodos as $periodo)
                                        <tr>
                                            <td> {{$periodo->anio}} </td>
                                            <td class="index-botones">
                                                {!! Form::open(['method'=>'DELETE', 'route' => ['periodo.destroy', $periodo->id]]) !!}
                                                {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}

                                                <a class="btn btn-info" href="/balance_general/crear/{{$periodo->id}}">Balance general</a>
                                                <a class="btn btn-success" href="/estado_de_resultado/{{$periodo->id}}">Estado resultado</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('vistas.recursos.nuevo_periodo')