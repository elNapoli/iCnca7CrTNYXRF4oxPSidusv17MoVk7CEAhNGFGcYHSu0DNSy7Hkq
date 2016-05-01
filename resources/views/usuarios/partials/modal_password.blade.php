<!-- Modal -->
<div class="modal fade form-horizontal style-form" id="moda_cambiar_contrasenia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cambiar Contraseña</h4>
            </div>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row" id="boyd-modal">
                                <div id="message-modal-create"></div>
                                


        
                                        <div class="row mt">
                                            <div class=" col-lg-offset-1 col-lg-10">
                                                        <div class="message-modal-change-password">
                                                            
                                                        </div>
                                                        {!! Form::open(['url'=>'change-password/', 'method'=>'POST','id'=>'form-change-password'])!!}


                                                                <div class="form-group">

                                                                    {!!  Form::label('password_actual', ' Contraseña actual',array('class'=>'col-sm-3 col-sm-3 control-label'))!!}
                                                                    <div class="col-sm-9">
                                                                    {!! Form::password('password_actual',array('class' => 'form-control','id'=>'password','placeholder'=>'Contraseña'));!!}

                                                                    </div>
                                                 
                                                                </div>

                                                                <div class="form-group">

                                                                    {!!  Form::label('password', ' Contraseña ',array('class'=>'col-sm-3 col-sm-3 control-label'))!!}
                                                                    <div class="col-sm-9">
                                                                    {!! Form::password('password',array('class' => 'form-control','id'=>'password','placeholder'=>'Contraseña'));!!}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">

                                                                    {!!  Form::label('password_confirmation', ' Repita contraseña',array('class'=>'col-sm-3 col-sm-3 control-label'))!!}
                                                                    <div class="col-sm-9">
                                                                    {!! Form::password('password_confirmation',array('class' => 'form-control','id'=>'password','placeholder'=>'Repita  contraseña'));!!}

                                                                    </div>
                                                                </div>
                                                     
                                                            {!!Form::close()!!}
                                            </div><!-- col-lg-12-->         
                                        </div><!-- /row -->                                
                             
                         
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
                <button type="button" class="btn btn-info" id="btnChangePassword">Guardar ciudad</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

