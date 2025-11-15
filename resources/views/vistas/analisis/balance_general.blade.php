@extends('layouts.app')

@section('title')
Balance General - Período {{$periodo_id}}
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-balance-scale text-primary"></i> Balance General - Período {{$periodo_id}}
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

                            @if(empty($cuentas_a) && empty($cuentas_d) && empty($cuentas_pa))
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle"></i> No hay cuentas disponibles para este período. Asegúrate de tener cuentas importadas con tipos correctos (Acreedora, Deudora, Patrimonio).
                                </div>
                            @endif

                            @if ($pasivo_patrimonio != $acredora)
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-circle"></i> <strong>Advertencia:</strong> El total de activos no coincide con el total de pasivos y patrimonio. Revise los datos.
                                </div>
                            @endif

                            <div class="row">
                                <!-- Activos -->
                                <div class="col-md-6">
                                    <div class="card border-success">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="card-title mb-0">
                                                <i class="fas fa-plus-circle"></i> Activos (Acreedoras)
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            @if(empty($cuentas_a))
                                                <p class="text-muted">No hay cuentas de activos disponibles.</p>
                                            @else
                                                @foreach ($cuentas_a as $cuenta)
                                                <div class="form-group">
                                                    {!! Form::open(['route'=>'cuenta_periodo.store','method'=>'POST', 'class'=>'d-inline-block w-100']) !!}
                                                    <div class="input-group">
                                                        {!! Form::hidden('cuenta_id', $cuenta->id, []) !!}
                                                        {!! Form::hidden('periodo_id', $periodo_id, []) !!}
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" style="min-width: 200px; color: black;">{{$cuenta->nombre}}</span>
                                                        </div>
                                                        {!! Form::number('total', null, [
                                                            'class' => 'form-control balance-input',
                                                            'min' => '0',
                                                            'step'=>'0.01',
                                                            'placeholder' => '0.00',
                                                            'required' => true,
                                                            'data-cuenta-id' => $cuenta->id,
                                                            'data-periodo-id' => $periodo_id
                                                            ]) !!}
                                                        <div class="input-group-append">
                                                            {!! Form::submit('Registrar', [
                                                                'class'=>'btn btn-success'
                                                                ]) !!}
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                                @endforeach
                                            @endif

                                            <!-- Cuentas ya registradas de activos -->
                                            @foreach ($cuenta_p as $cuentap)
                                                @if ($cuentap->cuenta->tipo == 1)
                                                <div class="form-group">
                                                    {!! Form::open(['route'=>'cuenta_periodo.store','method'=>'POST', 'class'=>'d-inline-block w-100']) !!}
                                                    <div class="input-group">
                                                        {!! Form::hidden('cuenta_id', $cuentap->cuenta->id,[]) !!}
                                                        {!! Form::hidden('periodo_id', $periodo_id, []) !!}
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-warning text-dark" style="min-width: 200px;">{{$cuentap->cuenta->nombre}} (Registrado)</span>
                                                        </div>
                                                        {!! Form::number('total', $cuentap->total, [
                                                            'class' => 'form-control balance-input',
                                                            'min' => '0',
                                                            'step'=>'0.01',
                                                            'placeholder' => '0.00',
                                                            'data-cuenta-id' => $cuentap->cuenta->id,
                                                            'data-periodo-id' => $periodo_id
                                                            ]) !!}
                                                        <div class="input-group-append">
                                                            {!! Form::submit('Actualizar', [
                                                                'class'=>'btn btn-warning'
                                                                ]) !!}
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                                @endif
                                            @endforeach

                                            <hr>
                                            <div class="alert alert-success">
                                                <strong>Total de Activos: </strong>
                                                <span class="badge badge-light" style="font-size: 1.2em; color: #28a745;">${{ number_format($acredora, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pasivos y Patrimonio -->
                                <div class="col-md-6">
                                    <div class="card border-danger">
                                        <div class="card-header bg-danger text-white">
                                            <h5 class="card-title mb-0">
                                                <i class="fas fa-minus-circle"></i> Pasivos y Patrimonio (Deudoras)
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <!-- Pasivos -->
                                            @if(!empty($cuentas_d) || collect($cuenta_p)->where('cuenta.tipo', 0)->count() > 0)
                                            <h6 class="text-danger mb-3"><i class="fas fa-credit-card"></i> Pasivos</h6>
                                            @endif

                                            @foreach ($cuentas_d as $cuenta)
                                            <div class="form-group">
                                                {!! Form::open(['route'=>'cuenta_periodo.store','method'=>'POST', 'class'=>'d-inline-block w-100']) !!}
                                                <div class="input-group">
                                                    {!! Form::hidden('cuenta_id', $cuenta->id, []) !!}
                                                    {!! Form::hidden('periodo_id', $periodo_id, []) !!}
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="min-width: 200px; color: black;">{{$cuenta->nombre}}</span>
                                                    </div>
                                                    {!! Form::number('total', null, [
                                                        'class' => 'form-control balance-input',
                                                        'min' => '0',
                                                        'step'=>'0.01',
                                                        'placeholder' => '0.00',
                                                        'required' => true,
                                                        'data-cuenta-id' => $cuenta->id,
                                                        'data-periodo-id' => $periodo_id
                                                        ]) !!}
                                                    <div class="input-group-append">
                                                        {!! Form::submit('Registrar', [
                                                            'class'=>'btn btn-success'
                                                            ]) !!}
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                            @endforeach

                                            @foreach ($cuenta_p as $cuentap)
                                                @if ($cuentap->cuenta->tipo == 0)
                                                <div class="form-group">
                                                    {!! Form::open(['route'=>'cuenta_periodo.store','method'=>'POST', 'class'=>'d-inline-block w-100']) !!}
                                                    <div class="input-group">
                                                        {!! Form::hidden('cuenta_id', $cuentap->cuenta->id, []) !!}
                                                        {!! Form::hidden('periodo_id', $periodo_id, []) !!}
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-warning text-dark" style="min-width: 200px;">{{$cuentap->cuenta->nombre}} (Registrado)</span>
                                                        </div>
                                                        {!! Form::number('total', $cuentap->total, [
                                                            'class' => 'form-control balance-input',
                                                            'min' => '0',
                                                            'step'=>'0.01',
                                                            'placeholder' => '0.00',
                                                            'data-cuenta-id' => $cuentap->cuenta->id,
                                                            'data-periodo-id' => $periodo_id
                                                            ]) !!}
                                                        <div class="input-group-append">
                                                            {!! Form::submit('Actualizar', [
                                                                'class'=>'btn btn-warning'
                                                                ]) !!}
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                                @endif
                                            @endforeach

                                            <!-- Patrimonio -->
                                            @if(!empty($cuentas_pa) || collect($cuenta_p)->where('cuenta.tipo', 2)->count() > 0)
                                            <hr>
                                            <h6 class="text-info mb-3"><i class="fas fa-building"></i> Patrimonio</h6>
                                            @endif

                                            @foreach ($cuentas_pa as $cuenta)
                                            <div class="form-group">
                                                {!! Form::open(['route'=>'cuenta_periodo.store','method'=>'POST', 'class'=>'d-inline-block w-100']) !!}
                                                <div class="input-group">
                                                    {!! Form::hidden('cuenta_id', $cuenta->id, []) !!}
                                                    {!! Form::hidden('periodo_id', $periodo_id, []) !!}
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="min-width: 200px; color: black;">{{$cuenta->nombre}}</span>
                                                    </div>
                                                    {!! Form::number('total', null, [
                                                        'class' => 'form-control balance-input',
                                                        'min' => '0',
                                                        'step'=>'0.01',
                                                        'placeholder' => '0.00',
                                                        'required' => true,
                                                        'data-cuenta-id' => $cuenta->id,
                                                        'data-periodo-id' => $periodo_id
                                                        ]) !!}
                                                    <div class="input-group-append">
                                                        {!! Form::submit('Registrar', [
                                                            'class'=>'btn btn-success'
                                                            ]) !!}
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                            @endforeach

                                            @foreach ($cuenta_p as $cuentap)
                                                @if ($cuentap->cuenta->tipo == 2)
                                                <div class="form-group">
                                                    {!! Form::open(['route'=>'cuenta_periodo.store','method'=>'POST', 'class'=>'d-inline-block w-100']) !!}
                                                    <div class="input-group">
                                                        {!! Form::hidden('cuenta_id', $cuentap->cuenta->id, []) !!}
                                                        {!! Form::hidden('periodo_id', $periodo_id, []) !!}
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-warning text-dark" style="min-width: 200px;">{{$cuentap->cuenta->nombre}} (Registrado)</span>
                                                        </div>
                                                        {!! Form::number('total', $cuentap->total, [
                                                            'class' => 'form-control balance-input',
                                                            'min' => '0',
                                                            'step'=>'0.01',
                                                            'placeholder' => '0.00',
                                                            'data-cuenta-id' => $cuentap->cuenta->id,
                                                            'data-periodo-id' => $periodo_id
                                                            ]) !!}
                                                        <div class="input-group-append">
                                                            {!! Form::submit('Actualizar', [
                                                                'class'=>'btn btn-warning'
                                                                ]) !!}
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                                @endif
                                            @endforeach

                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="alert alert-danger">
                                                        <strong>Total Pasivo: </strong>
                                                        <span class="badge badge-light" style="font-size: 1.1em; color: #dc3545;">${{ number_format($deudora, 2) }}</span>
                                                    </div>
                                                    <div class="alert alert-info">
                                                        <strong>Total Patrimonio: </strong>
                                                        <span class="badge badge-light" style="font-size: 1.1em; color: #17a2b8;">${{ number_format($patrimonio, 2) }}</span>
                                                    </div>
                                                    <div class="alert alert-secondary">
                                                        <strong>Total Pasivo + Patrimonio: </strong>
                                                        <span class="badge badge-light" style="font-size: 1.1em; color: #6c757d;">${{ number_format($pasivo_patrimonio, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    {!! Form::open(['route'=>'balance_general.store', 'method'=>'POST']) !!}
                                    {!! Form::hidden('periodo_id', $periodo_id, []) !!}
                                    {!! Form::hidden('activo', $acredora, []) !!}
                                    {!! Form::hidden('pasivo', $deudora, []) !!}
                                    {!! Form::hidden('patrimonio', $patrimonio, []) !!}
                                    {!! Form::hidden('empresa_id', \Illuminate\Support\Facades\Auth::user()->empresa->id, []) !!}
                                    {!! Form::submit('Guardar Balance General', [
                                        'class' => 'btn btn-primary btn-lg'
                                    ]) !!}
                                    {!! Form::close() !!}
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-info btn-lg mr-2" onclick="guardar()">
                                        <i class="fas fa-save"></i> Registrar Todo
                                    </button>
                                    <a href="{{ route('periodo.index') }}" class="btn btn-secondary btn-lg">
                                        <i class="fas fa-arrow-left"></i> Volver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{asset('js/balance.js')}}" defer></script>
@endsection

{{-- <div class="form-group">
   {!! Form::open(['route'=>'cuenta_periodo.store','method'=>'POST']) !!}
   {!! Form::hidden('cuenta', $cuenta->id, []) !!}
   {!! Form::hidden('periodo_id', $periodo_id, []) !!}
   <label for="total">{{$cuenta->nombre}}</label>
   {!! Form::number('total', null, [
       'class' => 'form-control',
       'min' => '0',
       ]) !!}
   {!! Form::submit('Registrar', [
       'class'=>'btn btn-success'
       ]) !!}
   {!! Form::close() !!}
</div> --}}