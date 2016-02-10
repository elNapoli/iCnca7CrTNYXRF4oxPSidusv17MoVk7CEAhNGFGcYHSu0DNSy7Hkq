@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')

    <div id="wizard">
        <div id="message"></div>

        <h1>Datos Personales</h1>
        <section >
            @include('postulacion.partials.datos_personales')

            {!!Form::hidden('getUrCiudadContinente', url('ciudades/ciudad-by-pais'),array('id'=>'getUrCiudadContinente'));!!}
            {!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
            {!!Form::hidden('getUrlPostulanteExiste', url('postulacion/postulante-by-user'),array('id'=>'getUrlPostulanteExiste'));!!}       

        </section>

        <h1>Estudios</h1>
        <section>
            @include('postulacion.partials.estudios')
           
        </section>

        <h1>Información de Intercambio</h1>
        <section>
            @include('postulacion.partials.intercambio')
        </section>

        <h1>Declaración</h1>
        <section>
            @include('postulacion.partials.declaracion')
        </section>
    </div>

     {!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection


@section('scripts')
    {!! Html::Script('plugins/jquery-steps/js/jquery.steps.js')!!}
    {!! Html::Script('plugins/bootstrap/js/bootstrap-datepicker.js')!!}
    <script>
        $(document).on('ready',function() {
            $("#wizard").steps({
                headerTag: "h1",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                onInit:function (event, currentIndex) { 
                    $.ajax({
                      // En data puedes utilizar un objeto JSON, un array o un query string
                        data:{_token:$('#getToken').val()},
                        async : false,
                         
                        //Cambiar a type: POST si necesario
                        type: "post",
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url:$(".current").find('#getUrlPostulanteExiste').val(),
                        success : function(json) {   
                            if(json.codeError){
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#apellido_paterno').val(json.postulante.apellido_paterno);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#apellido_materno').val(json.postulante.apellido_materno);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#nombre').val(json.postulante.nombre);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.input-group input#fecha_nacimiento').val(json.postulante.fecha_nacimiento);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#email_personal').val(json.postulante.email_personal);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#telefono').val(json.postulante.telefono); 
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#direccion').val(json.postulante.direccion); 

                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group select#continente').val(json.postulante.ciudad_r.pais_r.continente);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group select#tipo').val(json.documento_identidad.tipo);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#numero').val(json.documento_identidad.numero);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#nacionalidad').val(json.postulante.nacionalidad);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#lugar_nacimiento').val(json.postulante.lugar_nacimiento);
                                $('section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input#lugar_nacimiento').val(json.postulante.lugar_nacimiento);
                  
                                $("section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group input[name=sexo][value='"+json.postulante.sexo+"']").prop("checked",true);
                                 selectByTabsSinAccion("section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group",'#getToken','#getUrlPaisByContinente','#pais',json.postulante.ciudad_r.pais_r.continente,json.postulante.ciudad_r.pais);

                                 selectByTabsSinAccion("section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group",'#getToken','#getUrCiudadContinente','#ciudad',json.postulante.ciudad_r.pais,json.postulante.ciudad);



                            };
                            
                        },

                        error : function(xhr, status) {
                            alert(status);
                      
                        },
                                
                   

                    }); 

                },
                onStepChanging:function (event, currentIndex, newIndex) { 
                
                    var data = $(".current").find('input,select,textarea,.tEstudioInput_').serialize();
                    var url  = $(".current").find('#urlStoreInformacion').val();
                    if (currentIndex < newIndex){


                       
                        var respuestaAjax = $.ajax({
                              // En data puedes utilizar un objeto JSON, un array o un query string
                                data: data,
                                async : false,
                                 
                                //Cambiar a type: POST si necesario
                                type: "post",
                                // Formato de datos que se espera en la respuesta
                                dataType: "json",
                                // URL a la que se enviará la solicitud Ajax
                                url:url ,
                                success : function(json) {   
                                    //alert("ho");
                                    $('#message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');
                                    $("html, body").animate({ scrollTop: 0 }, 600);
                             
                                    
                                },

                                error : function(xhr, status) {
                                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                                    for(var key in xhr.responseJSON)
                                    {
                                        html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                                    }
                                    $('#message').html(html+'</div>');
                                    $("html, body").animate({ scrollTop: 0 }, 600);
                              
                                },
                                
                   

                            });

                        if(respuestaAjax.status == 200){
              

                            return true;
                        }
                        else{

                            return false;

                        }
                      
                    }
                   
                    else{return true;}                              
                }   

            });

           
            // pestaña 1: wizard-p-0
            $('.datePicker').datepicker({

                autoclose:true,
                format:'yyyy/mm/dd',

            });
            selectByTabs("section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group ",'#continente','#getToken','#getUrlPaisByContinente','#pais');
            selectByTabs("section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group ",'#pais','#getToken','#getUrCiudadContinente','.ciudad');
        
            $('#wizard').on('change','input[type=radio]',function(){
                
                if($(this).val()==='UACH'){
                     var options = {};
                    $('#preUach').show('slide',1000);
                }
                else{

                    $('#preUach').hide('slide',1000);

                }
            });




        }); 


                    
     
    </script>
   
@endsection


@section('styles')
    {!! Html::Style('plugins/jquery-steps/css/jquery.steps.css')!!}



@endsection
