@extends('layouts.app')

@section('title')
Graficos de cuentas
@endsection

@section('content')
    <section class="section">
        <div class="section-header" style="display:grid;grid-template-columns: repeat(3, 1fr);text-align:center;padding:5px 10px;">
            <div style="padding: 0px 0px 10px 10px">
                <a href="{{ route('catalogo.index') }}" class="ag-courses-item_link"style=" border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Catalogo de cuentas</div>
                </a>
            </div>
            <div style="padding: 0px 0px 10px 10px">                
                <a href="{{route('vinculacion.index')}}" class="ag-courses-item_link"style=" border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Relacionar cuentas</div>
                </a>
            </div>
            <div style="padding: 0px 0px 10px 10px">                
                <a href="{{ route('graficos.index') }}" class="ag-courses-item_link"style=" background-color:#212e37;border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Gráficas</div>
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped-columns">
                                <thead>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Gráficos</th>
                                </thead>
                                <tbody>
                                    @foreach ($cuentas as $cuenta)
                                        <tr>
                                            <td> {{$cuenta->codigo}} </td>
                                            <td> {{$cuenta->nombre}} </td>
                                            <td class="index-botones">
                                                <a href="{{ route('graficoDeCuenta', $cuenta->id) }}"><button type="button" class="btn btn-info">Gráfico</button></a>
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