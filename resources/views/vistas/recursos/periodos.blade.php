@extends('layouts.app')

@section('title')
Periodo
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-calendar-alt text-primary"></i> Gestión de Períodos
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">
                            @include('notificador_validacion')
                            <div class="row">
                                @if ($bandera != null)
                                    <div class="alert alert-danger alerta" role="alert">
                                        {{$bandera}}
                                    </div>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                   <button class="btn btn-success" data-toggle="modal" data-target="#nuevoPeriodoModal">
                                       <i class="fas fa-plus"></i> Nuevo Periodo
                                   </button>
                                </div>
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control" id="search-input" placeholder="Buscar períodos...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="periodos-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Año</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($periodos as $periodo)
                                            <tr>
                                                <td><strong style="color: black;">{{$periodo->anio}}</strong></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a class="btn btn-sm btn-outline-info" href="{{ route('balance.crear', $periodo->id) }}" title="Crear balance general">
                                                            <i class="fas fa-balance-scale"></i> Balance
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-success" href="/estado_de_resultado/{{$periodo->id}}" title="Ver estado de resultado">
                                                            <i class="fas fa-chart-line"></i> Estado
                                                        </a>
                                                        <form action="{{ url('periodo', $periodo->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Está seguro de que desea eliminar este período?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar período">
                                                                <i class="fas fa-trash"></i> Eliminar
                                                            </button>
                                                        </form>
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
        $('#periodos-table').DataTable({
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
            "order": [[0, 'desc']]
        });

        // Custom search functionality
        $('#search-input').on('keyup', function() {
            $('#periodos-table').DataTable().search($(this).val()).draw();
        });
    });

    function confirmDelete(id) {
        if (confirm('¿Está seguro de que desea eliminar este período?')) {
            // Create and submit form
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/periodo/' + id;

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

@include('vistas.recursos.nuevo_periodo')