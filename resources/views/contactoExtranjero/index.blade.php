@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
  {!! Form::model($parametros, ['url'=>['contacto-en-extranjero/store-and-update'], 'method'=>'post','id'=>'form-save-contacto-extranjero']) !!}
      		<div class="message"></div>
             
			@include('contactoExtranjero.partials.fields')
  {!!Form::close()!!}
  
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection
@section('scripts')
	<script>
		 $(document).on('ready',function(){

 				$('#validez_seguro').datepicker({

                    showButtonPanel: true,
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd',
                    showAnim: 'drop',

                });
		 	$('#guardarContactoExtranjero').on('click',function(){
                data = $('#form-save-contacto-extranjero').serialize();
             	$.ajax({
                                  
	                async : false,
	                data:data,
	                //Cambiar a type: POST si necesario
	                type: 'POST',
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#form-save-contacto-extranjero').attr('action') ,
	                success : function(json) {   
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');  
	             
	                    
	                },

	                error : function(xhr, status) {
	                     var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
	                        for(var key in xhr.responseJSON)
	                        {
	                            html += "<li>" + xhr.responseJSON[key][0] + "</li>";
	                        }
	                        $('.message').html(html+'</div>');
	              
	                },
	                

	            });
		 	});
		 });
	</script>
@endsection