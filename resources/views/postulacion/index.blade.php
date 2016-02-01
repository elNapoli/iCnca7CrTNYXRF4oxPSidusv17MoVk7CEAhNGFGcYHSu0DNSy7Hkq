@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')


<div class="col-lg-12">
    <div class="panel panel-default">

        <!-- /.panel-heading -->
        <div class="panel-body">

          	<!-- Nav tabs -->
			<ul class="nav nav-tabs" id="tabs">
				<li class="active"><a href="#datosPersonales" data-toggle="tab">Datos Personales</a></li>
				<li><a href="#estudios" data-toggle="tab">Estudios</a></li>
				<li><a href="#intercambio" data-toggle="tab">Información de Intercambio</a></li>
				<li><a href="#convenio" data-toggle="tab">Convenio</a></li>
				<li><a href="#declaracion" data-toggle="tab">Declaración</a></li>
			</ul>

			<div class="tab-content">

				<div class="tab-pane fade in active" id="datosPersonales">
                    {!! Form::open(['url'=>'ciudades/store', 'method'=>'POST'])!!}

                    @include('postulacion.partials.datos_personales')




                    {!!Form::close()!!}
				</div>

				<div class="tab-pane fade " id="estudios">
                    @include('postulacion.partials.estudios')
					
				</div>
				<div class="tab-pane fade " id="intercambio">
                    @include('postulacion.partials.intercambio')
					 
				</div>
				<div class="tab-pane fade " id="convenio">
					haha
				</div>
				<div class="tab-pane fade " id="declaracion">
					=)
				</div>



			</div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>


@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection


@section('scripts')
    {!! Html::Script('plugins/bootstrap/js/bootstrap-datepicker.js')!!}
    <script type="text/javascript">

        	$(document).ready(function() {

				$('.input-daterange input').each(function() {
				    $(this).datepicker("clearDates");
				});

				$('.datePicker').datepicker("clearDates");
        	});

    </script>
@endsection


@section('styles')
    {!! Html::Style('plugins/bootstrap/css/bootstrap-datepicker.css')!!}

@endsection
