<div class="form-group">
  	{!!  Form::label('continente', ' Nombre Continente ')!!}
	{!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'form-control'))!!}
</div>

<div class="form-group">
  	{!!  Form::label('pais', ' Nombre país ')!!}
	{!!  Form::select('pais', [null=>'Seleccione un país'],null,array('class' => 'form-control'))!!}
</div>

<div class="form-group">

{!!  Form::label('nombre', 'Nombre Ciudad');!!}
{!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Valdivia'));!!}
</div>

<div class="form-group">

{!!  Form::label('codigo_postal', 'Código postal de la ciudad');!!}
{!! Form::text('codigo_postal',null,array('class' => 'form-control','placeholder'=>'Ej: 5090000'));!!}
</div>








{!!Form::hidden('GetPais', route('ciudades.getPais'),array('id'=>'GetPais'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}



@section('script')




<script type="text/javascript">

	$(document).ready(function(){



		$('#continente').on('change',function(e){
			e.preventDefault();
			var url  = $('#GetPais').val();
			var token        = $('#getToken').val();
			var idContinente = $("#continente").val();
			$.ajax({
			    // En data puedes utilizar un objeto JSON, un array o un query string
			   data: {
					"_token": token,
					"idContinente": idContinente
				},
			    //Cambiar a type: POST si necesario
			    type: "post",
			    // Formato de datos que se espera en la respuesta
			    dataType: "json",
			    // URL a la que se enviará la solicitud Ajax
			    url:url ,
		        success : function(json) {
		        	$('#pais').empty();
		        	$('#pais').append("<option value=''>Seleccione un país</option>");
	        		$.each(json, function(index, subCatObj){

					$('#pais').append("<option value="+subCatObj.id+">"+subCatObj.nombre+"</option>");
	        		$("select#pais").find("option#2").attr("selected", "selected");	
	        		})
    			},
			    error : function(xhr, status) {
			        console.log('Disculpe, existió un problema');
			    },
			});
		});
	});


$(window).load(function() {
			var url  = $('#GetPais').val();
			var token        = $('#getToken').val();
			var idContinente = $("#continente").val();
			$.ajax({
			    // En data puedes utilizar un objeto JSON, un array o un query string
			   data: {
					"_token": token,
					"idContinente": idContinente
				},
			    //Cambiar a type: POST si necesario
			    type: "post",
			    // Formato de datos que se espera en la respuesta
			    dataType: "json",
			    // URL a la que se enviará la solicitud Ajax
			    url:url ,
		        success : function(json) {
		        	$('#pais').empty();
		        	$('#pais').append("<option value=''>Seleccione un país</option>");
	        		$.each(json, function(index, subCatObj){

					$('#pais').append("<option value="+subCatObj.id+">"+subCatObj.nombre+"</option>");
	        			
	        		});
		            $("#pais").val($('#paisId').val());
					$("#pais").change();


    			},
			    error : function(xhr, status) {
			        console.log('Disculpe, existió un problema');
			    },
			});


});
</script>



@endsection