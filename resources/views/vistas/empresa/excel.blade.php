@section('modal')
<div id="nuevaCuentaExcelModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Catalogo</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
            <a href="{{URL::signedRoute('catalogo.download')}}" class="btn btn-primary">Presione aqui para descargar plantilla</a>
                                <p>Formato admitido: xlsx</p>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input class="form-control-file" id="archivo" type="file" name="archivo" accept=".xlsx" required>
                                            <button disabled type="Upload" class="btn btn-primary" id="botonarchivo">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                    </div>
                </div>
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