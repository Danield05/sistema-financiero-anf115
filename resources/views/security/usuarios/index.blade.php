@extends('layouts.app')

@section('title')
Usuarios
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-users text-primary"></i> Gestión de Usuarios
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    @can('crear-usuario')
                                    <a class="btn btn-success" href="{{ route('usuarios.create')}}">
                                        <i class="fas fa-plus"></i> Nuevo Usuario
                                    </a>
                                    @endcan
                                </div>
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control" id="search-input" placeholder="Buscar usuarios...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="usuarios-table" style="color: black;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>E-mail</th>
                                            <th>Empresa</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td><strong>{{$usuario->id}}</strong></td>
                                                <td><i class="fas fa-user"></i> {{$usuario->name}}</td>
                                                <td><i class="fas fa-envelope"></i> {{$usuario->email}}</td>
                                                <td><i class="fas fa-building"></i> {{$usuario->empresa->nombre}}</td>
                                                <td>
                                                    @if(!@empty($usuario->getRoleNames()))
                                                        @foreach ($usuario->getRoleNames() as $rolName)
                                                            <span class="badge badge-primary">{{$rolName}}</span>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        @can('editar-usuario')
                                                        <a class="btn btn-sm btn-outline-info" href="{{route('usuarios.edit', $usuario->id)}}" title="Editar usuario">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                        @endcan
                                                        @can('borrar-usuario')
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{$usuario->id}})" title="Eliminar usuario">
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
        $('#usuarios-table').DataTable({
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
            $('#usuarios-table').DataTable().search($(this).val()).draw();
        });
    });

    function confirmDelete(id) {
        if (confirm('¿Está seguro de que desea eliminar este usuario?')) {
            // Create and submit form
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/usuarios/' + id;

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