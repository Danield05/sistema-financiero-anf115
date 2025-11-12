@extends('layouts.app')

@section('title')
Estado de resultado
@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Estado de resultado</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @include('notificador_validacion')

                            {!! Form::open([
                                'route' => 'estado.store'
                            ]) !!}

                            @if($estado_resultado == null)
                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (+) Ventas
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('ventas', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Devolucion sobre ventas
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('devolucion_sobre_ventas', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Ventas netas
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Costos de ventas
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('costo_de_ventas', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Utilidad bruta
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Gastos de operacion
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('gastos_de_operacion', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Utilidad operativa
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (+) Otros ingresos
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('otros_ingresos', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>
                                
                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Gastos no operativos
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('gastos_no_operativos', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>
                                
                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Utilidad antes de impuestos
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Impuestos sobre la renta
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('impuestos_sobre_la_renta', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>
                                
                                                            
                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Utilidad neta
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', null, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>
                                {!! Form::hidden('periodo_id', $periodo_id, []) !!}

                            {{-- ! Bandera --}}
                            @else
                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (+) Ventas
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('ventas', $estado_resultado->ventas, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Devolucion sobre ventas
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('devolucion_sobre_ventas', $estado_resultado->devolucion_sobre_ventas, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Ventas netas
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', $ventas_netas, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Costos de ventas
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('costo_de_ventas', $estado_resultado->costo_de_ventas, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Utilidad bruta
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', $utilidad_bruta, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Gastos de operacion
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('gastos_de_operacion', $estado_resultado->gastos_de_operacion, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Utilidad operativa
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', $utilidad_operativa, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (+) Otros ingresos
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('otros_ingresos', $estado_resultado->otros_ingresos, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>
                                
                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Gastos no operativos
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('gastos_no_operativos', $estado_resultado->gastos_no_operativos, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>
                                
                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Utilidad antes de impuestos
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', $utilidad_antes_de_impuesto, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (-) Impuestos sobre la renta
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('impuestos_sobre_la_renta', $estado_resultado->impuestos_sobre_la_renta, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01'
                                        ]) !!}
                                    </div>
                                </div>
                                
                                                            
                                <div class="row mg_abajo_5">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        (=) Utilidad neta
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        {!! Form::number('', $utilidad_neta, [
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'step' => '0.01',
                                            'disabled' => 'true'
                                        ]) !!}
                                    </div>
                                </div>
                                {!! Form::hidden('periodo_id', $estado_resultado->periodo_id, []) !!}
                            @endif
                            {!! Form::submit('Guardar', [
                                'class' => 'btn btn-primary'
                            ]) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection