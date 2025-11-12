@extends('layouts.app')

@section('title')
Análisis horizontal
@endsection

@section('content')
    <section class="section">
        <div class="section-header" style="display:grid;grid-template-columns: repeat(2, 1fr);text-align:center;padding:5px 10px;">
            <div style="padding: 0px 0px 10px 10px">
                <a class="dropdown-item has-icon" href="{{ route('horizontal.index') }}" style="padding: 5px 10px;background-color:#040525;color:#ffffff;border-radius: 10px">
                    <h4 class="page__heading" style="margin: 0px 0px 0px 0px;">Análisis horizontal</h4>
                </a>
            </div>
            <div style="padding: 0px 0px 10px 10px">
                <a class="dropdown-item has-icon" href=" {{route('vertical.index')}}" style="padding: 5px 10px;border-radius: 10px">
                    <h4 class="page__heading" style="margin: 0px 0px 0px 0px">Análisis vertical</h4>
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
                                        <th>{{$periodo1_nombre}}</th>
                                        <th>{{$periodo2_nombre}}</th>
                                        <th>Variacion Absoluta</th>
                                        <th>Variacion Relativa</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuenta_supreme as $cuenta)
                                            <tr>
                                                <td>{{$cuenta['cuenta']}}</td>
                                                <td>{{$cuenta['cuenta1']}}</td>
                                                <td>{{$cuenta['cuenta2']}}</td>
                                                <td>{{$cuenta['absoluta']}}</td>
                                                <td>{{$cuenta['relativa']}}%</td>
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