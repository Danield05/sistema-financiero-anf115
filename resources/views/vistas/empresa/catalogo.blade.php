@extends('layouts.app')

@section('title')
Catalogo de cuentas
@endsection

@section('content')
    <section class="section">
        <div class="section-header" style="display:grid;grid-template-columns: repeat(3, 1fr);text-align:center;padding:5px 10px;">
            <div style="padding: 0px 0px 10px 10px">
                <a href="{{ route('catalogo.index') }}" class="ag-courses-item_link"style=" background-color:#212e37;border-radius: 28px;">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Catalogo de cuentas</div>
                </a>
            </div>
            <div style="padding: 0px 0px 10px 10px">                
                <a href="{{route('vinculacion.index')}}" class="ag-courses-item_link"style=" border-radius: 28px;">
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
                            @if($errors->any())
                            <h5 style="color:red">Errores encontrados en el archivo excel. Verifique los datos del archivo.</h5>
                            @endif


                            @if($confirmar == 0)
                            <a class="btn btn-warning mg_abajo_15" id="cuenta" data-toggle="modal" data-target="#nuevaCuentaModal">Nueva cuenta</a>
                            <a class="btn btn-warning mg_abajo_15" data-toggle="modal" data-target="#nuevaCuentaExcelModal">Catalogo Excel</a>
                            @else
                            @endif

                            <table class="table table-striped-columns">
                                <thead>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Padre</th>
                                    <th>Tipo</th>
                                    @if($confirmar == 0)
                                    <th>Acciones</th>
                                    @else
                                    @endif
                                </thead>
                                <tbody>
                                    @foreach ($cuentas as $cuenta)
                                        <tr>
                                            <td> {{$cuenta->codigo}} </td>
                                            <td> {{$cuenta->nombre}} </td>
                                            <td> {{$cuenta->padre}} </td>
                                            <td> 
                                                @if ($cuenta->tipo == 0)
                                                Deudora
                                                @elseif($cuenta->tipo == 1)
                                                Acreedora
                                                @elseif($cuenta ->tipo == 2)
                                                Patrimonio
                                                @else
                                                Resultado
                                                @endif 
                                            </td>
                                            @if($confirmar == 0)
                                            <td class="index-botones">

                                                <a class="btn btn-info" data-toggle="modal" data-target="#editarCuentaModal{{$cuenta->id}}">Editar</a>

                                                {!! Form::open(['method'=>'DELETE', 'route' => ['catalogo.destroy', $cuenta->id]]) !!}
                                                {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            @else
                                           @endif 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                        <div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('vistas.empresa.nueva_cuenta')

@section('scripts')
{{-- <script >
    $('#excel').click(function(){
        $('#nuevaCuentaExcelModal').modal('show');
    })
</script>--}}
@endsection