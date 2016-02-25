<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>


    <!-- Bootstrap Core CSS -->
    {!! Html::Style('plugins/sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css')!!}


    <!-- MetisMenu CSS -->
    {!! Html::Style('plugins/sb-admin/bower_components/metisMenu/dist/metisMenu.min.css')!!}

    <!-- Timeline CSS -->
    {!! Html::Style('plugins/sb-admin/dist/css/timeline.css')!!}

    <!-- Custom CSS -->
    {!! Html::Style('plugins/sb-admin/dist/css/sb-admin-2.css')!!}

    <!-- Morris Charts CSS -->
    {!! Html::Style('plugins/sb-admin/bower_components/morrisjs/morris.css')!!}

    <!-- Custom Fonts -->
    {!! Html::Style('plugins/sb-admin/bower_components/font-awesome/css/font-awesome.min.css')!!}
    {!! Html::Style('plugins/dataTables/css/jquery.dataTables.css')!!}
    {!! Html::Style('plugins/jquery-ui/jquery-ui.css')!!}



    @yield('styles')


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('layout.register.nav_us_header')
            @include('layout.nav_top_link')
            @include('layout.nav_static_side')       
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('Dashboard')</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
          <!--  include('layout.items')-->
                                @yield('breadcrumbs')
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                         
                            <div class="panel-body">
                                <div class="row">
                                     @yield('content')
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

               
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {!! Html::Script('plugins/sb-admin/bower_components/jquery/dist/jquery.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::Script('plugins/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}

    <!-- Metis Menu Plugin JavaScript -->
    {!! Html::Script('plugins/sb-admin/bower_components/metisMenu/dist/metisMenu.min.js') !!}

    <!-- Morris Charts JavaScript -->
    {!! Html::Script('plugins/sb-admin/bower_components/raphael/raphael-min.js') !!}


    <!-- Custom Theme JavaScript -->
    {!! Html::Script('plugins/sb-admin/dist/js/sb-admin-2.js') !!}
    {!! Html::Script('plugins/dataTables/js/jquery.dataTables.js') !!}
    {!! Html::Script('plugins/jquery-ui/jquery-ui.js') !!}> 
    {!! Html::Script('js/funciones.js')!!}

    @yield('scripts')

</body>

</html>
