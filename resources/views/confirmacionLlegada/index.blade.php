@extends('intranet.app')

@section('Dashboard') Postulación @endsection

@section('content')
@include('representanteUach.partials.modal_create')
@include('representanteUach.partials.modal_edit')

      		<div class="message"></div>

	            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Datos de Universidad de Destino</h4>
  {!! Form::model($parametros, ['url'=>['confirmacion-llegada/store-and-update'], 'method'=>'post','class'=>'form-horizontal style-form','id'=>'form-save-confirmacion']) !!}

                    
         @include('confirmacionLlegada.partials.fields')
                    
                   
  {!!Form::close()!!}
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row --> 

         



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
                     responseJSON =  JSON.parse(xhr.responseText);
                        for(var key in responseJSON)
                        {
                            html += "<li>" + responseJSON[key][0] + "</li>";
                        }
                        $('.message').html(html+'</div>');
              
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