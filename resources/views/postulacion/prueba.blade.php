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
                onStepChanging:function (event, currentIndex, newIndex) { 
                
                    var data = $(".current").find('input,select,textarea,.tEstudioInput_').serialize();
                    var url  = $(".current").find('#urlStoreInformacion').val();
                    $.ajax({
                          // En data puedes utilizar un objeto JSON, un array o un query string
                        data: data,

                         
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
                            return true;
                               
                            
                        },

                        error : function(xhr, status) {

                            var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                            for(var key in xhr.responseJSON)
                            {
                                html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                            }
                            $('#message').html(html+'</div>');
                            $("html, body").animate({ scrollTop: 0 }, 600);
                                return true; 

                      
                        },
                            /*var id;
                            $(".active input").each(function(e){    
                              id = this.id;
                              // show id 
                              console.log("#"+id);
                              // show input value 
                              console.log(this.value);
                              // disable input if you want
                              //$("#"+id).prop('disabled', true);
                            });*/

                    });
                }

            });


            // pestaña 1: wizard-p-0
            $('.datePicker').datepicker({

                autoclose:true,
                format:'yyyy/mm/dd',

            });
            selectByTabs("wizard",'continente','getToken','getUrlPaisByContinente','#pais','section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group select');
            selectByTabs("wizard",'pais','getToken','getUrCiudadContinente','.ciudad','section#wizard-p-0 div.panel-body div.col-lg-6 div.form-group select');
        
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
