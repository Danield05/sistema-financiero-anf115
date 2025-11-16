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

                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createPresupuestoModal">
                                        <i class="fas fa-plus"></i> Crear Presupuesto
                                    </button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped" id="presupuestos-table">
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
                                                <td><strong style="color: black;">{{ $presupuesto->descripcion }}</strong></td>
                                                <td><strong style="color: black;">{{ $presupuesto->periodo->anio }}</strong></td>
                                                <td><strong style="color: black;">${{ number_format($presupuesto->monto_presupuestado, 2) }}</strong></td>
                                                <td><strong style="color: black;">${{ $presupuesto->monto_real ? number_format($presupuesto->monto_real, 2) : 'N/A' }}</strong></td>
                                                <td><strong style="color: black;">{{ \Carbon\Carbon::parse($presupuesto->fecha_inicio)->format('d/m/Y') }}</strong></td>
                                                <td><strong style="color: black;">{{ \Carbon\Carbon::parse($presupuesto->fecha_fin)->format('d/m/Y') }}</strong></td>
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
            "searching": false // Disable DataTable search
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

    // Función para abrir el modal de creación
    function openCreateModal() {
        $('#createPresupuestoModal').modal('show');
    }
</script>

<!-- Modal para Crear Presupuesto -->
<div class="modal fade" id="createPresupuestoModal" tabindex="-1" role="dialog" aria-labelledby="createPresupuestoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPresupuestoModalLabel">
                    <i class="fas fa-plus-circle text-primary"></i> Crear Nuevo Presupuesto
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('notificador_validacion')

                <form action="{{ route('presupuestos.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="tipo">Tipo de Presupuesto</label>
                                <select name="tipo" class="form-control" required>
                                    <option value="general">General</option>
                                    <option value="ventas">Ventas</option>
                                    <option value="produccion">Producción</option>
                                    <option value="maestro">Maestro</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="periodo_id">Período</label>
                                <select name="periodo_id" class="form-control" required>
                                    @foreach($periodos as $periodo)
                                        <option value="{{ $periodo->id }}">{{ $periodo->anio }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripción del presupuesto" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="monto_presupuestado">Monto Presupuestado</label>
                                <input type="number" name="monto_presupuestado" class="form-control" min="0" step="0.01" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio</label>
                                <input type="date" name="fecha_inicio" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="fecha_fin">Fecha de Fin</label>
                                <input type="date" name="fecha_fin" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Crear Presupuesto
                            </button>
                            <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection