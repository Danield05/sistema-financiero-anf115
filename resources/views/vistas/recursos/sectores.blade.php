@extends('layouts.app')

@section('title')
Sector
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Sector</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('notificador_validacion')
                            
                            <a class="btn btn-warning" data-toggle="modal" data-target="#nuevoSectorModal">Nuevo sector</a>

                            <br><br>

                            <div class="table-responsive">
                                <table class="table table-striped-columns">
                                    <thead>
                                        <th>Sector</th>
                                        <th>Razon cirtulante</th>
                                        <th>Prueba acida</th>
                                        <th>Rotacion de inventario</th>
                                        <th>Rotacion de cuentas por cobrar</th>
                                        <th>Grado de endeudamiento</th>
                                        <th>Razon de endeudamiento patrimonial</th>
                                        <th>Rentabilidad neta del patrimonio</th>
                                        <th>Rentabilidad del activo</th>
                                        <th>Rentabilidad sobre venta</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($sectors as $sector)
                                            <tr>
                                                <td>{{$sector->nombre}}</td>
                                                <td>{{$sector->razon_circulante}}</td>
                                                <td>{{$sector->prueba_acida}}</td>
                                                <td>{{$sector->rotacion_inventario}}</td>
                                                <td>{{$sector->rotacion_cuentas_por_cobrar}}</td>
                                                <td>{{$sector->grado_endeudamiento}}</td>
                                                <td>{{$sector->razon_endeudamiento_patrimonial}}</td>
                                                <td>{{$sector->rentabilidad_neta_del_patrimonio}}</td>
                                                <td>{{$sector->rentabilidad_del_activo}}</td>
                                                <td>{{$sector->rentabilidad_sobre_venta}}</td>
                                                <td class="index-botones">
                                                    {!! Form::open(['method'=>'DELETE', 'route' => ['sector.destroy', $sector->id]]) !!}
                                                    {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}

                                                    <a class="btn btn-info" data-toggle="modal" data-target="#editarSectorModal{{$sector->id}}">Editar</a>
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
        </div>
    </section>
@endsection

@include('vistas.recursos.nuevo_sector')