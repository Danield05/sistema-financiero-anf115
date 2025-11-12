@extends('layouts.app')

@section('title')
Análisis vertical
@endsection

@section('content')
    <section class="section">
        <div class="section-header" style="display:grid;grid-template-columns: repeat(2, 1fr);text-align:center;padding:5px 10px;">
            <div style="padding: 0px 0px 10px 10px">            
                <a href="{{ route('horizontal.index') }}" class="ag-courses-item_link"style=" border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Análisis horizontal</div>
                </a>
            </div>
            <div style="padding: 0px 0px 10px 10px">                
                <a href="{{route('vertical.index')}}" class="ag-courses-item_link"style="background-color:#212e37;border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Análisis vertical</div>
                </a>
            </div>
        </div>
        {{-- <div class="section-header">
            <h3 class="page__heading">Analisis Vertical</h3>
        </div> --}}
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Seleccione los periodos</h3>
                            <br>

                            {!! Form::open([
                                'route'=>'vertical',
                                'method' => 'POST'
                                ]) !!}

                            <div class="flex">
                                <div class="contenedor_a col-xs-6 col-sm-6 col-md-6">
                                    <h4 class="mg_abajo_15">Selecciona el periodo 01</h4>
                                    {!! Form::select('periodo_1', $cuentas, null, [
                                        'class'=>'form-control'
                                    ]) !!}
                                </div>
    
                                <div class="contenedor_d col-xs-6 col-sm-6 col-md-6">
                                    <h4 class="mg_abajo_15">Selecciona el periodo 02</h4>
                                    {!! Form::select('periodo_2', $cuentas, null, [
                                        'class'=>'form-control'
                                    ]) !!}
                                </div>
                            </div>

                            <br>
                            <br>
                            @if ($cuentas->count() > 1)
                            {!! Form::submit('Calcular', [
                                'class' => 'btn btn-primary'
                            ]) !!}
                            @else
                            <div class="alert alert-danger" role="alert">
                                Primero debe ingresar periodos!
                              </div>                             
                            @endif

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection