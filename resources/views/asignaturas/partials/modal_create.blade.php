<!-- Modal -->
<div class="modal fade" id="modal_crear_asignatura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Crear Asignatura</h4>
            </div>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row" id="boyd-modal">
                                <div id="message-modal-create"></div>
                                {!! Form::open(['url'=>'asignaturas/store/', 'method'=>'POST','id'=>'form-save-asignatura'])!!}
                                    @include('asignaturas.partials.fields2')
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
                <button type="button" class="btn btn-info" id="btnCreateAsignatura">Crear Asignatura</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

