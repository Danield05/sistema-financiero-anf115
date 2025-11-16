@extends('layouts.app')

@section('title')
Empresa
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-building text-primary"></i> Gestión de Empresas
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">
                            @include('notificador_validacion')

                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    @can('crear-empresa')
                                    <a href="{{ route('empresa.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Nueva Empresa
                                    </a>
                                    @endcan
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped" id="empresas-table" style="color: black;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Empresa</th>
                                            <th>Sector</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($empresas as $empresa)
                                            <tr>
                                                <td>{{ $empresa->nombre }}</td>
                                                <td>{{ $empresa->sector->nombre }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        @if(auth()->user()->hasRole('Administrador'))
                                                        <a href="{{ route('empresa.edit', $empresa->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>

                                                        <form action="{{ route('empresa.destroy', $empresa->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Está seguro de que desea eliminar esta empresa?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                                <i class="fas fa-trash"></i> Eliminar
                                                            </button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $empresas->links() !!}
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
        $('#empresas-table').DataTable({
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
    });
</script>
@endsection