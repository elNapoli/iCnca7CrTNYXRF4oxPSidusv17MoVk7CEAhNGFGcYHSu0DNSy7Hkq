<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>OME | @yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {!! Html::Style('plugins/uach/css/estilos_uach.css')!!}
        {!! Html::Style('css/bootstrap_uach.css')!!}
        {!! Html::Style('plugins/theme_intranet/font-awesome/css/font-awesome.css')!!}
        {!! Html::Script('js/vendor/modernizr-2.8.3.min.js') !!}
        @yield('styles')
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @include('internet.banner_top')

         

        <div id="scroll">
        
            <div id="contenedor">
                @include('internet.banner_left')
                @include('internet.nav_horizontal')
                 
                <div id="pix">
                    
                </div>        
                <div id="barra_gris">
                    
                </div>  
              
                <div id="informacion">
                   
                    @yield('portada')
                    <div id="cont">
                        <div class="container" style="min-height:380px">
                            @yield('content')
                           
                        </div>
                    </div><!--.cont-->
                 
                </div>
            
                <div id="barra_gris">
                    
                </div>  
            
          </div>
          {!!Form::hidden('urlSetLang', url('/setLang'),array('id'=>'urlSetLang'));!!}
        </div>
        @include('internet.footer')

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        {!! Html::Script('js/vendor/bootstrap.min.js') !!}|
        {!! Html::Script('js/main.js') !!}
        @yield('scripts')
        <script type="text/javascript">
            $(document).on('ready',function () {
                $('#changeLang').on("click",function(){
                    window.location = $("#urlSetLang").val()+"?lang="+$(this).data('lang');
                })
            });
         </script>

    </body>
</html>
