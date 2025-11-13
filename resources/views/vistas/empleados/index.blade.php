@extends('layouts.app')

@section('title')
Gestión de Empleados
@endsection

@section('content')
<section class="section" style="margin-top: 20px;">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-users text-primary"></i> Gestión de Empleados
                        </h4>
                    </div>
                    <div class="card-body" style="min-height: 400px;">

                        @include('notificador_validacion')

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <a href="{{ route('empleados.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Agregar Empleado
                                </a>
                            </div>
                            <div class="input-group" style="width: 300px;">
                                <input type="text" class="form-control" id="search-input" placeholder="Buscar empleados...">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="empleados-table" style="color: black;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>DUI</th>
                                        <th>NIT</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Fecha Contratación</th>
                                        <th>Salario Base</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ $empleado->nombre }}</td>
                                            <td>{{ $empleado->apellido }}</td>
                                            <td>{{ $empleado->dui }}</td>
                                            <td>{{ $empleado->nit ?: 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($empleado->fecha_nacimiento)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($empleado->fecha_contratacion)->format('d/m/Y') }}</td>
                                            <td>${{ number_format($empleado->salario_base, 2) }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-sm btn-outline-info" title="Ver">
                                                        <i class="fas fa-eye"></i> Ver
                                                    </a>
                                                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                                        <i class="fas fa-edit"></i> Editar
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $empleado->id }})" title="Eliminar">
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
        $('#empleados-table').DataTable({
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
            "searching": false // Disable DataTable search
        });

        // Custom search functionality
        $('#search-input').on('keyup', function() {
            $('#empleados-table').DataTable().search($(this).val()).draw();
        });
    });

    function confirmDelete(id) {
        if (confirm('¿Está seguro de que desea eliminar este empleado?')) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ url("empleados") }}/' + id;
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