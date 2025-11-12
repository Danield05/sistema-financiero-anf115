@extends('layouts.app')

@section('title')
Roles
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-user-shield text-primary"></i> Gestión de Roles
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    @can('crear-rol')
                                    <a class="btn btn-success" href="{{ route('roles.create')}}">
                                        <i class="fas fa-plus"></i> Nuevo Rol
                                    </a>
                                    @endcan
                                </div>
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control" id="search-input" placeholder="Buscar roles...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="roles-table" style="color: black;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td><i class="fas fa-user-tag"></i> <strong>{{$role->name}}</strong></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        @can('editar-rol')
                                                        <a class="btn btn-sm btn-outline-info" href="{{route('roles.edit', $role->id)}}" title="Editar rol">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                        @endcan
                                                        @can('borrar-rol')
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{$role->id}})" title="Eliminar rol">
                                                            <i class="fas fa-trash"></i> Eliminar
                                                        </button>
                                                        @endcan
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
        $('#roles-table').DataTable({
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
            "order": [[0, 'asc']]
        });

        // Custom search functionality
        $('#search-input').on('keyup', function() {
            $('#roles-table').DataTable().search($(this).val()).draw();
        });
    });

    function confirmDelete(id) {
        if (confirm('¿Está seguro de que desea eliminar este rol?')) {
            // Create and submit form
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/roles/' + id;

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