@extends('layouts.app')

@section('title')
Catalogo de cuentas
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-list text-primary"></i> Catálogo de Cuentas
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">

                            @include('notificador_validacion')
                            @if($errors->any())
                            <h5 style="color:red">Errores encontrados en el archivo excel. Verifique los datos del archivo.</h5>
                            @endif


                            @if($confirmar == 0)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <button class="btn btn-success" id="cuenta" data-toggle="modal" data-target="#nuevaCuentaModal">
                                        <i class="fas fa-plus"></i> Nueva Cuenta
                                    </button>
                                    <button class="btn btn-info ml-2" data-toggle="modal" data-target="#nuevaCuentaExcelModal">
                                        <i class="fas fa-file-excel"></i> Importar Excel
                                    </button>
                                </div>
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control" id="search-input" placeholder="Buscar cuentas...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="catalogo-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Padre</th>
                                            <th>Tipo</th>
                                            @if($confirmar == 0)
                                            <th>Acciones</th>
                                            @else
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuentas as $cuenta)
                                            <tr>
                                                <td><code>{{$cuenta->codigo}}</code></td>
                                                <td><strong>{{$cuenta->nombre}}</strong></td>
                                                <td>{{$cuenta->padre ?: 'N/A'}}</td>
                                                <td>
                                                    @if ($cuenta->tipo == 0)
                                                        <span class="badge badge-primary">Deudora</span>
                                                    @elseif($cuenta->tipo == 1)
                                                        <span class="badge badge-success">Acreedora</span>
                                                    @elseif($cuenta->tipo == 2)
                                                        <span class="badge badge-warning">Patrimonio</span>
                                                    @else
                                                        <span class="badge badge-info">Resultado</span>
                                                    @endif
                                                </td>
                                                @if($confirmar == 0)
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editarCuentaModal{{$cuenta->id}}" title="Editar cuenta">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{$cuenta->id}})" title="Eliminar cuenta">
                                                            <i class="fas fa-trash"></i> Eliminar
                                                        </button>
                                                    </div>
                                                </td>
                                                @else
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- hola -->
                        <div class="card-body">
                            @if (count($cuentas)>0)
                                @if ($confirmar == 0)
                                    <form action="{{route('catalogo.confirmar')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success" id="confirmar" onclick="myFunction()">Confirmar Catalogo</button>
                                    </form>
                                @endif
                            @endif
                            <div class="d-flex justify-content-center flex-wrap mt-3">
                                <div class="mx-2 mb-2">
                                    <a href="{{route('vinculacion.index')}}" class="btn btn-success btn-sm">
                                        <i class="fas fa-link"></i> Relacionar Cuentas
                                    </a>
                                </div>
                                <div class="mx-2 mb-2">
                                    <a href="{{ route('graficos.index') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-chart-bar"></i> Gráficas
                                    </a>
                                </div>
                            </div>
                        <div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('vistas.empresa.nueva_cuenta')

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#catalogo-table').DataTable({
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
            "order": [[0, 'asc']],
            "searching": false // Disable DataTable search
        });

        // Custom search functionality
        $('#search-input').on('keyup', function() {
            $('#catalogo-table').DataTable().search($(this).val()).draw();
        });
    });

    function confirmDelete(id) {
        if (confirm('¿Está seguro de que desea eliminar esta cuenta?')) {
            // Create and submit form
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ url("catalogo") }}/' + id;

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