@extends('layouts.app')

@section('title')
Vinculacion de cuentas
@endsection

@section('js')
<script src=" {{asset('js/buscador.js')}} " defer></script>
<script>
    function actualizarCodigo(cuentas,inputCuenta,labelCodigo){
        nombreCuenta=document.getElementById(inputCuenta).value.toString();
        var objetoCuenta = cuentas.filter(function(objetoCuenta) {
            return objetoCuenta.nombre === nombreCuenta;
        });
        let codigo = objetoCuenta[0].codigo;
        document.getElementById(labelCodigo).innerHTML=codigo;
    }
</script>
@endsection

@section('content')
    <section class="section" style="margin-top: 20px;">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-link text-primary"></i> Vinculación de Cuentas
                            </h4>
                        </div>
                        <div class="card-body">

                            @include('notificador_validacion')

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped" id="vinculacion-table" style="color: black;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cuenta de la empresa</th>
                                            <th>Código</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                <tbody>

                                    @php
                                        use App\Models\cuenta;
                                    @endphp

                                    @foreach ($cuenta_sistemas as $cuenta_sistema)

                                    @php
                                        $vinculacions = $cuenta_sistema->vinculacion;
                                        $v_cuenta_id = null;
                                        $cuenta_nombre = '';
                                        $v_cuenta_empresa = '';
                                        $cuenta_s = '';
                                        foreach ($vinculacions as $key => $value) {
                                            $v_cuenta_id = $value['cuenta_id'];
                                        }

                                        // echo var_dump($v_cuenta_id);     
                                        
                                        if($v_cuenta_id != null){
                                            $cuenta_s = cuenta::find($v_cuenta_id);
                                            $v_cuenta_empresa = $cuenta_s->empresa_id;
                                            $cuenta_nombre = $cuenta_s->nombre;
                                            $cuenta_codigo = $cuenta_s->codigo;
                                        }

                                    @endphp

                                    {!! Form::open() !!}
                                    <tr>
                                        <td style="color: black;">
                                            {{$cuenta_sistema->nombre}}
                                            {!! Form::hidden('cuenta_sistema_id', $cuenta_sistema->id, []) !!}
                                            {!! Form::hidden('empresa_id', \Illuminate\Support\Facades\Auth::user()->empresa->id, []) !!}
                                        </td>
                                        <td>
                                            {{-- {!! Form::text('cuenta_id', null, [
                                                'autocomplete' => 'off',
                                                'id' => 'search'.$cuenta_sistema->id,
                                                'class' => 'form-control',
                                                'placeholder' => 'Cuenta de la empresa',
                                                'onclick' => "ejecutarBuscador({{$cuentas}},'nombre' ,'buscador{{$cuenta_sistema->id}}')"
                                                //'onclick' => 'console.log(' . $cuentas . ');'
                                            ]) !!} --}}

                                            @if ($cuenta_nombre != null && $v_cuenta_empresa == \Illuminate\Support\Facades\Auth::user()->empresa->id )
                                            {{-- <input autocomplete="off" sistema="{{$cuenta_sistema->id}}" id="buscador{{$cuenta_sistema->id}}" class="form-control econoscope_cuenta" name="cuenta" placeholder="Digite la cuenta a vincular con {{$cuenta_sistema->nombre}}" onclick="ejecutarBuscador({{$cuentasa}},'nombre' ,'buscador{{$cuenta_sistema->id}}')" value="{{$cuenta_nombre}}">
                                            @else
                                            <input autocomplete="off" sistema="{{$cuenta_sistema->id}}" id="buscador{{$cuenta_sistema->id}}" class="form-control econoscope_cuenta" name="cuenta" placeholder="Digite la cuenta a vincular con {{$cuenta_sistema->nombre}}" onclick="ejecutarBuscador({{$cuentasa}},'nombre' ,'buscador{{$cuenta_sistema->id}}')"> --}}
                                            <input autocomplete="off" sistema="{{$cuenta_sistema->id}}" id="buscador{{$cuenta_sistema->id}}" class="form-control econoscope_cuenta" name="cuenta" placeholder="Digite la cuenta a vincular con {{$cuenta_sistema->nombre}}" onclick="ejecutarBuscador({{$cuentasa}},'nombre' ,'buscador{{$cuenta_sistema->id}}')" value="{{$cuenta_nombre}}" onchange="actualizarCodigo({{$cuentasa}},'buscador{{$cuenta_sistema->id}}')" style="color: black !important;">
                                            </td>
                                            <td>
                                                <label class="form-control" id="codigo_cuenta_empresa{{$cuenta_sistema->id}}" style="color: black !important;">{{$cuenta_codigo}}</label>
                                            </td>
                                            @else
                                            <input autocomplete="off" sistema="{{$cuenta_sistema->id}}" id="buscador{{$cuenta_sistema->id}}"class="form-control econoscope_cuenta" name="cuenta" placeholder="Digite la cuenta a vincular con {{$cuenta_sistema->nombre}}" onclick="ejecutarBuscador({{$cuentasa}},'nombre' ,'buscador{{$cuenta_sistema->id}}')" onchange="actualizarCodigo({{$cuentasa}},'buscador{{$cuenta_sistema->id}}','codigo_cuenta_empresa{{$cuenta_sistema->id}}')" style="color: black !important;">
                                            </td>
                                            <td>
                                                <label class="form-control" id="codigo_cuenta_empresa{{$cuenta_sistema->id}}" style="color: black !important;"></label>
                                            </td>
                                            @endif

                                            {{-- <input autocomplete="off" id="buscador{{$cuenta_sistema->id}}" class="form-control" name="cuenta" placeholder="Digite la cuenta a vincular con {{$cuenta_sistema->nombre}}" onclick="ejecutarBuscador({{$cuentasa}},'nombre' ,'buscador{{$cuenta_sistema->id}}')"> --}}

                                            {{-- {{$v_cuenta_empresa}}
                                            {{$cuenta_s}} --}}
                                        {{-- </td>
                                        <td>
                                            <label class="form-control" id="codigo_cuenta_empresa{{$cuenta_sistema->id}}">
                                        </td> --}}
                                        <td class="index-botones">

                                            {!! Form::submit('Guardar', [
                                                'class' => 'btn btn-info'
                                            ]) !!}
                                            {!! Form::close() !!}

                                            {{-- <a class="btn btn-danger">Eliminar</a> --}}

                                            @if ($cuenta_nombre != null && $v_cuenta_empresa == \Illuminate\Support\Facades\Auth::user()->empresa->id)
                                            {!! Form::open(['method'=>'DELETE', 'route' => ['vinculacion.destroy', $v_cuenta_id]]) !!}
                                            {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <button onclick="guardar()" class="btn btn-success">
                                    <i class="fas fa-save"></i> Guardar todos
                                </button>
                                <div class="d-flex justify-content-center flex-wrap">
                                    <div class="mx-2 mb-2">
                                        <a href="{{ route('catalogo.index') }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-list"></i> Catálogo de Cuentas
                                        </a>
                                    </div>
                                    <div class="mx-2 mb-2">
                                        <a href="{{ route('graficos.index') }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-chart-bar"></i> Gráficas
                                        </a>
                                    </div>
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
        $('#vinculacion-table').DataTable({
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
<script src="{{asset('js/vinculacion.js')}}" defer></script>
@endsection