@extends('intranet.app')

@section('Dashboard') Continentes @endsection

@section('content')


		<div class="message"></div>


			@include('continentes.partials.table')



	{!! Form::open(['url'=>['continentes/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

	{!! Form::close()!!}
	{!!Form::hidden('urlContinenteDestroy', url('continentes/destroy'),array('id'=>'urlContinenteDestroy'));!!}
	{!!Form::hidden('urlContinenteUpdate', url('continentes/update'),array('id'=>'urlContinenteUpdate'));!!}
	{!!Form::hidden('urlAllContinentes', url('continentes/all-continente'),array('id'=>'urlAllContinentes'));!!}


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
				'searching':false,
				'paging':false,
				"bProcessing": true,
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        },
		        "ajax": $('#urlAllContinentes').val(),
		        "columns": [
			           { "data": "id",
                        "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html('<a href="#!" id="'+oData.id+'" class="model-open-edit">'+oData.id+'</a>');
                            }
                        },
			            { "data":"nombre" },
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
				if(confirm("Desea eliminar el registro seleccionado.?")){
					
					var row   = $(this).parents('tr');
					var id    = $(this).attr('id') //captura el id de la fila seleccionada
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
					    	$('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   				
							dt.ajax.reload();
						},

					    error : function(xhr, status) {
					    	alert('El continente no fue eliminado');

					    },
					});		
				}

			});


		} );

	</script>
@endsection