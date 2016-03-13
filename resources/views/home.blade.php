@extends('intranet.app')
    
    <!-- js placed at the end of the document so the pages load faster -->
    {!! Html::Script('plugins/theme_intranet/js/jquery.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery-1.8.3.min.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/bootstrap.min.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery.dcjqaccordion.2.7.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery.scrollTo.min.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery.nicescroll.js') !!}
    {!! Html::Script('plugins/theme_intranet/js/jquery.sparkline.js') !!}

    <!--common script for all pages-->
    <!--{!! Html::Script('plugins/theme_intranet/js/common-scripts.js') !!} esto genera que el menu se despliegue y cierre al mismo tiempo -->
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
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Bienvenido {{Auth::user()->name}}',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: 'plugins/theme_intranet/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 7000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
  </script>