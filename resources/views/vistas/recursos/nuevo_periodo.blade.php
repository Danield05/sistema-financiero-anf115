@section('modal')
<div id="nuevoPeriodoModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva periodo</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'periodo.store', 'method'=>'POST']) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="codigo">Año</label>
                            {!! Form::number('anio', null, [
                                'min'=> '2000',
                                'max'=> '2050',
                                'class'=> 'form-control'
                            ]) !!}
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="codigo">Gasto financiero</label>
                            {!! Form::number('gasto_financiero', 0, [
                                'min'=> '0',
                                'max'=> '9999999',
                                'step' => '0.01',
                                'class'=> 'form-control',
                            ]) !!}
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="codigo">Inversion inicial</label>
                            {!! Form::number('inversion_inicial', 0, [
                                'min'=> '0',
                                'max'=> '9999999',
                                'step' => '0.01',
                                'class'=> 'form-control',
                            ]) !!}
                        </div>
                        {!! Form::hidden('empresa_id', \Illuminate\Support\Facades\Auth::user()->empresa->id, []) !!}
                        {!! Form::submit('Crear nuevo periodo', [
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
@endsection