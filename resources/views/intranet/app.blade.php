<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>OME - @yield('title','Home')</title>

    <!-- Bootstrap core CSS -->
        {!! Html::Style('plugins/theme_intranet/css/bootstrap.css')!!}

    <!--external css-->
    {!! Html::Style('plugins/theme_intranet/font-awesome/css/font-awesome.css')!!}
    {!! Html::Style('plugins/theme_intranet/css/zabuto_calendar.css')!!}
    {!! Html::Style('plugins/theme_intranet/js/gritter/css/jquery.gritter.css')!!}
    {!! Html::Style('plugins/theme_intranet/lineicons/style.css')!!}
    {!! Html::Style('css/style_form_login.css')!!}
    {!! Html::Style('plugins/dataTables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')!!}
  
    {!! Html::Style('plugins/jquery-ui/jquery-ui.css')!!}
    <link href="{{ asset('css/forum.css') }}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    {!! Html::Style('plugins/theme_intranet/css/style.css')!!}
    {!! Html::Style('plugins/theme_intranet/css/style-responsive.css')!!}


    {!! Html::Script('plugins/theme_intranet/js/chart-master/Chart.js') !!}
    @yield('styles')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


  <section id="container" >
    @include('documentoIdentidad.modal_documento_identidad')

    @include('intranet.header') 
    @if(Auth::user()->tipo_usuario == 'administrador')
        @include('intranet.sidebar_left_admin')
    @elseif(Auth::user()->tipo_usuario == 'usuario')
        @include('intranet.sidebar_left_user')
    @endif


    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-12 main-chart">
                @yield('content')

                </div><!-- /col-lg-9 END SECTION MIDDLE -->
              
         
          
            </div>
        </section>
    </section>

      <!--main content end-->
      <!--footer start-->
      @include('partials.loading')
    {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
    {!!Form::hidden('urlGenerarMenus',url('home/generar-menus'),array('id'=>'urlGenerarMenus'));!!}
    {!!Form::hidden('urlValidarDocumento',url('home/validar-entrada-contacto-extranjero/'),array('id'=>'urlValidarDocumento'));!!}

      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    {!! Html::Script('plugins/theme_intranet/js/jquery.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery-1.8.3.min.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/bootstrap.min.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery.dcjqaccordion.2.7.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery.scrollTo.min.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery.nicescroll.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery.sparkline.js') !!}

    <!--common script for all pages-->
    {!! Html::Script('plugins/theme_intranet/js/common-scripts.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/gritter/js/jquery.gritter.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/gritter-conf.js') !!}

    <!--script for this page-->
    {!! Html::Script('plugins/theme_intranet/js/sparkline-chart.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/zabuto_calendar.js') !!}
    {!! Html::Script('plugins/jquery-ui/jquery-ui.js') !!}> 

    {!! Html::Script('plugins/dataTables/media/js/jquery.dataTables.min.js') !!}
    {!! Html::Script('plugins/dataTables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}
    {!! Html::Script('js/function_documento_identidad.js')!!}
    
   


    @yield('scripts')
  <script type="text/javascript">
        $(document).on('ready',function () {
            $('#link_contacto_extranjero').on('click',function(e){

                $.ajax({
                  // En data puedes utilizar un objeto JSON, un array o un query string
                    data: {_token: $('#_token').val()},
                    async : false,
                     
                    //Cambiar a type: POST si necesario
                    type: 'post',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url:$('#urlValidarDocumento').val() ,
                    success : function(json) {   
                      if(json.codigo == 0){
                        e.preventDefault();
                            initDocumentoIdentidad();

                            $('#modal_documento_identidad').modal('show');
                      }
            
                        
                    },

                    error : function(xhr, status) {
                        alert(status);
                  
                    },                   

                });

            });
            $('#formularios_anexos').on('click',function(){

                $.ajax({
                  // En data puedes utilizar un objeto JSON, un array o un query string
                    data: {_token: $('#_token').val()},
                    async : false,
                     
                    //Cambiar a type: POST si necesario
                    type: 'post',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url:$('#urlGenerarMenus').val() ,
                    success : function(json) {   
                        
                        if(json.codigo_error == 1){

                            if(json.tipo_estudio === 'Pregrado'){

                                if(json.procedencia === 'UACH'){

                                    $('#menus_pre_uach').show( "blind", 2000  );

                                }
                                else{
                                    $('#menus_pre_no_uach').show( "blind", 2000  );

                                }
                            }else{


                            }
                        }
                        else{

                            alert('usted no ha realizado la postulación')
                        }
            
                        
                    },

                    error : function(xhr, status) {
                        alert(status);
                  
                    },                   

                });
            });
        return false;
        });
  </script>
  
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        

        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
