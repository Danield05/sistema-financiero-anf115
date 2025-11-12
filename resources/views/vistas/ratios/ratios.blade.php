@extends('layouts.app')

@section('title')
Ratios
@endsection



@section('content')
    <section class="section" style="margin-top: 100px">
        
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="">
                        <div class="card-body" >
                            <h3 class="text-center">Ratios empresa {{\Illuminate\Support\Facades\Auth::user()->empresa->nombre}}</h3>

                            <div class="flex">
                                <div class="contenedor_a col-xs-6 col-sm-6 col-md-6">
                                    <br>
                                    <h4 class="mg_abajo_5">Razones financieras</h4>
                                    <table class="table">
                                        <thead>
                                            <th></th>
                                            <th>Razon circulante</th>
                                            <th>Prueba acida</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($razones_financieras as $razon)                                        
                                            <tr>
                                                <th>{{$razon['anio']}}</th>
                                                <th>{{$razon['razon_circulante']}}</th>
                                                <th>{{$razon['prueba_acida']}}</th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
        
                                    <br>
                                    <h4 class="mg_abajo_5">Razones eficiencia</h4>
                                    <table class="table">
                                        <thead>
                                            <th></th>
                                            <th>Rotacion de inventario</th>
                                            <th>Cuentas por cobrar</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($razones_eficiencia as $razon)                                        
                                            <tr>
                                                <th>{{$razon['anio']}}</th>
                                                <th>{{$razon['rotacion_inventario']}}</th>
                                                <th>{{$razon['rotacion_cuentas_por_cobrar']}}</th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
    
                                <div class="contenedor_d col-xs-6 col-sm-6 col-md-6">
                                    <br>
                                    <h4 class="mg_abajo_5">Razones endeudamiento</h4>
                                    <table class="table">
                                        <thead>
                                            <th></th>
                                            <th>Grado de endeudamiento</th>
                                            <th>Cuentas por cobrar</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($razones_endeudamiento as $razon)                                        
                                            <tr>
                                                <th>{{$razon['anio']}}</th>
                                                <th>{{$razon['grado_endeudamiento']}}</th>
                                                <th>{{$razon['razon_endeudamiento_patrimonial']}}</th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
        
                                    <br>
                                    <h4 class="mg_abajo_5">Razones de rentabilidad</h4>
                                    <table class="table">
                                        <thead>
                                            <th></th>
                                            <th>Rentabilidad neta del patrimonio</th>
                                            <th>Rentabilidad de activo</th>
                                            <th>Rentabilidad sobre ventas</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($razones_rentabilidad as $razon)                                        
                                            <tr>
                                                <th>{{$razon['anio']}}</th>
                                                <th>{{$razon['rentabilidad_neta_del_patrimonio']}}</th>
                                                <th>{{$razon['rentabilidad_del_activos']}}</th>
                                                <th>{{$razon['rentabilidad_sobre_ventas']}}</th>
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
        </div>
        <div class="section-header " style="border:0px;display:grid;grid-template-columns: repeat(2, 1fr);text-align:center;padding:5px 10px;">
           
        
      

            <div style="padding: 0px 0px 10px 10px">
                <a href="{{ route('ratios.index') }}" class="ag-courses-item_link"style=" background-color:#212e37;border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Ratios de la empresa</div>
                </a>
            </div>

            <div style="padding: 0px 0px 10px 10px">
                <a href=" {{route('ratios.comparacion')}}" class="ag-courses-item_link"style=" border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Comparación de ratios</div>
                </a>
            </div>
        </div>
    </section>
@endsection