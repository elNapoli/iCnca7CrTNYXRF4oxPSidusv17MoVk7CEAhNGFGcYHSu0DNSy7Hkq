@extends('intranet.app')

@section('Dashboard') Paises @endsection

@section('content')
@include('paises.partials.modal_create')
@include('paises.partials.modal_edit')
		<div class="message"></div>

			@include('paises.partials.table')
	

{!! Form::open(['url'=>['continentes/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
	{!!Form::hidden('urlPaisDestroy', url('paises/destroy'),array('id'=>'urlPaisDestroy'));!!}
	{!!Form::hidden('urlAllPaises', url('paises/all-paises'),array('id'=>'urlAllPaises'));!!}
	{!!Form::hidden('UrlPaisUpdate', url('paises/update'),array('id'=>'UrlPaisUpdate'));!!}
    {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}



@endsection



@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {

		    var dt = $('#tablePais').DataTable( {
				"bProcessing": true,
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        },
		        "ajax": $('#urlAllPaises').val(),
		        "columns": [
			           { "data": "id",
                        "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html('<a href="#!" id="'+oData.id+'" class="model-open-edit">'+oData.id+'</a>');
                            }
                        },
			            { "data":"nombre" },
			            { "data":"continente_r.nombre" },
			            { "data": null,
			                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                $(nTd).attr('align','center');

			                    $(nTd).html("<a href='#!' id ='"+oData.id+"' class='model-open-edit btn btn-primary btn-xs'> <i class='fa fa-pencil'></i></a>"+
			                                "<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+oData.id+"'>  <i class='fa fa-trash-o'></i></a>"
			                        );

			                }
			            }
			       
			        ]

		    } );
			$('#btnCreatePais').on('click',function(){
		    var data = $('#form-save-pais').serialize();

		    $.ajax({
		        // En data puedes utilizar un objeto JSON, un array o un query string
		       data:data,
		        //Cambiar a type: POST si necesario
		        type: "post",
		        // Formato de datos que se espera en la respuesta
		        dataType: "json",
		        // URL a la que se enviará la solicitud Ajax
		        url:$('#form-save-pais').attr('action') ,
		        success : function(json) {

		            $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
		            $('#modal_crear_pais').modal('hide'); 
		            dt.ajax.reload();            
		  
		        },

		        error : function(xhr, status) {
		        	responseJSON =  JSON.parse(xhr.responseText);

		            var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
		                for(var key in responseJSON)
		                {
		                    html += "<li>" + responseJSON[key][0] + "</li>";
		                }
		                $('#message-modal').html(html+'</div>');


		        },
		    }); 

			});

        	$('table').on('click','.btn-delete', function(e){

				e.preventDefault(); // jquery evento prevent default (e)
				if(confirm("Desea eliminar el país seleccionado?")){
					
					var row   = $(this).parents('tr');
					var id    = $(this).attr('id') //captura el id de la fila seleccionada
					var form  = $('#form-delete'); //traigo la id
					var url   = $('#urlPaisDestroy').val()+'/'+id; //remplazo el placeholder USER_ID con la id
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
					    	$('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   				
							dt.ajax.reload();
						},

					    error : function(xhr, status) {
					    	alert('El país no fue eliminado');
							
					    },
					});		
				}

			});

			



			$('#btnUpdatePais').on('click',function(){
	            var data = $('#form-edit-pais').serialize();
	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
	               data:data,
	                //Cambiar a type: POST si necesario
	                type: "put",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#UrlPaisUpdate').val()+'/'+$('#id').val(),
	                success : function(json) {
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    	$('#modal_edit_continente').modal('hide'); 
		            	dt.ajax.reload();            

	                  //  dt.reload();            
	          
	                },

	                error : function(xhr, status) {
		        		responseJSON =  JSON.parse(xhr.responseText);

	                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
	                        for(var key in responseJSON)
	                        {
	                            html += "<li>" + responseJSON[key][0] + "</li>";
	                        }
	                        $('#message-modal-edit').html(html+'</div>');


	                },
	            }); 
			});



			$('table').on('click','.model-open-edit', function(e){

	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
	                data:{_token:$('#_token').val()},
	                //Cambiar a type: POST si necesario
	                type: "post",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#form-edit-pais').attr('action')+'/'+$(this).attr('id') ,
	                success : function(json) {


	                    $('#modal_edit_pais div div input#nombre').val(json.nombre);
	                    $('#modal_edit_pais div div select#continente').val(json.continente_r.id);
	                    $('#modal_edit_pais div div input#id').val(json.id);

	                    $('#modal_edit_pais').modal('show'); 


	          
	                },

	                error : function(xhr, status) {
	                    alert('mal conexion');


	                },
	            }); 
	            
	            
	        });



		} );

	</script>
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('paises') !!}
@endsection


