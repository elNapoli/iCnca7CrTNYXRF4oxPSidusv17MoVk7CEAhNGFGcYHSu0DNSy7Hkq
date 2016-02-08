@extends('layout.app')

@section('Dashboard') Continentes @endsection

@section('content')

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-1" ></div>
    <div class="col-md-8" >

		<div class="panel panel-default">

		<div class="message"></div>
		  <div class="panel-heading"><a class="btn btn-primary btn-outline" data-toggle="modal" data-target="#modal_crear_continente" href="#!">Crear continente</a></div>

		  <!-- Table -->
			@include('continentes.partials.table')


		</div>
    </div>

</div>


{!! Form::open(['url'=>['continentes/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
	{!!Form::hidden('urlContinenteDestroy', url('continentes/destroy'),array('id'=>'urlContinenteDestroy'));!!}
	{!!Form::hidden('urlContinenteUpdate', url('continentes/update'),array('id'=>'urlContinenteUpdate'));!!}


@include('continentes.partials.modal_create')
@include('continentes.partials.modal_edit')

@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('continentes') !!}
@endsection



@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {

		var dt = $('#tableContinente').DataTable( {
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        }
		    } );
		


        $('table').on('click','.model-open-edit', function(e){
            var data = $('#form-edit-continente').serialize();
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-edit-continente').attr('action')+'/'+$(this).attr('id') ,
                success : function(json) {


                    $('div#boyd-modal div div input#nombre').val(json.nombre);
                    $('div#boyd-modal div div input#id').val(json.id);

                    $('#modal_edit_continente').modal('show'); 


          
                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            
            
        });
			$('#btnUpdateContinente').on('click',function(){
	            var data = $('#form-edit-continente').serialize();
	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
	               data:data,
	                //Cambiar a type: POST si necesario
	                type: "put",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#urlContinenteUpdate').val()+'/'+$('#id').val(),
	                success : function(json) {
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    	$('#modal_edit_continente').modal('hide'); 

	                    dt.reload();            
	          
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
			$('#btnCreateContinente').on('click',function(){
		    var data = $('#form-save-continente').serialize();

		    $.ajax({
		        // En data puedes utilizar un objeto JSON, un array o un query string
		       data:data,
		        //Cambiar a type: POST si necesario
		        type: "post",
		        // Formato de datos que se espera en la respuesta
		        dataType: "json",
		        // URL a la que se enviará la solicitud Ajax
		        url:$('#form-save-continente').attr('action') ,
		        success : function(json) {
		            $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
		            $('#modal_crear_continente').modal('hide'); 
		            dt.ajax.reload();            
		  
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

			$('.btn-delete').click(function(e){ //vincula la funcion del boton al ser presionado
				e.preventDefault(); // jquery evento prevent default (e)
				if(confirm("Press a button!\nEither OK or Cancel.")){
					
					var row   = $(this).parents('tr');
					var id    = row.data('id'); //captura el id de la fila seleccionada
					var form  = $('#form-delete'); //traigo la id
					var url   = $('#urlContinenteDestroy').val()+'/'+id; //remplazo el placeholder USER_ID con la id
					var data  = form.serialize();


				
					$.ajax({
					    // En data puedes utilizar un objeto JSON, un array o un query string
					   data:data,
					    //Cambiar a type: POST si necesario
					    type: "post",
					    // Formato de datos que se espera en la respuesta
					    dataType: "json",
					    // URL a la que se enviará la solicitud Ajax
					    url:url ,
					    success : function(json) {
					    	alert(json.message);				
							row.fadeOut(); //solo se elimina cuando se completa transaccion
						},

					    error : function(xhr, status) {
					    	alert('El usuario no fue eliminado');
							row.show();
					        console.log('Disculpe, existió un problema '+token);
					    },
					});		
				}

			});


		} );

	</script>
@endsection