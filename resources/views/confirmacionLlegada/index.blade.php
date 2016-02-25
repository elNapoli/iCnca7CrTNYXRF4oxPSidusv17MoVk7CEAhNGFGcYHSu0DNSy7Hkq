@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
@include('representanteUach.partials.modal_create')
@include('representanteUach.partials.modal_edit')
<div class="row">
      <!-- Default panel contents -->
    <div class="col-md-12" >

        <div class="panel panel-default">

      		<div class="panel-heading"></div>
      		<div class="message"></div>
		
  {!! Form::model($parametros, ['url'=>['confirmacion-llegada/store-and-update'], 'method'=>'post','id'=>'form-save-confirmacion']) !!}
         
         @include('confirmacionLlegada.partials.fields')
     
  {!!Form::close()!!}

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

      $('#guardarConfirmacion').on('click',function(){
        data = $('#form-save-confirmacion').serialize();
        $.ajax({
                                  
                async : false,
                data:data,
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-save-confirmacion').attr('action') ,
                success : function(json) {   
                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');  
             
                    
                },

                error : function(xhr, status) {
                     var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                        for(var key in xhr.responseJSON)
                        {
                            html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                        }
                        $('#message-modal').html(html+'</div>');
              
                },
                


            });

      });
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