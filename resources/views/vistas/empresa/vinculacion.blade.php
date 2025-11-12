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
    <section class="section">
        <div class="section-header" style="display:grid;grid-template-columns: repeat(3, 1fr);text-align:center;padding:5px 10px;">
            <div style="padding: 0px 0px 10px 10px">
                <a href="{{ route('catalogo.index') }}" class="ag-courses-item_link"style=" border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Catalogo de cuentas</div>
                </a>
            </div>
            <div style="padding: 0px 0px 10px 10px">                
                <a href="{{route('vinculacion.index')}}" class="ag-courses-item_link"style=" background-color:#212e37;border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Relacionar cuentas</div>
                </a>
            </div>
            <div style="padding: 0px 0px 10px 10px">                
                <a href="{{ route('graficos.index') }}" class="ag-courses-item_link"style=" border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Gráficas</div>
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @include('notificador_validacion')

                            <table class="table table-striped-columns">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Cuenta de la empresa</th>
                                    <th>Código</th>
                                    <th>Acciones</th>
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
                                        <td>
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
                                            <input autocomplete="off" sistema="{{$cuenta_sistema->id}}" id="buscador{{$cuenta_sistema->id}}" class="form-control econoscope_cuenta" name="cuenta" placeholder="Digite la cuenta a vincular con {{$cuenta_sistema->nombre}}" onclick="ejecutarBuscador({{$cuentasa}},'nombre' ,'buscador{{$cuenta_sistema->id}}')" value="{{$cuenta_nombre}}" onchange="actualizarCodigo({{$cuentasa}},'buscador{{$cuenta_sistema->id}}')">
                                            </td>
                                            <td>
                                                <label class="form-control" id="codigo_cuenta_empresa{{$cuenta_sistema->id}}">{{$cuenta_codigo}}</label>
                                            </td>
                                            @else
                                            <input autocomplete="off" sistema="{{$cuenta_sistema->id}}" id="buscador{{$cuenta_sistema->id}}"class="form-control econoscope_cuenta" name="cuenta" placeholder="Digite la cuenta a vincular con {{$cuenta_sistema->nombre}}" onclick="ejecutarBuscador({{$cuentasa}},'nombre' ,'buscador{{$cuenta_sistema->id}}')" onchange="actualizarCodigo({{$cuentasa}},'buscador{{$cuenta_sistema->id}}','codigo_cuenta_empresa{{$cuenta_sistema->id}}')">
                                            </td>
                                            <td>
                                                <label class="form-control" id="codigo_cuenta_empresa{{$cuenta_sistema->id}}"></label>
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

                            <br>
                            <button onclick="guardar()" class="btn btn-primary">Guardar todos</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{asset('js/vinculacion.js')}}" defer></script>
@endsection