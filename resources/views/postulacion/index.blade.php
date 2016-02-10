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
				<li><a href="#declaracion" data-toggle="tab">Declaración</a></li>
			</ul>
        <div id="message"></div>
			

			<div class="tab-content">

				<div class="tab-pane fade in active" id="datosPersonales">

                    @include('postulacion.partials.datos_personales')

				</div>

				<div class="tab-pane fade " id="estudios">
                    @include('postulacion.partials.estudios')
					
				</div>
				<div class="tab-pane fade " id="intercambio">
                    @include('postulacion.partials.intercambio')
					 
				</div>
				<div class="tab-pane fade " id="declaracion">
                    @include('postulacion.partials.declaracion')
					
				</div>

				@include('carreras.partials.modal_create')

			</div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
                   <a href="#!" class='btn btn-outline btn-default' id='guardarPostulacion'>Guardar postulación</a>

{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
{!!Form::hidden('getUrlGetFinanciamientos', url('financiamientos/financiamientos'),array('id'=>'getUrlGetFinanciamientos'));!!}
{!!Form::hidden('getUrlFacultadesByCampus', url('facultades/facultades-by-campus'),array('id'=>'getUrlFacultadesByCampus'));!!}
{!!Form::hidden('getUrlCarreraByFacultad', url('carreras/carreras-by-facultad'),array('id'=>'getUrlCarreraByFacultad'));!!}
{!!Form::hidden('getUrCiudadContinente', url('ciudades/ciudad-by-pais'),array('id'=>'getUrCiudadContinente'));!!}
{!!Form::hidden('gerUrlUniversidadByPais', url('universidades/universidad-by-pais'),array('id'=>'gerUrlUniversidadByPais'));!!}

@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection


@section('scripts')
    {!! Html::Script('plugins/bootstrap/js/bootstrap-datepicker.js')!!}
    {!! Html::Script('js/function_carrera.js')!!}
    {!! Html::Script('js/function_financiamiento.js')!!}

    <script type="text/javascript">

		$(document).ready(function() {


			initFinanciamiento($('#getUrlGetFinanciamientos').val(),$('#getToken').val());

			$('#intercambio').on('change','.radioTEstudio',function(){

				$('.tEstudioInput_').val('');
				$('.tEstudioInput_').attr('disabled','');
				$('#tEstudioInput_'+$(this).val()).removeAttr('disabled');

			});
			 $('#procedencia input[type=radio]').change(function(){
 			  	
 			  	if($(this).val()==='UACH'){
 			  		 var options = {};
 			  		$('#preUach').show('slide',1000);
 			  	}
 			  	else{

 			  		$('#preUach').hide('slide',1000);

 			  	}
 			  });


			initCarrera();
			selectByTabs("div#datosPersonales div div.col-lg-6 div.form-group",'#continente','#getToken','#getUrlPaisByContinente','#pais','div#datosPersonales div div.col-lg-6 div.form-group select');
			selectByTabs("datosPersonales",'pais','getToken','getUrCiudadContinente','.ciudad','div#datosPersonales div div.col-lg-6 div.form-group select');
      			
			selectByTabs("estudios",'campus_sede','getToken','getUrlFacultadesByCampus','#facultad','div#estudios div div.col-lg-6 div.input-group select');
			selectByTabs("estudios",'facultad','getToken','getUrlCarreraByFacultad','#carrera','div#estudios div div.col-lg-6 div.input-group select');
			selectByTabs("estudios",'continente','getToken','getUrlPaisByContinente','#pais','div#estudios div div.col-lg-6 div.input-group select');
			selectByTabs("estudios",'pais','getToken','gerUrlUniversidadByPais','#campus_sede','div#estudios div div.col-lg-6 div.input-group select');

			selectByTabs("intercambio",'campus_sede','getToken','getUrlFacultadesByCampus','#facultad','div#intercambio div div.col-lg-6 div.input-group select');
			selectByTabs("intercambio",'facultad','getToken','getUrlCarreraByFacultad','#carrera','div#intercambio div div.col-lg-6 div.input-group select');
			selectByTabs("intercambio",'continente','getToken','getUrlPaisByContinente','#pais','div#intercambio div div.col-lg-6 div.input-group select');
			selectByTabs("intercambio",'pais','getToken','gerUrlUniversidadByPais','#campus_sede','div#intercambio div div.col-lg-6 div.input-group select');



			$('.tab-pane').on('click','#add_carrera',function(){

                    $('#modal_crear_carrera').modal('show'); 

			});

			$('.input-daterange input').each(function() {
			    $(this).datepicker("clearDates");
				});

			$('.datePicker').datepicker({

				autoclose:true,
				format:'yyyy/mm/dd',

				});

			$('#guardarPostulacion').on('click',function(e){

				var data = $(".active").find('input,select,textarea,.tEstudioInput_').serialize();
				var url  = $(".active").find('#urlStoreInformacion').val();
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
      			  		
	            	},

              		error : function(xhr, status) {
              			var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                		for(var key in xhr.responseJSON)
			            {
			                html += "<li>" + xhr.responseJSON[key][0] + "</li>";
			            }
          			  	$('#message').html(html+'</div>');
      			  		$("html, body").animate({ scrollTop: 0 }, 600);

                  
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
			});
		});

    </script>
@endsection


@section('styles')
    {!! Html::Style('plugins/bootstrap/css/bootstrap-datepicker.css')!!}

@endsection
