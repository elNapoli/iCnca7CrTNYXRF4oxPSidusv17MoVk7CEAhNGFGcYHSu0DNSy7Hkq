@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
@include('representanteUach.partials.modal_create')
@include('representanteUach.partials.modal_edit')
<div class="row">
      <!-- Default panel contents -->
    <div class="col-md-12" >

        <div class="panel panel-default">

      		<div class="panel-heading"><a class="btn-info btn" id='openModalRepresentante' href="#!">Crear representante</a></div>
      		<div class="message"></div>
		
         
        <div class="form-horizontal">
        	<div class="col-lg-6">
        		<h4>Datos de Universidad de Destino</h4>
	          	<div class="form-group">
	            	{!!  Form::label('nombre_universidad_destino', 'Nombre de la institución: ',array('class'=>'col-lg-5 control-label'));!!}

		            <div class="col-lg-6">
			            {!! Form::text('nombre_universidad_destino',null,array('class' => 'form-control','disabled'=>''));!!}

		            </div>
	          	</div>

	          	<div class="form-group">
	            	{!!  Form::label('nombre_coordinador', 'Coordinador:',array('class'=>'col-lg-5 control-label'));!!}

		            <div class="col-lg-6">
			            {!! Form::text('nombre_coordinador',null,array('class' => 'form-control','disabled'=>''));!!}

		            </div>
	          	</div>
	          	<h4>Datos personales del estudiante</h4>
	          	<div class="form-group">
	            	{!!  Form::label('nombre_estudiante', 'Nombre completo: ',array('class'=>'col-lg-5 control-label'));!!}

		            <div class="col-lg-6">
			            {!! Form::text('nombre_estudiante',null,array('class' => 'form-control','disabled'=>''));!!}

		            </div>
	          	</div>
	          	<h4>Cursos en la universidad de destino</h4>
        	</div>
        	<div class="col-lg-6">
        		<h4>Confirmación de Arribo y Registro</h4>
          	<div class="form-group">
            	{!!  Form::label('fecha_llegada', 'Fecha de presentación en Institución de 
				Destino: ',array('class'=>'col-lg-5 control-label'));!!}

	            <div class="col-lg-6">
		            {!! Form::text('fecha_llegada',null,array('class' => 'form-control'));!!}

	            </div>
          	</div>
          	<div class="form-group">
            	{!!  Form::label('fecha_inicio_curso', 'Fecha inicio de cursos: ',array('class'=>'col-lg-5 control-label'));!!}

	            <div class="col-lg-6">
		            {!! Form::text('fecha_inicio_curso',null,array('class' => 'form-control'));!!}

	            </div>
          	</div>
          	<div class="form-group">
            	{!!  Form::label('fecha_termino_curso', 'Fechas término de cursos: ',array('class'=>'col-lg-5 control-label'));!!}

	            <div class="col-lg-6">
		            {!! Form::text('fecha_termino_curso',null,array('class' => 'form-control'));!!}

	            </div>
          	</div>
        	</div>
			
          	

        </div>

        </div>
    </div>


</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection

@section('scripts')
	<script>
		 $(document).on('ready',function(){

		 	$('#fecha_llegada').datepicker({

                    defaultDate: "+1w",
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    
                    onClose: function( selectedDate ) {
                        $( "#fecha_inicio_curso" ).datepicker( "option", "minDate", selectedDate );
                    }

            });

            $('#fecha_inicio_curso').datepicker({

                    defaultDate: "+1w",
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    
                    onClose: function( selectedDate ) {
                        $( "#fecha_termino_curso" ).datepicker( "option", "minDate", selectedDate );
                    }

            });

            $('#fecha_termino_curso').datepicker({

                    defaultDate: "+1w",
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    
                    onClose: function( selectedDate ) {
                        $( "#fecha_llegada" ).datepicker( "option", "minDate", selectedDate );
                    }

            });

		 });
	</script>
@endsection