@extends('layouts.app')

@section('title')
Estado de Resultado - Período {{$periodo_id ?? $estado_resultado->periodo_id ?? 'N/A'}}
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-chart-line text-primary"></i> Estado de Resultado - Período {{$periodo_id ?? $estado_resultado->periodo_id ?? 'N/A'}}
                            </h4>
                        </div>
                        <div class="card-body">

                            @include('notificador_validacion')

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::open([
                                'route' => 'estado.store'
                            ]) !!}

                            @if($estado_resultado == null)
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="card-title mb-0">
                                            <i class="fas fa-plus-circle"></i> Nuevo Estado de Resultado
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Ingresos -->
                                        <h6 class="text-success mb-3"><i class="fas fa-arrow-up"></i> Ingresos</h6>

                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right">
                                                <i class="fas fa-dollar-sign text-success"></i> (+) Ventas
                                            </label>
                                            <div class="col-sm-6">
                                                {!! Form::number('ventas', null, [
                                                    'class' => 'form-control',
                                                    'min' => '0',
                                                    'step' => '0.01',
                                                    'placeholder' => '0.00',
                                                    'required' => true
                                                ]) !!}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right">
                                                <i class="fas fa-minus-circle text-danger"></i> (-) Devolución sobre ventas
                                            </label>
                                            <div class="col-sm-6">
                                                {!! Form::number('devolucion_sobre_ventas', null, [
                                                    'class' => 'form-control',
                                                    'min' => '0',
                                                    'step' => '0.01',
                                                    'placeholder' => '0.00'
                                                ]) !!}
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right font-weight-bold">
                                                (=) Ventas Netas
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="0.00" disabled>
                                            </div>
                                        </div>

                                        <!-- Costos y Gastos -->
                                        <h6 class="text-danger mb-3"><i class="fas fa-arrow-down"></i> Costos y Gastos</h6>

                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right">
                                                <i class="fas fa-shopping-cart text-danger"></i> (-) Costo de Ventas
                                            </label>
                                            <div class="col-sm-6">
                                                {!! Form::number('costo_de_ventas', null, [
                                                    'class' => 'form-control',
                                                    'min' => '0',
                                                    'step' => '0.01',
                                                    'placeholder' => '0.00',
                                                    'required' => true
                                                ]) !!}
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right font-weight-bold">
                                                (=) Utilidad Bruta
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="0.00" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right">
                                                <i class="fas fa-cogs text-danger"></i> (-) Gastos de Operación
                                            </label>
                                            <div class="col-sm-6">
                                                {!! Form::number('gastos_de_operacion', null, [
                                                    'class' => 'form-control',
                                                    'min' => '0',
                                                    'step' => '0.01',
                                                    'placeholder' => '0.00',
                                                    'required' => true
                                                ]) !!}
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right font-weight-bold">
                                                (=) Utilidad Operativa
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="0.00" disabled>
                                            </div>
                                        </div>

                                        <!-- Otros Ingresos y Gastos -->
                                        <h6 class="text-info mb-3"><i class="fas fa-balance-scale"></i> Otros Ingresos y Gastos</h6>

                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right">
                                                <i class="fas fa-plus-circle text-success"></i> (+) Otros Ingresos
                                            </label>
                                            <div class="col-sm-6">
                                                {!! Form::number('otros_ingresos', null, [
                                                    'class' => 'form-control',
                                                    'min' => '0',
                                                    'step' => '0.01',
                                                    'placeholder' => '0.00'
                                                ]) !!}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right">
                                                <i class="fas fa-minus-circle text-danger"></i> (-) Gastos No Operativos
                                            </label>
                                            <div class="col-sm-6">
                                                {!! Form::number('gastos_no_operativos', null, [
                                                    'class' => 'form-control',
                                                    'min' => '0',
                                                    'step' => '0.01',
                                                    'placeholder' => '0.00'
                                                ]) !!}
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right font-weight-bold">
                                                (=) Utilidad Antes de Impuestos
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="0.00" disabled>
                                            </div>
                                        </div>

                                        <!-- Impuestos -->
                                        <h6 class="text-warning mb-3"><i class="fas fa-file-invoice-dollar"></i> Impuestos</h6>

                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right">
                                                <i class="fas fa-calculator text-warning"></i> (-) Impuestos sobre la Renta
                                            </label>
                                            <div class="col-sm-6">
                                                {!! Form::number('impuestos_sobre_la_renta', null, [
                                                    'class' => 'form-control',
                                                    'min' => '0',
                                                    'step' => '0.01',
                                                    'placeholder' => '0.00',
                                                    'required' => true
                                                ]) !!}
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label text-right font-weight-bold text-primary">
                                                <i class="fas fa-trophy text-primary"></i> (=) Utilidad Neta
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control bg-primary text-white font-weight-bold" value="0.00" disabled>
                                            </div>
                                        </div>

                                        {!! Form::hidden('periodo_id', $periodo_id, []) !!}
                                    </div>
                                </div>

                           @else
                               <div class="card border-success">
                                   <div class="card-header bg-success text-white">
                                       <h5 class="card-title mb-0">
                                           <i class="fas fa-edit"></i> Estado de Resultado Existente
                                       </h5>
                                   </div>
                                   <div class="card-body">
                                       <!-- Ingresos -->
                                       <h6 class="text-success mb-3"><i class="fas fa-arrow-up"></i> Ingresos</h6>

                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right">
                                               <i class="fas fa-dollar-sign text-success"></i> (+) Ventas
                                           </label>
                                           <div class="col-sm-6">
                                               {!! Form::number('ventas', $estado_resultado->ventas, [
                                                   'class' => 'form-control',
                                                   'min' => '0',
                                                   'step' => '0.01',
                                                   'required' => true
                                               ]) !!}
                                           </div>
                                       </div>

                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right">
                                               <i class="fas fa-minus-circle text-danger"></i> (-) Devolución sobre ventas
                                           </label>
                                           <div class="col-sm-6">
                                               {!! Form::number('devolucion_sobre_ventas', $estado_resultado->devolucion_sobre_ventas, [
                                                   'class' => 'form-control',
                                                   'min' => '0',
                                                   'step' => '0.01'
                                               ]) !!}
                                           </div>
                                       </div>

                                       <hr>
                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right font-weight-bold">
                                               (=) Ventas Netas
                                           </label>
                                           <div class="col-sm-6">
                                               <input type="text" class="form-control bg-light" value="${{ number_format($ventas_netas, 2) }}" disabled>
                                           </div>
                                       </div>

                                       <!-- Costos y Gastos -->
                                       <h6 class="text-danger mb-3"><i class="fas fa-arrow-down"></i> Costos y Gastos</h6>

                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right">
                                               <i class="fas fa-shopping-cart text-danger"></i> (-) Costo de Ventas
                                           </label>
                                           <div class="col-sm-6">
                                               {!! Form::number('costo_de_ventas', $estado_resultado->costo_de_ventas, [
                                                   'class' => 'form-control',
                                                   'min' => '0',
                                                   'step' => '0.01',
                                                   'required' => true
                                               ]) !!}
                                           </div>
                                       </div>

                                       <hr>
                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right font-weight-bold">
                                               (=) Utilidad Bruta
                                           </label>
                                           <div class="col-sm-6">
                                               <input type="text" class="form-control bg-light" value="${{ number_format($utilidad_bruta, 2) }}" disabled>
                                           </div>
                                       </div>

                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right">
                                               <i class="fas fa-cogs text-danger"></i> (-) Gastos de Operación
                                           </label>
                                           <div class="col-sm-6">
                                               {!! Form::number('gastos_de_operacion', $estado_resultado->gastos_de_operacion, [
                                                   'class' => 'form-control',
                                                   'min' => '0',
                                                   'step' => '0.01',
                                                   'required' => true
                                               ]) !!}
                                           </div>
                                       </div>

                                       <hr>
                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right font-weight-bold">
                                               (=) Utilidad Operativa
                                           </label>
                                           <div class="col-sm-6">
                                               <input type="text" class="form-control bg-light" value="${{ number_format($utilidad_operativa, 2) }}" disabled>
                                           </div>
                                       </div>

                                       <!-- Otros Ingresos y Gastos -->
                                       <h6 class="text-info mb-3"><i class="fas fa-balance-scale"></i> Otros Ingresos y Gastos</h6>

                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right">
                                               <i class="fas fa-plus-circle text-success"></i> (+) Otros Ingresos
                                           </label>
                                           <div class="col-sm-6">
                                               {!! Form::number('otros_ingresos', $estado_resultado->otros_ingresos, [
                                                   'class' => 'form-control',
                                                   'min' => '0',
                                                   'step' => '0.01'
                                               ]) !!}
                                           </div>
                                       </div>

                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right">
                                               <i class="fas fa-minus-circle text-danger"></i> (-) Gastos No Operativos
                                           </label>
                                           <div class="col-sm-6">
                                               {!! Form::number('gastos_no_operativos', $estado_resultado->gastos_no_operativos, [
                                                   'class' => 'form-control',
                                                   'min' => '0',
                                                   'step' => '0.01'
                                               ]) !!}
                                           </div>
                                       </div>

                                       <hr>
                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right font-weight-bold">
                                               (=) Utilidad Antes de Impuestos
                                           </label>
                                           <div class="col-sm-6">
                                               <input type="text" class="form-control bg-light" value="${{ number_format($utilidad_antes_de_impuesto, 2) }}" disabled>
                                           </div>
                                       </div>

                                       <!-- Impuestos -->
                                       <h6 class="text-warning mb-3"><i class="fas fa-file-invoice-dollar"></i> Impuestos</h6>

                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right">
                                               <i class="fas fa-calculator text-warning"></i> (-) Impuestos sobre la Renta
                                           </label>
                                           <div class="col-sm-6">
                                               {!! Form::number('impuestos_sobre_la_renta', $estado_resultado->impuestos_sobre_la_renta, [
                                                   'class' => 'form-control',
                                                   'min' => '0',
                                                   'step' => '0.01',
                                                   'required' => true
                                               ]) !!}
                                           </div>
                                       </div>

                                       <hr>
                                       <div class="form-group row">
                                           <label class="col-sm-6 col-form-label text-right font-weight-bold text-primary">
                                               <i class="fas fa-trophy text-primary"></i> (=) Utilidad Neta
                                           </label>
                                           <div class="col-sm-6">
                                               <input type="text" class="form-control bg-primary text-white font-weight-bold" value="${{ number_format($utilidad_neta, 2) }}" disabled>
                                           </div>
                                       </div>

                                       {!! Form::hidden('periodo_id', $estado_resultado->periodo_id, []) !!}
                                   </div>
                               </div>
                           @endif
                           <div class="d-flex justify-content-between align-items-center mt-4">
                               <div>
                                   {!! Form::submit('Guardar Estado de Resultado', [
                                       'class' => 'btn btn-primary btn-lg'
                                   ]) !!}
                               </div>
                               <div class="d-flex">
                                   <a href="{{ route('periodo.index') }}" class="btn btn-secondary btn-lg">
                                       <i class="fas fa-arrow-left"></i> Volver
                                   </a>
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