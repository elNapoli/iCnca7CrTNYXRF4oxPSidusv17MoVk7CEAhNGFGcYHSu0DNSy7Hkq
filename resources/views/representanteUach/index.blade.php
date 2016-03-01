@extends('intranet.app')

@section('Dashboard') Postulación @endsection

@section('content')
@include('representanteUach.partials.modal_create')
@include('representanteUach.partials.modal_edit')


      		<div class="panel-heading"><a class="btn-info btn" id='openModalRepresentante' href="#!">Crear responsable</a></div>
      		<div class="message"></div>

          <!-- Table -->
			@include('representanteUach.partials.table')
			{!!Form::hidden('getUrlRepresentanteByUser',url('representante-uach/representante-by-user'),array('id'=>'getUrlRepresentanteByUser'));!!}
			{!!Form::hidden('getUrlRepresentanteDestroy',url('representante-uach/destroy'),array('id'=>'getUrlRepresentanteDestroy'));!!}
			{!!Form::hidden('getUrlRepresentanteEdit',url('representante-uach/edit'),array('id'=>'getUrlRepresentanteEdit'));!!}
			{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection

@section('scripts')
	<script>
		$(document).on('ready',function(){
			$('#btnAddRepresentante').on('click',function(){
				$.ajax({
	              // En data puedes utilizar un objeto JSON, un array o un query string
	                async : false,
	                data: $('#form-save-representante').serialize(),
	                //Cambiar a type: POST si necesario
	                type: $('#form-save-representante').attr('method'),
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#form-save-representante').attr('action') ,
	                success : function(json) {   
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    	$('#modal_crear_representante').modal('hide'); 
                    	dt.ajax.reload();  
	                    
	                },

	                error : function(xhr, status) {
	                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
	                    responseJSON =  JSON.parse(xhr.responseText);
                        for(var key in responseJSON)
                        {
                            html += "<li>" + responseJSON[key][0] + "</li>";
                        }
                        $('#message-modal').html(html+'</div>');
	              
	                },                   

	            });

			});
			$('#openModalRepresentante').on('click',function(){

				$('#modal_crear_representante').modal('show');
			});
			$('#btnEditrepresentante').on('click',function(){

				$.ajax({
	              // En data puedes utilizar un objeto JSON, un array o un query string
	                async : false,
	                data: $('#form-edit-representante').serialize(),
	                //Cambiar a type: POST si necesario
	                type: $('#form-edit-representante').attr('method'),
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#form-edit-representante').attr('action') ,
	                success : function(json) {   
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    	$('#modal_edit_representante').modal('hide'); 
                    	dt.ajax.reload();  
	                    
	                },

	                error : function(xhr, status) {
	                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
	                    responseJSON =  JSON.parse(xhr.responseText);
                        for(var key in responseJSON)
                        {
                            html += "<li>" + responseJSON[key][0] + "</li>";
                        }
                        $('#modal_edit_representante #message-modal').html(html+'</div>');
	              
	                },                   

	            });

			});
			var dt = $('#tableRepresentante').DataTable( {

				'searching':false,
				'paging':false,
                "bProcessing": true,
				
		        "ajax": $('#getUrlRepresentanteByUser').val(),
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},

		        "columns": [
		           
		            { "data": "tipo" },
		            { "data": "nombre" },
		            { "data": "telefono_1" },
		            { "data": "telefono_2" },
		            { "data": "parentesco" },
		            { "data": "email" },
		            { "data": "direccion" },
		            { "data": null,
		                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
   							$(nTd).attr('align','center');

		                    $(nTd).html("<a href='#!' id ='"+oData.id+"' class='model-open-edit btn btn-primary btn-xs'>"+
		                    	" <i class='fa fa-pencil'></i></a>"+
		                                "<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+
		                                oData.id+"'>  <i class='fa fa-trash-o'></i></a>"
		                        );

		                }
		            }
		        ],
		    });





	     	$('table').on('click','.btn-delete', function(e){
	            if(confirm("Press a button!\nEither OK or Cancel."))
	            {
	                
	                $.ajax({
	                    // En data puedes utilizar un objeto JSON, un array o un query string
	                    data:{_token :$('#_token').val(), id: $(this).attr('id')},
	                    //Cambiar a type: POST si necesario
	                    type: "post",
	                    // Formato de datos que se espera en la respuesta
	                    dataType: "json",
	                    // URL a la que se enviará la solicitud Ajax
	                    url:$('#getUrlRepresentanteDestroy').val() ,
	                    success : function(json) {
	                        $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
	                        $('#modal_edit_carrera').modal('hide'); 
	                        dt.ajax.reload();              
	              
	                    },

	                    error : function(xhr, status) {
	                        alert('mal conexion');


	                    },
	                }); 
	            
	            }
	            
	        });

 			$('table').on('click','.model-open-edit', function(e){
 				$('#modal_edit_representante #id').val($(this).attr('id'));
	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
                    data:{_token :$('#_token').val(), id: $(this).attr('id')},
	               
	                //Cambiar a type: POST si necesario
	                type: "post",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#getUrlRepresentanteEdit').val() ,
	                success : function(json) {
	                    $('#modal_edit_representante #direccion').val(json.direccion);
	                    $('#modal_edit_representante #email').val(json.email);
	                    $('#modal_edit_representante #nombre').val(json.nombre);
	                    $('#modal_edit_representante #parentesco').val(json.parentesco);
	                    $('#modal_edit_representante #telefono_1').val(json.telefono_1);
	                    $('#modal_edit_representante #telefono_2').val(json.telefono_2);
	                    $('#modal_edit_representante #tipo').val(json.tipo);
	                 
	                    $('#modal_edit_representante').modal('show'); 
	          
	          
	                },

	                error : function(xhr, status) {
	                    alert('mal conexion');


	                },
            }); 
            
            
        });


		});
	</script>
@endsection