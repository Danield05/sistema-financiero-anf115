@extends('layouts.app')

@section('title')
Gestión de Inventario
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-boxes text-primary"></i> Gestión de Inventario
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">

                            @include('notificador_validacion')

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <a href="{{ route('inventario.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Agregar Inventario
                                    </a>
                                    <div class="btn-group ml-2">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ver por Método
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('inventario.peps') }}">
                                                <i class="fas fa-box text-primary"></i> PEPS
                                            </a>
                                            <a class="dropdown-item" href="{{ route('inventario.ueps') }}">
                                                <i class="fas fa-box text-success"></i> UEPS
                                            </a>
                                            <a class="dropdown-item" href="{{ route('inventario.costo_promedio') }}">
                                                <i class="fas fa-box text-info"></i> Costo Promedio
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control" id="search-input" placeholder="Buscar productos...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="inventario-table" style="color: black;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre del Inventario</th>
                                            <th>Método</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Valor Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inventarios as $inventario)
                                            <tr>
                                                <td><strong>{{ $inventario->producto }}</strong></td>
                                                <td>
                                                    @if ($inventario->metodo == 'PEPS')
                                                        <span class="badge badge-primary">PEPS</span>
                                                    @elseif($inventario->metodo == 'UEPS')
                                                        <span class="badge badge-success">UEPS</span>
                                                    @else
                                                        <span class="badge badge-info">Costo Promedio</span>
                                                    @endif
                                                </td>
                                                <td>{{ $inventario->fecha_inicio ? \Carbon\Carbon::parse($inventario->fecha_inicio)->format('d/m/Y') : 'N/A' }}</td>
                                                <td>{{ $inventario->fecha_fin ? \Carbon\Carbon::parse($inventario->fecha_fin)->format('d/m/Y') : 'N/A' }}</td>
                                                <td>${{ number_format($inventario->valor_total ?? 0, 2) }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('inventario.show', $inventario->id) }}" class="btn btn-sm btn-outline-info" title="Ver">
                                                            <i class="fas fa-eye"></i> Ver
                                                        </a>
                                                        <a href="{{ route('inventario.edit', $inventario->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $inventario->id }})" title="Eliminar">
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
        // Initialize DataTable
        $('#inventario-table').DataTable({
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
            "order": [[4, 'desc']],
            "searching": false // Disable DataTable search
        });

        // Custom search functionality
        $('#search-input').on('keyup', function() {
            $('#inventario-table').DataTable().search($(this).val()).draw();
        });
    });

    function confirmDelete(id) {
        if (confirm('¿Está seguro de que desea eliminar este producto del inventario?')) {
            // Create and submit form
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ url("inventario") }}/' + id;

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