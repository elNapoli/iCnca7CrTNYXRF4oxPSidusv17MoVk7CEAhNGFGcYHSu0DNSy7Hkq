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
				<li><a href="#universidadIntercambio" data-toggle="tab">Universidad de intercambio</a></li>
				<li><a href="#declaracion" data-toggle="tab">Declaración</a></li>
			</ul>

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
				<div class="tab-pane fade " id="universidadIntercambio">
                    @include('postulacion.partials.universidad_intercambio')
					
				</div>
				<div class="tab-pane fade " id="declaracion">
                    @include('postulacion.partials.declaracion')
					
				</div>



			</div>
        </div>
        <!-- /.panel-body -->
    </div>
                   <a href="#!" class='btn btn-outline btn-default' id='guardarPostulacion'>Guardar postulación</a>
    <!-- /.panel -->
</div>

{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
{!!Form::hidden('getUrCiudadContinente', url('ciudades/ciudad-by-pais'),array('id'=>'getUrCiudadContinente'));!!}
{!!Form::hidden('gerUrlUniversidadByPais', url('universidades/universidad-by-pais'),array('id'=>'gerUrlUniversidadByPais'));!!}

@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection


@section('scripts')
    {!! Html::Script('plugins/bootstrap/js/bootstrap-datepicker.js')!!}
    <script type="text/javascript">

		$(document).ready(function() {

			$('.continente').on('change',function(e){

			e.preventDefault();

				getListForSelect($('#getUrlPaisByContinente').val(), $('#getToken').val(), $(this).val(), 'pais','','','active');	
			});
   
      			

	        $('.pais').on('change',function(e){
	        e.preventDefault();

	        getListForSelect($('#gerUrlUniversidadByPais').val(), $('#getToken').val(), $(this).val(), 'ciudad','','','active');    
	        });

	        $('.universidad').on('change',function(e){
				$.ajax({
				    // En data puedes utilizar un objeto JSON, un array o un query string
				   data: {
						"_token": $('#getToken').val(),
						"idBuscar": $(this).val(),
						"nomTable": 'universidad'
					},
				    //Cambiar a type: POST si necesario
				    type: "post",
				    // Formato de datos que se espera en la respuesta
				    dataType: "json",
				    // URL a la que se enviará la solicitud Ajax
				    url:$('#gerUrlUniversidadByPais').val() ,
				    success : function(json) {

			            if(tabActive === ""){



			                $(idSelector).empty();
			                $(idSelector).append("<option value=''>Seleccione "+nomSelect2+"</option>");
			                $.each(json, function(index, subCatObj){

			                $(idSelector).append("<option value="+subCatObj.id+">"+subCatObj.nombre+"</option>");
			        
			                
			                });
			                $(idSelector).find('option').removeAttr("selected");
			                //$(idSelector).val(optionSelected);

			                $(idSelector+" option[value='"+optionSelected+"']").attr("selected","selected");
			            }
			            else{

			                $("."+tabActive).find(idSelector).empty();
			                $("."+tabActive).find(idSelector).append("<option value=''>Seleccione "+nomSelect2+"</option>");
			                $.each(json, function(index, subCatObj){

			                $("."+tabActive).find(idSelector).append("<option value="+subCatObj.id+">"+subCatObj.nombre+"</option>");
			        
			                
			                });
			                $("."+tabActive).find(idSelector).find('option').removeAttr("selected");
			                //$(idSelector).val(optionSelected);
			                $("."+tabActive).find(idSelector).val(optionSelected);
			                //$($("."+tabActive).find(idSelector)+" option[value='"+optionSelected+"']").attr("selected","selected");
			            }
			           // $(idSelector).val(optionSelected);
			            //$(idSelector).change();
					},

				    error : function(xhr, status) {
				        console.log('Disculpe, existió un problema '+token);
				    },
				});

	          
	        });

			$('.input-daterange input').each(function() {
			    $(this).datepicker("clearDates");
			});

			$('.datePicker').datepicker({

				autoclose:true,
				format:'yyyy/mm/dd',

			});

			$('#guardarPostulacion').on('click',function(e){

				var data = $(".active").find('input,select').serialize();
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
      			  		$('#message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>La postulación se guardo exitosamente</div>');
	            	},

              		error : function(xhr, status) {
              			var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                		for(var key in xhr.responseJSON)
			            {
			                html += "<li>" + xhr.responseJSON[key][0] + "</li>";
			            }
          			  	$('#message').html(html+'</div>');
                  
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
