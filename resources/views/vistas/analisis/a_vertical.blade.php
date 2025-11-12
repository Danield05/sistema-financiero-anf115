@extends('layouts.app')

@section('title')
Análisis vertical
@endsection

@section('content')
    <section class="section">
        <div class="section-header" style="display:grid;grid-template-columns: repeat(2, 1fr);text-align:center;padding:5px 10px;">
            <div style="padding: 0px 0px 10px 10px">
                <a class="dropdown-item has-icon" href=" {{route('horizontal.index')}}" style="padding: 5px 10px;border-radius: 10px">
                    <h4 class="page__heading" style="margin: 0px 0px 0px 0px">Análisis horizontal</h4>
                </a>
            </div>
            <div style="padding: 0px 0px 10px 10px">
                <a class="dropdown-item has-icon" href="{{ route('vertical.index') }}" style="padding: 5px 10px;background-color:#040525;color:#ffffff;border-radius: 10px">
                    <h4 class="page__heading" style="margin: 0px 0px 0px 0px;">Análisis vertical</h4>
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table table-striped-columns">
                                    <thead>
                                        <th>Cuentas</th>
                                        <th>{{$periodo1}}</th>
                                        <th>{{$periodo2}}</th>
                                        <th>Variacion {{$periodo1}}</th>
                                        <th>Variacion {{$periodo2}}</th>
                                    </thead>
                                    <tbody>
                                        <tr class="table-secondary">
                                            <td>Activos</td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        @foreach ($cuenta_supreme as $cuenta)
                                            @if ($cuenta['tipo'] == 1)
                                                <tr>
                                                    <td>{{$cuenta['cuenta']}}</td>
                                                    <td>{{$cuenta['cuenta1']}}</td>
                                                    <td>{{$cuenta['cuenta2']}}</td>
                                                    <td>{{$cuenta['variacion1']}}%</td>
                                                    <td>{{$cuenta['variacion2']}}%</td>
                                                </tr>
                                            @endif
                                        @endforeach
    
                                        <tr class="table-info">
                                            <td>Total Activo</td>
                                            <td>{{$totales['activo1']}}</td>
                                            <td>{{$totales['activo2']}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    
                                        <tr><td></td></tr>
                                        <tr class="table-secondary">
                                            <td>Pasivos</td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        @foreach ($cuenta_supreme as $cuenta)
                                        @if ($cuenta['tipo'] == 0)
                                        <tr>
                                            <td>{{$cuenta['cuenta']}}</td>
                                            <td>{{$cuenta['cuenta1']}}</td>
                                            <td>{{$cuenta['cuenta2']}}</td>
                                            <td>{{$cuenta['variacion1']}}%</td>
                                            <td>{{$cuenta['variacion2']}}%</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        
                                        <tr class="table-info">
                                            <td>Total Pasivo</td>
                                            <td>{{$totales['pasivo1']}}</td>
                                            <td>{{$totales['pasivo2']}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    
    
                                        <tr><td></td></tr>
                                        <tr class="table-secondary">
                                            <td>Patrimonio</td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        @foreach ($cuenta_supreme as $cuenta)
                                            @if ($cuenta['tipo'] == 2)
                                                <tr>
                                                    <td>{{$cuenta['cuenta']}}</td>
                                                    <td>{{$cuenta['cuenta1']}}</td>
                                                    <td>{{$cuenta['cuenta2']}}</td>
                                                    <td>{{$cuenta['variacion1']}}%</td>
                                                    <td>{{$cuenta['variacion2']}}%</td>
                                                </tr>
                                            @endif
                                        @endforeach
    
                                        <tr class="table-info">
                                            <td>Total Patrimonio</td>
                                            <td>{{$totales['patrimonio1']}}</td>
                                            <td>{{$totales['patrimonio2']}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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