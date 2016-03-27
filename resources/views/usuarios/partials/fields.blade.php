<div class="form-group">

    {!!  Form::label('name', ' Nombre ',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
    {!! Form::text('name',null,array('class' => 'form-control','placeholder'=>'Ej: Patricio'));!!}

    </div>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}"/>


<div class="form-group">

    {!!  Form::label('apellido_paterno', ' Apellidos ',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
    {!! Form::text('apellido_paterno',null,array('class' => 'form-control','placeholder'=>'Ej: Ulloa Molina'));!!}

    </div>
</div>

<div class="form-group">

    {!!  Form::label('email', ' E-mail ',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
    {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: patricio@gmail.com'));!!}

    </div>
</div>

<div class="form-group">

    {!!  Form::label('password_actual', ' Contraseña actual',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-4">
    {!! Form::password('password_actual',array('class' => 'form-control','id'=>'password','placeholder'=>'Contraseña'));!!}

    </div>
    <div class="col-sm6">
        <a href="" class="col-sm-3 col-sm-3 control-label"  data-toggle="modal" data-target="#moda_cambiar_contrasenia" href="#!"> Cambiar contraseña
        </a>

   

    </div>
</div>

<button type="submit" class="btn btn-primary">Guardar cambios</button>




<!-- Modal -->
<div class="modal fade" id="moda_cambiar_contrasenia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Crear ciudad</h4>
            </div>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row" id="boyd-modal">
                                <div id="message-modal-create"></div>
                                


        
                                        <div class="row mt">
                                            <div class=" col-lg-offset-1 col-lg-10">
                                  
                                         
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
                <button type="button" class="btn btn-info" id="btnCreateCiudad">Guardar ciudad</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

