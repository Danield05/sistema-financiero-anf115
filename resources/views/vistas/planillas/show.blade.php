@extends('layouts.app')

@section('title')
Detalles de Planilla de Sueldo
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-file-invoice-dollar text-primary"></i> Detalles de Planilla de Sueldo
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">
                            @include('notificador_validacion')

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5 class="text-primary">Información del Empleado</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="150">Nombre:</th>
                                            <td><strong style="color: black;">{{ $planilla->empleado->nombre }} {{ $planilla->empleado->apellido }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Período:</th>
                                            <td><strong style="color: black;">{{ $planilla->periodo }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Fecha Inicio:</th>
                                            <td><strong style="color: black;">{{ $planilla->fecha_inicio ? \Carbon\Carbon::parse($planilla->fecha_inicio)->format('d/m/Y') : 'N/A' }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Fecha Fin:</th>
                                            <td><strong style="color: black;">{{ $planilla->fecha_fin ? \Carbon\Carbon::parse($planilla->fecha_fin)->format('d/m/Y') : 'N/A' }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Días Laborados:</th>
                                            <td><strong style="color: black;">{{ $planilla->dias_laborados }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Días con Permiso:</th>
                                            <td><strong style="color: black;">{{ $planilla->dias_faltados_con_permiso }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Días sin Permiso:</th>
                                            <td><strong style="color: black;">{{ $planilla->dias_faltados_sin_permiso }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-success">Cálculos Salariales</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="150">Salario Base:</th>
                                            <td><strong style="color: black;">${{ number_format($planilla->salario_base, 2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>AFP (7.25%):</th>
                                            <td><strong style="color: black;">${{ number_format($planilla->afp_empleado, 2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>ISSS (3%):</th>
                                            <td><strong style="color: black;">${{ number_format($planilla->iss_empleado, 2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Renta:</th>
                                            <td><strong style="color: black;">${{ number_format($planilla->renta, 2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Total Deducciones:</th>
                                            <td><strong style="color: black;">${{ number_format($planilla->total_deducciones, 2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Sueldo Neto:</th>
                                            <td><strong class="text-success" style="font-size: 1.2em;">${{ number_format($planilla->sueldo_neto, 2) }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="text-info">Beneficios</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="150">Aguinaldo:</th>
                                            <td><strong style="color: black;">${{ number_format($planilla->aguinaldo, 2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Vacaciones:</th>
                                            <td><strong style="color: black;">${{ number_format($planilla->vacaciones, 2) }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center flex-wrap mt-4">
                                <div class="mx-2 mb-2">
                                    <a href="{{ route('planillas.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Volver
                                    </a>
                                </div>
                                <div class="mx-2 mb-2">
                                    <button onclick="window.print()" class="btn btn-info">
                                        <i class="fas fa-print"></i> Imprimir
                                    </button>
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
<script>
    // Optional: Open in new window if needed
    // But for now, it's a regular page
</script>
@endsection