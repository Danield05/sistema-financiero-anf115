@extends('layouts.app')

@section('title')
Análisis Horizontal - Selección de Períodos
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-chart-line text-primary"></i> Análisis Horizontal
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

                            <!-- Información del análisis -->
                            <div class="alert alert-info">
                                <h6><i class="fas fa-info-circle"></i> ¿Qué es el Análisis Horizontal?</h6>
                                <p class="mb-0">Compara los estados financieros de dos períodos diferentes para identificar cambios absolutos y relativos en las cuentas, ayudando a entender la evolución financiera de la empresa.</p>
                            </div>

                            <!-- Navegación entre análisis -->
                            <div class="d-flex justify-content-center mb-4">
                                <div class="btn-group" role="group">
                                    <a href="{{route('horizontal.index')}}" class="btn btn-primary active">
                                        <i class="fas fa-chart-line"></i> Análisis Horizontal
                                    </a>
                                    <a href="{{route('vertical.index')}}" class="btn btn-success">
                                        <i class="fas fa-chart-bar"></i> Análisis Vertical
                                    </a>
                                </div>
                            </div>

                            {!! Form::open([
                                'route'=>'horizontal',
                                'method' => 'POST'
                                ]) !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary text-white">
                                            <h6 class="card-title mb-0">
                                                <i class="fas fa-calendar-check"></i> Período Base (01)
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="periodo_1" class="form-label font-weight-bold">
                                                    Selecciona el período de referencia
                                                </label>
                                                {!! Form::select('periodo_1', $cuentas, null, [
                                                    'class'=>'form-control form-control-lg',
                                                    'id'=>'periodo_1',
                                                    'required' => true
                                                ]) !!}
                                                <small class="form-text text-muted">
                                                    <i class="fas fa-lightbulb"></i> Este será el período base para las comparaciones
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card border-success">
                                        <div class="card-header bg-success text-white">
                                            <h6 class="card-title mb-0">
                                                <i class="fas fa-calendar-plus"></i> Período de Comparación (02)
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="periodo_2" class="form-label font-weight-bold">
                                                    Selecciona el período a comparar
                                                </label>
                                                {!! Form::select('periodo_2', $cuentas, null, [
                                                    'class'=>'form-control form-control-lg',
                                                    'id'=>'periodo_2',
                                                    'required' => true
                                                ]) !!}
                                                <small class="form-text text-muted">
                                                    <i class="fas fa-lightbulb"></i> Este período se comparará con el base
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    @if ($cuentas->count() > 1)
                                        <div class="text-center">
                                            {!! Form::submit('Realizar Análisis Horizontal', [
                                                'class' => 'btn btn-primary btn-lg btn-block'
                                            ]) !!}
                                        </div>
                                    @else
                                        <div class="alert alert-warning text-center" role="alert">
                                            <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
                                            <h5>No hay suficientes períodos</h5>
                                            <p class="mb-0">Necesitas al menos 2 períodos para realizar el análisis horizontal. Ve a la sección de períodos para crear más.</p>
                                            <a href="{{ route('periodo.index') }}" class="btn btn-warning mt-3">
                                                <i class="fas fa-plus"></i> Crear Períodos
                                            </a>
                                        </div>
                                    @endif
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