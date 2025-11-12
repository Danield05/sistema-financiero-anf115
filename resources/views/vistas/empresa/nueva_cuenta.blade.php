@section('modal')
<div id="nuevaCuentaModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva cuenta</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'catalogo.store', 'method'=>'POST']) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            {!! Form::text('codigo', null, [
                                'class'=>'form-control',
                                'max-length' => 50,
                                'required'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            {!! Form::text('nombre', null, [
                                'class'=>'form-control',
                                'max-length' => 75,
                                'required'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label for="nombre">Tipo</label>
                            {!! Form::select('tipo', ['1'=>'Acreedora','0'=>'Deudora', '2' => 'Patrimonio', '3' => 'Resultado'], null, 
                            [
                                'class'=>'form-control'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label for="padre">Padre</label>
                            {!! Form::text('padre', null, [
                                'class'=>'form-control',
                                'max-length' => 50
                            ]) !!}
                        </div>
                        {!! Form::hidden('empresa_id', \Illuminate\Support\Facades\Auth::user()->empresa->id, []) !!}
                        {!! Form::submit('Crear nueva cuenta', [
                            'class'=>'btn btn-success'
                        ]) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

@foreach ( $cuentas as $cuenta)
<div id="editarCuentaModal{{$cuenta->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar cuenta</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>['catalogo.update', $cuenta->id], 'method'=>'PUT']) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            {!! Form::text('codigo', $cuenta->codigo, [
                                'class'=>'form-control',
                                'max-length' => 50,
                                'required'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            {!! Form::text('nombre', $cuenta->nombre, [
                                'class'=>'form-control',
                                'max-length' => 75,
                                'required'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <select name="tipo" id="tipo" class="form-control">
                                @if ($cuenta->tipo == 1)
                                <option selected value="1">Acreedora</option>
                                <option value="0">Deudora</option>
                                <option value="2">Patrimonio</option>
                                <option value="3">Resultado</option>
                                @elseif ($cuenta->tipo == 0)
                                <option value="1">Acreedora</option>
                                <option selected value="0">Deudora</option>
                                <option value="2">Patrimonio</option>
                                <option value="3">Resultado</option>
                                @elseif ($cuenta->tipo == 2)
                                <option value="1">Acreedora</option>
                                <option value="0">Deudora</option>
                                <option selected value="2">Patrimonio</option>
                                <option value="3">Resultado</option>
                                @else
                                <option value="1">Acreedora</option>
                                <option value="0">Deudora</option>
                                <option value="2">Patrimonio</option>
                                <option selected value="3">Resultado</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="padre">Padre</label>
                            {!! Form::text('padre', $cuenta->padre, [
                                'class'=>'form-control',
                                'max-length' => 50
                            ]) !!}
                        </div>
                        {!! Form::hidden('empresa_id', \Illuminate\Support\Facades\Auth::user()->empresa->id, []) !!}
                        {!! Form::submit('Editar cuenta', [
                            'class'=>'btn btn-success'
                        ]) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endforeach

<div id="nuevaCuentaExcelModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Catalogo</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <b><p>Descargar plantilla</p></b>
                <p>Para subir el catálogo completo de la empresa, puede hacer utilizando el siguiente archivo excel y llenándolo cómo se indica.</P>
                <a href="{{URL::signedRoute('catalogo.download')}}"><button type="button" class="btn btn-success">Descargar plantilla de excel</button></a>
                <br>
                <br>
                <b><p>Subir archivo</p></b>
                    <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control-file" id="archivo" type="file" name="archivo" accept=".xlsx" required>
                        <p>Formato admitido: xlsx</p>
                        <button disabled type="Upload" class="btn btn-primary" id="botonarchivo">Guardar</button>
                    </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    $("#archivo").change(function(){

        $("#botonarchivo").prop("disabled", this.files.length == 0);
    });
</script>
@endsection