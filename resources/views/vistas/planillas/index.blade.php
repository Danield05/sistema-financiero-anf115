@extends('layouts.app')

@section('title')
Planillas de Sueldos
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-money-check text-primary"></i> Planillas de Sueldos
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">

                            @include('notificador_validacion')

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <a href="{{ route('planillas.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Generar Planilla
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="planillas-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Empleado</th>
                                            <th>Período</th>
                                            <th>Salario Base</th>
                                            <th>AFP</th>
                                            <th>ISSS</th>
                                            <th>Renta</th>
                                            <th>Aguinaldo</th>
                                            <th>Vacaciones</th>
                                            <th>Total Deducciones</th>
                                            <th>Sueldo Neto</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($planillas as $planilla)
                                            <tr>
                                                <td>{{ $planilla->empleado->nombre }} {{ $planilla->empleado->apellido }}</td>
                                                <td>{{ $planilla->periodo }}</td>
                                                <td>${{ number_format($planilla->salario_base, 2) }}</td>
                                                <td>${{ number_format($planilla->afp_empleado, 2) }}</td>
                                                <td>${{ number_format($planilla->iss_empleado, 2) }}</td>
                                                <td>${{ number_format($planilla->renta, 2) }}</td>
                                                <td>${{ number_format($planilla->aguinaldo, 2) }}</td>
                                                <td>${{ number_format($planilla->vacaciones, 2) }}</td>
                                                <td>${{ number_format($planilla->total_deducciones, 2) }}</td>
                                                <td>${{ number_format($planilla->sueldo_neto, 2) }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('planillas.show', $planilla->id) }}" class="btn btn-sm btn-outline-info" title="Ver">
                                                            <i class="fas fa-eye"></i> Ver
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $planilla->id }})" title="Eliminar">
                                                            <i class="fas fa-trash"></i> Eliminar
                                                        </button>
                                                    </div>
                                                </td>
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#planillas-table').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "pageLength": 10,
            "responsive": true,
        });
    });

    function confirmDelete(id) {
        if (confirm('¿Está seguro de que desea eliminar esta planilla?')) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ url("planillas") }}/' + id;
            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);
            var csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = '{{ csrf_token() }}';
            form.appendChild(csrfField);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection