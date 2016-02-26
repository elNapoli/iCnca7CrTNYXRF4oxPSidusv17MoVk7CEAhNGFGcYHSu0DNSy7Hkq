<!-- Modal -->
<div class="modal fade" id="modal_edit_departamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Editar departamento</h4>
            </div>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row" id="boyd-modal">
                                <div id="message-modal-edit"></div>
                                {!! Form::open(['url'=>'departamentos/edit/', 'method'=>'POST','id'=>'form-edit-departamento'])!!}


                                    @include('departamentos.partials.fields3')
                                {!!Form::close()!!}


          
                                    
                             
                         
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnUpdateDepartamento">Guardar departamento</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->