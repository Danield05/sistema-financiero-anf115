@extends('layouts.app')

@section('title')
Gestión de Presupuestos
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-calculator text-primary"></i> Gestión de Presupuestos
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">

                            @include('notificador_validacion')

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <a href="{{ route('presupuestos.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Crear Presupuesto
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="presupuestos-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Descripción</th>
                                            <th>Período</th>
                                            <th>Monto Presupuestado</th>
                                            <th>Monto Real</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($presupuestos as $presupuesto)
                                            <tr>
                                                <td>
                                                    @if ($presupuesto->tipo == 'general')
                                                        <span class="badge badge-primary">General</span>
                                                    @elseif($presupuesto->tipo == 'ventas')
                                                        <span class="badge badge-success">Ventas</span>
                                                    @elseif($presupuesto->tipo == 'produccion')
                                                        <span class="badge badge-warning">Producción</span>
                                                    @else
                                                        <span class="badge badge-info">Maestro</span>
                                                    @endif
                                                </td>
                                                <td>{{ $presupuesto->descripcion }}</td>
                                                <td>{{ $presupuesto->periodo->anio }}</td>
                                                <td>${{ number_format($presupuesto->monto_presupuestado, 2) }}</td>
                                                <td>${{ $presupuesto->monto_real ? number_format($presupuesto->monto_real, 2) : 'N/A' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($presupuesto->fecha_inicio)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($presupuesto->fecha_fin)->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('presupuestos.edit', $presupuesto->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{ $presupuesto->id }})" title="Eliminar">
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
        $('#presupuestos-table').DataTable({
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
        if (confirm('¿Está seguro de que desea eliminar este presupuesto?')) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ url("presupuestos") }}/' + id;
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