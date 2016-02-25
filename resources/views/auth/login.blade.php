@extends('internet.app')

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">


    <div class="login-form">
        <h1>Login</h1>
        <div class="message"></div>
        <HR width=100% align="center "> 
        <div class="form-group ">
            {!! Form::text('email',null,array('class' => 'form-control','id'=>'email','placeholder'=>'E-mail'));!!}

            <i class="glyphicon glyphicon-user"></i>
        </div>
        
        <div class="form-group log-status">
            {!! Form::password('password',array('class' => 'form-control','id'=>'password','placeholder'=>'Contraseña'));!!}

            <i class="glyphicon glyphicon-lock"></i>
        </div>
          


          <div class="row miRow">
            <div style="float: left;">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember" id="remember">Recordar</label>
                </div>
            </div>
            <div style="float: right;"><a class="btn-primary btn" href="#" id='iniciarSesion'>iniciar sesión</a></div>
          </div>
        <HR width=100% align="center "> 


        <div style="float: left;"><a class="link" href="#">Registrarse</a></div>
        <div style="float: right;"><a class="link" href="#">Recuperar contraseña</a></div>



    </div>
        

    </div>
</div>

{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}



@endsection

@section('styles')
    {!! Html::Style('css/style_form_login.css')!!}
@endsection
@section('scripts')
    <script>
        $(document).on('ready',function(){

            $('#iniciarSesion').on('click',function(){
                $.ajax({
                                  
                    async : false,
                    data:{
                        _token: $('#_token').val(),
                        email: $('#email').val(),
                        password: $('#password').val(),
                        remember: $('#remember:checked').val(),

                    },
                    //Cambiar a type: POST si necesario
                    type: 'POST',
                    // Formato de datos que se espera en la respuesta
                
                    // URL a la que se enviará la solicitud Ajax
                    url:$('#getUrlDestroyCursoHomologado').val() ,
                    success : function(json) {           
                 
                        
                    },

                    error : function(xhr, status) {
                        var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                            for(var key in xhr.responseJSON)
                            {
                                html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                            }
                            $('.message').html(html+'</div>');
                  
                    },
                    


                });

            });
        });
    </script>
@endsection