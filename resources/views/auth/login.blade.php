@extends('internet.app')


@section('content')

<div class="row">
    <div class="col-lg-12">


    <div class="login-form">
        <h1>Postulante</h1>
        <div class="message"></div>
        <HR width=100% align="center ">

            @if(Session::has('message1')) 
            <div class="alert alert-danger fade in">
                <button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>
                               {{Session::get('message1')}}         </p></div>
            @elseif(Session::has('message2'))
            <div class="alert alert-success fade in">
                <button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>
                               {{Session::get('message2')}}         </p></div>
            @elseif(Session::has('message3'))
            <div class="alert alert-success fade in">
                <button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>
                               {{Session::get('message3')}}         </p></div>
            @endif

        <div class="form-group ">
            {!! Form::text('email',null,array('class' => 'form-control input_con_icono','id'=>'email','placeholder'=>'E-mail'));!!}

            <i class="glyphicon glyphicon-user"></i>
        </div>
        
        <div class="form-group log-status">
            {!! Form::password('password',array('class' => 'form-control input_con_icono','id'=>'password','placeholder'=>'Contraseña'));!!}

            <i class="glyphicon glyphicon-lock"></i>
        </div>
          


          <div class="row miRow">
            <div class="izq"><button class="button" id="irAdmin"style="vertical-align:middle"><span>Acceso admnin</span></button>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember" id="remember">Recordar</label>
                </div>
            </div>
            <div  class="der"><a class="btn-primary btn" href="#!" id='iniciarSesion'>iniciar sesión</a></div>
          </div>
        <HR width=100% align="center "> 


        <div  class="izq"><a class="link" href="#!" id="open_modal_register">Registrarse</a></div>
        <div class="der"><a class="link" href="#!" id="open_modal_password">Recuperar contraseña</a></div>



    </div>
    </div>
</div>
<div id="loading">
  <img id="loading-image"  src="{{url('img/spinner.gif')}}" alt="Loading..." />
</div>

{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
{!!Form::hidden('urlAdmin', url('picoIdea'),array('id'=>'urlAdmin'));!!}
{!!Form::hidden('urlUser', url('home'),array('id'=>'urlUser'));!!}

@include('auth.modal_register')
@include('auth.modal_password')



@endsection

@section('styles')
    {!! Html::Style('css/style_form_login.css')!!}

<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 14px;
  padding: 6px 12px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 0px;

}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>

@endsection
@section('scripts')
    <script>
        $(document).on('ready',function(){

            $('#irAdmin').on('click',function(){
                window.location.href = 'login-admin';
            });

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
                        //console.log(json);          
                        if(json.codigo == 0){
                            var html = '<div class="alert alert-danger fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('.message').html(html);
                            exit();


                        }

                        else if(json.codigo == 1 || json.codigo == 2){
                            window.location.href = $('#urlUser').val();
                        }
                        else if(json.codigo == 3){
                            var html = '<div class="alert alert-danger fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('.message').html(html);
                        }
                        
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
            $('#open_modal_register').on('click',function(){

                $('#modal_register').modal('show');
            });

            $('#registrarse').on('click',function(){

                $.ajax({
                                  
                    async : false,
                    data:$('#form-register').serialize(),
                    //Cambiar a type: POST si necesario
                    type: 'POST',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url:$('#form-register').attr('action') ,
                    beforeSend:function() {
                        $('#loading').show();
                    },
                    complete: function(){
                        $('#loading').hide();
                    },
                    success : function(json) {           
                        $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                            $('#modal_register').modal('hide'); 
                    },

                    error : function(xhr, status) {
                        var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                            for(var key in xhr.responseJSON)
                            {
                                html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                            }
                            $('.message_modal').html(html+'</div>');
                  
                    },
                    


                });
            });
            $('#open_modal_password').on('click',function(){
                $('#modal_password').modal('show');

            }); 

            $('#enviarLink').on('click',function(){
                $.ajax({
                                  
                    async : false,
                    data:$('#form-reset-password').serialize(),
                    //Cambiar a type: POST si necesario
                    type: 'POST',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url:$('#form-reset-password').attr('action') ,
                    beforeSend:function() {
                        $('#loading').show();
                    },
                    complete: function(){
                        $('#loading').hide();
                    },
                    success : function(json) {
                                           $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                            $('#modal_password').modal('hide'); 
                    },

                    error : function(xhr, status) {
                        var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                            for(var key in xhr.responseJSON)
                            {
                                html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                            }
                            $('.message_modal_password').html(html+'</div>');
                  
                    },
                    


                });

            }); 
        });
    </script>
@endsection