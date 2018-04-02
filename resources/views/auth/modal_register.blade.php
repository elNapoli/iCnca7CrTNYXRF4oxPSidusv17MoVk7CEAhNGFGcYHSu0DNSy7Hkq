            
<div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Regístrate</h4>
            </div>
            <div class="modal-body">
            <div class="modal-header">
            <p style=";border-radius: 25px; border: 2px solid #35DDA8; padding: 20px;">La OME te da la bienvenida a la plataforma de postulación, si eres alumno UACh,
                del extranjero o nacional, y deseas postular al programa de Intercambio de la
                Universidad Austral de Chile, regístrate, crea tu usuario y contraseña e inicia el
                proceso de postulación en línea. Recuerda que antes debes infórmate acerca de cada
                proceso, sus requisitos y fechas de postulación.</p></div>

               <div class="panel-body">
                    {!! Form::open(['url'=>'auth/register', 'method'=>'POST','id'=>'form-register'])!!}

    
                            <div class="message_modal"> </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('name',null,array('class' => 'form-control','id'=>'name','placeholder'=>'Nombres'));!!}
                                  
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('apellido_paterno',null,array('class' => 'form-control','id'=>'apellido_paterno','placeholder'=>'Apellidos'));!!}

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                        {!! Form::text('email',null,array('class' => 'form-control','id'=>'email','placeholder'=>'E-mail'));!!}

                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::password('password',array('class' => 'form-control','id'=>'password','placeholder'=>'Contraseña'));!!}

                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::password('password_confirmation',array('class' => 'form-control','id'=>'password_confirmation','placeholder'=>'Repita contraseña'));!!}

                                    </div>
                                </div>
                            </div>
                            
                    {!!Form::close()!!}
                
                    </div>
   
           
          

            </div>
            <div class="modal-footer">
                <input type="button" value="Registrarte" id="registrarse" class="btn btn-primary btn-block">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>