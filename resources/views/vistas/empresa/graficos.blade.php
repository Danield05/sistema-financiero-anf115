@extends('layouts.app')

@section('title')
Graficos de cuentas
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-chart-bar text-primary"></i> Gráficas de Cuentas
                            </h4>
                        </div>
                        <div class="card-body" style="min-height: 400px;">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="graficos-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuentas as $cuenta)
                                            <tr>
                                                <td><code>{{$cuenta->codigo}}</code></td>
                                                <td><strong>{{$cuenta->nombre}}</strong></td>
                                                <td>
                                                    <a href="{{ route('graficoDeCuenta', $cuenta->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fas fa-chart-bar"></i> Ver Gráfico
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center flex-wrap mt-3">
                                <div class="mx-2 mb-2">
                                    <a href="{{ route('catalogo.index') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-list"></i> Catálogo de Cuentas
                                    </a>
                                </div>
                                <div class="mx-2 mb-2">
                                    <a href="{{route('vinculacion.index')}}" class="btn btn-success btn-sm">
                                        <i class="fas fa-link"></i> Relacionar Cuentas
                                    </a>
                                </div>
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
        $('#graficos-table').DataTable({
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