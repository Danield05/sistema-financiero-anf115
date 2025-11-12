@section('modal')
<div id="nuevoSectorModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva sector</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'sector.store', 'method'=>'POST']) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            {!! Form::text('nombre', null, [
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <fieldset>
                            <legend>Ingrese los ratios</legend>
                            <div class="form-group">
                                <label for="razon_circulante">Razon circulante</label>
                                {!! Form::number('razon_circulante', 0, [
                                    'step' => '0.01',
                                    'class'=> 'form-control',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="prueba_acida">Prueba acida</label>
                                {!! Form::number('prueba_acida', 0, [
                                    'step' => '0.01',
                                    'class'=> 'form-control',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="rotacion_inventario">Rotacion de inventario</label>
                                {!! Form::number('rotacion_inventario', 0, [
                                    'step' => '0.01',
                                    'class'=> 'form-control',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="rotacion_cuentas_por_cobrar">Rotacion de cuentas por cobrar</label>
                                {!! Form::number('rotacion_cuentas_por_cobrar', 0, [
                                    'step' => '0.01',
                                    'class'=> 'form-control',
                                    ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="grado_endeudamiento">Grado de endeudamiento</label>
                                {!! Form::number('grado_endeudamiento', 0, [
                                    'step' => '0.01',
                                    'class'=> 'form-control',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="razon_endeudamiento_patrimonial">Razon de endeudamiento patrimonial</label>
                                {!! Form::number('razon_endeudamiento_patrimonial', 0, [
                                    'step' => '0.01',
                                    'class'=> 'form-control',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="rentabilidad_neta_del_patrimonio">Rentabilidad neta del patrimonio</label>
                                {!! Form::number('rentabilidad_neta_del_patrimonio', 0, [
                                    'step' => '0.01',
                                    'class'=> 'form-control',
                                    ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="rentabilidad_del_activo">Rentabilidad del activo</label>
                                {!! Form::number('rentabilidad_del_activo', 0, [
                                    'step' => '0.01',
                                    'class'=> 'form-control',
                                    ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="rentabilidad_sobre_venta">Rentabilidad sobre venta</label>
                                {!! Form::number('rentabilidad_sobre_venta', 0, [
                                    'step' => '0.01',
                                    'class'=> 'form-control',
                                ]) !!}
                            </div>
                        </fieldset>
                        {!! Form::submit('Crear nuevo sector', [
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

    @foreach ($sectors as $sector)
        <div id="editarSectorModal{{$sector->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar sector - {{$sector->nombre}}</h5>
                        <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open([
                            'route'=>['sector.update', $sector->id], 
                            'method'=>'PUT'
                            ]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    {!! Form::text('nombre', $sector->nombre, [
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <fieldset>
                                    <legend>Ingrese los ratios</legend>
                                    <div class="form-group">
                                        <label for="razon_circulante">Razon circulante</label>
                                        {!! Form::number('razon_circulante', $sector->razon_circulante, [
                                            'step' => '0.01',
                                            'class'=> 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="prueba_acida">Prueba acida</label>
                                        {!! Form::number('prueba_acida', $sector->prueba_acida, [
                                            'step' => '0.01',
                                            'class'=> 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="rotacion_inventario">Rotacion de inventario</label>
                                        {!! Form::number('rotacion_inventario', $sector->rotacion_inventario, [
                                            'step' => '0.01',
                                            'class'=> 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="rotacion_cuentas_por_cobrar">Rotacion de cuentas por cobrar</label>
                                        {!! Form::number('rotacion_cuentas_por_cobrar', $sector->rotacion_cuentas_por_cobrar, [
                                            'step' => '0.01',
                                            'class'=> 'form-control',
                                            ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="grado_endeudamiento">Grado de endeudamiento</label>
                                        {!! Form::number('grado_endeudamiento', $sector->grado_endeudamiento, [
                                            'step' => '0.01',
                                            'class'=> 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="razon_endeudamiento_patrimonial">Razon de endeudamiento patrimonial</label>
                                        {!! Form::number('razon_endeudamiento_patrimonial', $sector->razon_endeudamiento_patrimonial, [
                                            'step' => '0.01',
                                            'class'=> 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="rentabilidad_neta_del_patrimonio">Rentabilidad neta del patrimonio</label>
                                        {!! Form::number('rentabilidad_neta_del_patrimonio', $sector->rentabilidad_neta_del_patrimonio, [
                                            'step' => '0.01',
                                            'class'=> 'form-control',
                                            ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="rentabilidad_del_activo">Rentabilidad del activo</label>
                                        {!! Form::number('rentabilidad_del_activo', $sector->rentabilidad_del_activo, [
                                            'step' => '0.01',
                                            'class'=> 'form-control',
                                            ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="rentabilidad_sobre_venta">Rentabilidad sobre venta</label>
                                        {!! Form::number('rentabilidad_sobre_venta', $sector->rentabilidad_sobre_venta, [
                                            'step' => '0.01',
                                            'class'=> 'form-control',
                                        ]) !!}
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Editar sector', [
                            'class'=>'btn btn-info'
                        ]) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection