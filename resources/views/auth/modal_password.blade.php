            
<div class="modal fade" id="modal_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Recuperar contraseña</h4>
            </div>
            <div class="modal-body">

               <div class="panel-body">
                    {!! Form::open(['url'=>'password/email', 'method'=>'POST','id'=>'form-reset-password'])!!}

    
                            <div class="message_modal_password"> </div>
                            <div class="form-group">
                                        {!! Form::text('email',null,array('class' => 'form-control','id'=>'email','placeholder'=>'E-mail'));!!}

                            </div>
                            
                    {!!Form::close()!!}
                
                    </div>
   
           
          

            </div>
            <div class="modal-footer">
                <input type="button" value="Enviar link para restablecer contraseña" id="enviarLink" class="btn btn-primary btn-block">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>