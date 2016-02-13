@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')


    <div id="wizard">
        <div id="message"></div>
        <h3>Datos personales</h3>
        <section data-mode="async" data-ajax="true" data-url="{{url('postulacion/create-or-edit')}}">

        </section>
        <h3>Estudios actuales</h3>
       
        <section data-mode="async" data-ajax="true" data-url="{{url('estudo-actual/create-or-edit')}}">
  
        </section>
        <h3>Third Step</h3>
        <section>
            <p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo, 
                pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat. 
                Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris 
                venenatis.</p>
        </section>
        <h3>Fourth Step</h3>
        <section>
            <p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
        </section>
    </div>


@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection



@section('scripts')
    {!! Html::Script('plugins/jquery-steps/js/jquery.steps.js')!!}

    <script>
        $(document).on('ready',function() {

            $("#wizard").steps({
                headerTag: "h3",
                bodyTag: "section",
          
                startIndex:1,

                transitionEffect: "slideLeft",
                /* Labels */
                labels: {
                    cancel: "Cancelar",
                    current: "current step:",
                    pagination: "Pagination",
                    finish: "Finalizar",
                    next: "Siguiente",
                    previous: "Anterior",
                    loading: "Cargando ..."
                },
                onContentLoaded:function (event, currentIndex) {

                    switch (currentIndex) {
                        case 0:
                            if($('#wizard input#tipo_estudio_1').attr('checked') === 'checked'){
                            
                                $('#tipo_estudio_1').addClass('1check');
                            }
                            if($('#wizard input#tipo_estudio_2').attr('checked') === 'checked'){
                                $('#div_titulo_profesional').show('slide',1000);
                                $('#tipo_estudio_1').removeClass('1check');
                            }

                            if($('#wizard input#procedencia_2').attr('checked') == 'checked')

                            {
                                $('#procedencia_2').addClass('1check');

                                if($('#wizard input#tipo_estudio_1').attr('checked') === 'checked'){
                                    $('#preUach').show('slide',1000);
                                }
                                
                            }

                            break;
                        case 1:
                            if($('#procedencia').val() === 'UACH'){
                                $('#preUachEstudio').show('slide',1000);
                                $('#infoExtraEstudioUACH').show('slide',1000);


                                selectByTabsSinAccion("section#wizard-p-1",'#_token','#getUrlPaisByContinente','#pais',$('section#wizard-p-1 #continente').val(),$('section#wizard-p-1 #pais_id').val());
                                selectByTabsSinAccion("section#wizard-p-1",'#_token','#getCampusByPais','#campus_sede',$('section#wizard-p-1 #pais_id').val(),$('section#wizard-p-1 #campus_sede_id').val());
                                selectByTabsSinAccion("section#wizard-p-1",'#_token','#getUrlFacultadByCampus','#facultad',$('section#wizard-p-1 #campus_sede').val(),$('section#wizard-p-1 #facultad_id').val());
                                selectByTabsSinAccion("section#wizard-p-1",'#_token','#getUrlCarreraByFacultad','#carrera',$('section#wizard-p-1 #facultad').val(),$('section#wizard-p-1 #carrera_id').val());


                                $('section#wizard-p-1').on('change','#carrera',function(){
                                  
                                var idCarrera = $(this).val();
                                    $.ajax({
                                      // En data puedes utilizar un objeto JSON, un array o un query string
                                        data: {_token: $('#_token').val() , id:idCarrera},
                                        async : false,
                                         
                                        //Cambiar a type: POST si necesario
                                        type: 'get',
                                        // Formato de datos que se espera en la respuesta
                                        dataType: "json",
                                        // URL a la que se enviará la solicitud Ajax
                                        url:$('#getUrlDirectorCarrera').val() ,
                                        success : function(json) {   
                                            
                                            $('section#wizard-p-1 #director').val(json.director);
                                            $('section#wizard-p-1 #email').val(json.email);
                                            
                                        },

                                        error : function(xhr, status) {
                                            alert(status);
                                      
                                        },                   

                                    });
                                });

                            }


                    }
          

                    
                },

                onStepChanging:function (event, currentIndex, newIndex) { 
                    

                    var data = $(".current").find('input,select,textarea,.tEstudioInput_').serialize();
                    var url  = $(".current").find('#form-postulacion-active').attr('action');
                    if (currentIndex < newIndex){


                       
                        var respuestaAjax = $.ajax({
                              // En data puedes utilizar un objeto JSON, un array o un query string
                                data: data,
                                async : false,
                                 
                                //Cambiar a type: POST si necesario
                                type: $(".current").find('#form-postulacion-active').attr('method'),
                                // Formato de datos que se espera en la respuesta
                                dataType: "json",
                                // URL a la que se enviará la solicitud Ajax
                                url:url ,
                                success : function(json) {   
                                    //alert("ho");
                                    $('#message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');
                                   // $("html, body").animate({ scrollTop: 0 }, 600);
                             
                                    
                                },

                                error : function(xhr, status) {
                                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                                    for(var key in xhr.responseJSON)
                                    {
                                        html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                                    }
                                    $('#message').html(html+'</div>');
                                    //$("html, body").animate({ scrollTop: 0 }, 600);
                              
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


            //##################################### ACIONES DE LA PESTAÑA 1################################
            $('#wizard').on('change','input[name=tipo_estudio]',function(){
                        
                if($(this).val()==='Postgrado'){
                    $('#div_titulo_profesional').show('slide',1000);
                    $('#tipo_estudio_1').removeClass('1check');
                        $('#preUach').hide('slide',1000);

                   
      

                }
                else{

                    $('#div_titulo_profesional').hide('slide',1000);
                    $('#tipo_estudio_1').addClass('1check');
                    if($('#procedencia_2').attr('class') ==='1check'){

                        $('#preUach').show('slide',1000);

                    }



                }
            });
            $('#wizard').on('change','input[name=procedencia]',function(){
                if($(this).val()==='UACH'){

                    $('#procedencia_2').addClass('1check');
                    if($('#tipo_estudio_1').attr('class') ==='1check'){

                        $('#preUach').show('slide',1000);
                        
                    }
                }
                else{

                    $('#preUach').hide('slide',1000);
                    $('#procedencia_2').removeClass('1check');



                }
            });
            selectByTabs("section#wizard-p-0",'#continente','#_token','#getUrlPaisByContinente','#pais');
            selectByTabs("section#wizard-p-0",'#pais','#_token','#getUrCiudadContinente','.ciudad');

            //##################################### ACIONES DE LA PESTAÑA 2################################
            selectByTabs("section#wizard-p-1",'#continente','#_token','#getUrlPaisByContinente','#pais');
            selectByTabs("section#wizard-p-1",'#pais','#_token','#getCampusByPais','#campus_sede');
            selectByTabs("section#wizard-p-1",'#campus_sede','#_token','#getUrlFacultadByCampus','#facultad');
            selectByTabs("section#wizard-p-1",'#facultad','#_token','#getUrlCarreraByFacultad','#carrera');

 
        }); 


                    
     
    </script>
   
@endsection


@section('styles')
    {!! Html::Style('plugins/jquery-steps/css/jquery.steps.css')!!}



@endsection
