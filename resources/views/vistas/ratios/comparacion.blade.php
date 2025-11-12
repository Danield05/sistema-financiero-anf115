@extends('layouts.app')

@section('title')
Comparacion de Ratios
@endsection

@section('content')
    <section class="section">
        <div class="section-header" style="display:grid;grid-template-columns: repeat(2, 1fr);text-align:center;padding:5px 10px;">
            <div style="padding: 0px 0px 10px 10px">            
                <a href="{{ route('ratios.index') }}" class="ag-courses-item_link"style=" border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Ratios de la empresa</div>
                </a>
            </div>
            <div style="padding: 0px 0px 10px 10px">
            <a href=" {{route('ratios.comparacion')}}" class="ag-courses-item_link"style=" background-color:#212e37;border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Comparación de ratios</div>
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Comparacion de ratios del sector {{$sector->nombre}}</h3>

                            <table class="table">
                                <thead>
                                    <th>Empresa</th>
                                    @foreach ($comparaciones as $comparacion)
                                        <th>{{$comparacion['empresa']}}</th>
                                    @endforeach
                                    <th>Ratio promedio</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Razon circulante</td>
                                        @foreach ($comparaciones as $comparacion)
                                        @if ($sector->razon_circulante < $comparacion['razon_circulante'])
                                            <td class="table-success">{{$comparacion['razon_circulante']}}</td>
                                        @elseif ($sector->razon_circulante > $comparacion['razon_circulante'])
                                            <td class="table-danger">{{$comparacion['razon_circulante']}}</td>
                                        @else
                                            <td>{{$comparacion['razon_circulante']}}</td>
                                        @endif    
                                        @endforeach
                                        <td class="table-info">{{$sector->razon_circulante}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Prueba acida</td>
                                        @foreach ($comparaciones as $comparacion)
                                        @if ($sector->prueba_acida < $comparacion['prueba_acida'])
                                            <td class="table-success">{{$comparacion['prueba_acida']}}</td>
                                        @elseif ($sector->prueba_acida > $comparacion['prueba_acida'])
                                            <td class="table-danger">{{$comparacion['prueba_acida']}}</td>
                                        @else
                                            <td>{{$comparacion['prueba_acida']}}</td>
                                        @endif    
                                        @endforeach
                                        <td class="table-info">{{$sector->prueba_acida}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Rotacion de inventario</td>
                                        @foreach ($comparaciones as $comparacion)
                                        @if ($sector->rotacion_inventario < $comparacion['rotacion_inventario'])
                                            <td class="table-success">{{$comparacion['rotacion_inventario']}}</td>
                                        @elseif ($sector->rotacion_inventario > $comparacion['rotacion_inventario'])
                                            <td class="table-danger">{{$comparacion['rotacion_inventario']}}</td>
                                        @else
                                            <td>{{$comparacion['rotacion_inventario']}}</td>
                                        @endif    
                                        @endforeach
                                        <td class="table-info">{{$sector->rotacion_inventario}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Rotacion de cuentas por cobrar</td>
                                        @foreach ($comparaciones as $comparacion)
                                        @if ($sector->rotacion_cuentas_por_cobrar > $comparacion['rotacion_cuentas_por_cobrar'])
                                            <td class="table-success">{{$comparacion['rotacion_cuentas_por_cobrar']}}</td>
                                        @elseif ($sector->rotacion_cuentas_por_cobrar < $comparacion['rotacion_cuentas_por_cobrar'])
                                            <td class="table-danger">{{$comparacion['rotacion_cuentas_por_cobrar']}}</td>
                                        @else
                                            <td>{{$comparacion['rotacion_cuentas_por_cobrar']}}</td>
                                        @endif    
                                        @endforeach
                                        <td class="table-info">{{$sector->rotacion_cuentas_por_cobrar}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Grado de endeudamiento</td>
                                        @foreach ($comparaciones as $comparacion)
                                        @if ($sector->grado_endeudamiento > $comparacion['grado_endeudamiento'])
                                            <td class="table-success">{{$comparacion['grado_endeudamiento']}}</td>
                                        @elseif ($sector->grado_endeudamiento < $comparacion['grado_endeudamiento'])
                                            <td class="table-danger">{{$comparacion['grado_endeudamiento']}}</td>
                                        @else
                                            <td>{{$comparacion['grado_endeudamiento']}}</td>
                                        @endif    
                                        @endforeach
                                        <td class="table-info">{{$sector->grado_endeudamiento}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Razon endeudamiento patrimonial</td>
                                        @foreach ($comparaciones as $comparacion)
                                        @if ($sector->razon_endeudamiento_patrimonial > $comparacion['razon_endeudamiento_patrimonial'])
                                            <td class="table-success">{{$comparacion['razon_endeudamiento_patrimonial']}}</td>
                                        @elseif ($sector->razon_endeudamiento_patrimonial < $comparacion['razon_endeudamiento_patrimonial'])
                                            <td class="table-danger">{{$comparacion['razon_endeudamiento_patrimonial']}}</td>
                                        @else
                                            <td>{{$comparacion['razon_endeudamiento_patrimonial']}}</td>
                                        @endif    
                                        @endforeach
                                        <td class="table-info">{{$sector->razon_endeudamiento_patrimonial}}</td>
                                    </tr>

                                    <tr>
                                        <td>Rentabilidad neta del patrimonio</td>
                                        @foreach ($comparaciones as $comparacion)
                                        @if ($sector->rentabilidad_neta_del_patrimonio < $comparacion['rentabilidad_neta_del_patrimonio'])
                                            <td class="table-success">{{$comparacion['rentabilidad_neta_del_patrimonio']}}</td>
                                        @elseif ($sector->rentabilidad_neta_del_patrimonio > $comparacion['rentabilidad_neta_del_patrimonio'])
                                            <td class="table-danger">{{$comparacion['rentabilidad_neta_del_patrimonio']}}</td>
                                        @else
                                            <td>{{$comparacion['rentabilidad_neta_del_patrimonio']}}</td>
                                        @endif    
                                        @endforeach
                                        <td class="table-info">{{$sector->rentabilidad_neta_del_patrimonio}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Rentabilidad del activo</td>
                                        @foreach ($comparaciones as $comparacion)
                                        @if ($sector->rentabilidad_del_activo < $comparacion['rentabilidad_del_activo'])
                                            <td class="table-success">{{$comparacion['rentabilidad_del_activo']}}</td>
                                        @elseif ($sector->rentabilidad_del_activo > $comparacion['rentabilidad_del_activo'])
                                            <td class="table-danger">{{$comparacion['rentabilidad_del_activo']}}</td>
                                        @else
                                            <td>{{$comparacion['rentabilidad_del_activo']}}</td>
                                        @endif    
                                        @endforeach
                                        <td class="table-info">{{$sector->rentabilidad_del_activo}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Rentabilidad sobre venta</td>
                                        @foreach ($comparaciones as $comparacion)
                                        @if ($sector->rentabilidad_sobre_venta < $comparacion['rentabilidad_sobre_venta'])
                                            <td class="table-success">{{$comparacion['rentabilidad_sobre_venta']}}</td>
                                        @elseif ($sector->rentabilidad_sobre_venta > $comparacion['rentabilidad_sobre_venta'])
                                            <td class="table-danger">{{$comparacion['rentabilidad_sobre_venta']}}</td>
                                        @else
                                            <td>{{$comparacion['rentabilidad_sobre_venta']}}</td>
                                        @endif    
                                        @endforeach
                                        <td class="table-info">{{$sector->rentabilidad_sobre_venta}}</td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection