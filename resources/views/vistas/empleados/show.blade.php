@extends('layouts.app')

@section('title')
Detalles del Empleado
@endsection

@section('content')
<section class="section" style="margin-top: 20px;">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-user text-primary"></i> Detalles del Empleado
                        </h4>
                        <div class="card-header-action">
                            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre"><strong>Nombre:</strong></label>
                                    <p class="form-control-plaintext">{{ $empleado->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido"><strong>Apellido:</strong></label>
                                    <p class="form-control-plaintext">{{ $empleado->apellido }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dui"><strong>DUI:</strong></label>
                                    <p class="form-control-plaintext">{{ $empleado->dui }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nit"><strong>NIT:</strong></label>
                                    <p class="form-control-plaintext">{{ $empleado->nit ?: 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento"><strong>Fecha de Nacimiento:</strong></label>
                                    <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($empleado->fecha_nacimiento)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_contratacion"><strong>Fecha de Contratación:</strong></label>
                                    <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($empleado->fecha_contratacion)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="salario_base"><strong>Salario Base:</strong></label>
                                    <p class="form-control-plaintext">${{ number_format($empleado->salario_base, 2) }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="empresa"><strong>Empresa:</strong></label>
                                    <p class="form-control-plaintext">{{ $empleado->empresa->nombre }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $empleado->id }})">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function confirmDelete(id) {
        if (confirm('¿Está seguro de que desea eliminar este empleado?')) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ url("empleados") }}/' + id;
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