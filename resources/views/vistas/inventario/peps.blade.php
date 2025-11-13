@extends('layouts.app')

@section('title')
Inventario PEPS - Primero en Entrar, Primero en Salir
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-boxes text-primary"></i> Inventario PEPS (Primero en Entrar, Primero en Salir)
                            </h4>
                            <div class="card-header-action">
                                <a href="{{ route('inventario.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Vista General
                                </a>
                            </div>
                        </div>
                        <div class="card-body" style="min-height: 400px;">

                            @include('notificador_validacion')

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <a href="{{ route('inventario.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Agregar Producto PEPS
                                    </a>
                                </div>
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control" id="search-input" placeholder="Buscar productos PEPS...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="inventario-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Costo Unitario</th>
                                            <th>Fecha</th>
                                            <th>Valor Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inventarios as $inventario)
                                            <tr>
                                                <td><strong>{{ $inventario->producto }}</strong></td>
                                                <td>{{ $inventario->cantidad }}</td>
                                                <td>${{ number_format($inventario->costo_unitario, 2) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($inventario->fecha)->format('d/m/Y') }}</td>
                                                <td>${{ number_format($inventario->cantidad * $inventario->costo_unitario, 2) }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
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

                            @if($inventarios->count() > 0)
                            <div class="mt-4">
                                <h5>Información del Método PEPS:</h5>
                                <div class="alert alert-info">
                                    <strong>PEPS (Primero en Entrar, Primero en Salir):</strong> Este método asume que los primeros productos que entran al inventario son los primeros en salir. Los costos de venta se basan en los costos más antiguos disponibles.
                                </div>
                            </div>
                            @endif
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
            "searching": false,
        });

        // Custom search functionality
        $('#search-input').on('keyup', function() {
            $('#inventario-table').DataTable().search($(this).val()).draw();
        });
    });

    function confirmDelete(id) {
        if (confirm('¿Está seguro de que desea eliminar este producto del inventario PEPS?')) {
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