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

    @include('intranet.header')

    @include('intranet.sidebar_left_user')

    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-9 main-chart">
                <h3><i class="fa fa-angle-right"></i> Home!</h3>
                <hr>
                @yield('content')

                </div><!-- /col-lg-9 END SECTION MIDDLE -->
              
         
                @include('intranet.sidebar_right')
          
            </div>
        </section>
    </section>

      <!--main content end-->
      <!--footer start-->
      @include('intranet.footer')
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
    
   


    @yield('scripts')
  <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Bienvenido test!',
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
