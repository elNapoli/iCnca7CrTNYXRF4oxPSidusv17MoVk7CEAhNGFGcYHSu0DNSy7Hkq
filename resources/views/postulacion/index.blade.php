@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')


    <div id="wizard">
        <div id="message"></div>
        <h3>Async @yield('nombre')</h3>
        <section data-mode="async" data-ajax="true" data-url="{{url('postulacion/create-or-edit')}}">

        </section>
        <h3>Second Step</h3>
        <section>
            <p>Donec mi sapien, hendrerit nec egestas a, rutrum vitae dolor. Nullam venenatis diam ac ligula elementum pellentesque. 
                In lobortis sollicitudin felis non eleifend. Morbi tristique tellus est, sed tempor elit. Morbi varius, nulla quis condimentum 
                dictum, nisi elit condimentum magna, nec venenatis urna quam in nisi. Integer hendrerit sapien a diam adipiscing consectetur. 
                In euismod augue ullamcorper leo dignissim quis elementum arcu porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Vestibulum leo velit, blandit ac tempor nec, ultrices id diam. Donec metus lacus, rhoncus sagittis iaculis nec, malesuada a diam. 
                Donec non pulvinar urna. Aliquam id velit lacus.</p>
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

                    if($('#wizard input#tipo_estudio_2').attr('checked') === 'checked'){
                        $('#div_titulo_profesional').show('slide',1000);
                        $('#tipo_estudio_1').removeClass('1check');
                    }

                    if($('#wizard input#tipo_estudio_1').attr('checked') === 'checked' && $('#wizard input#procedencia_2').attr('checked') == 'checked'){
                        $('#procedencia_2').addClass('1check');
                        $('#preUach').show('slide',1000);
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


            selectByTabs("section.current",'#continente','#_token','#getUrlPaisByContinente','#pais');
            selectByTabs("section.current",'#pais','#_token','#getUrCiudadContinente','.ciudad');


 
        }); 


                    
     
    </script>
   
@endsection


@section('styles')
    {!! Html::Style('plugins/jquery-steps/css/jquery.steps.css')!!}



@endsection
