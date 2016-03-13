@extends('intranet.app')

@section('Dashboard') Beneficios @endsection

@section('content')

                <h3><i class="fa fa-angle-right"></i> Beneficios!</h3>
<div class="col-lg-8">
	<hr>
<div class="panel panel-default">
          <div class="panel-heading"><a class="btn btn-info" data-toggle="modal" data-target="#modal_crear_beneficio" href="#!">Crear Beneficio</a></div>

		  <!-- Table -->
		  <div class="message"></div>
			@include('beneficios.partials.table')


{!! Form::open(['url'=>['beneficios/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
	{!!Form::hidden('urlBeneficioDestroy', url('beneficios/destroy'),array('id'=>'urlBeneficioDestroy'));!!}
	{!!Form::hidden('getUrlBeneficio', url('beneficios/beneficios'),array('id'=>'getUrlBeneficio'));!!}
{!!Form::hidden('urlBeneficioUpdate', url('beneficios/update'),array('id'=>'urlBeneficioUpdate'));!!}

{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
@include('beneficios.partials.modal_create')
@include('beneficios.partials.modal_edit')

@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('beneficios') !!}
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {

				var dt = $('#tableBeneficio').DataTable( {
			 
			 		"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
					 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
                    "bProcessing": true,
                    
			        "ajax": $('#getUrlBeneficio').val(),

			        "columns": [
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
            var data = $('#form-edit-beneficio').serialize();
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-edit-beneficio').attr('action')+'/'+$(this).attr('id') ,
                success : function(json) {


					$('div#boyd-modal div div input#nombre').val(json.nombre);

					$('div#boyd-modal div div input#id').val(json.id);

                    $('#modal_edit_beneficio').modal('show'); 


          
                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            
            
        });

		$('#btnUpdateBeneficio').on('click',function(){
	            var data = $('#form-edit-beneficio').serialize();
	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
	               data:data,
	                //Cambiar a type: POST si necesario
	                type: "put",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#urlBeneficioUpdate').val()+'/'+$('#id').val(),
	                success : function(json) {
                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    $('#modal_edit_beneficio').modal('hide');

                            $("html, body").animate({ scrollTop: 0 }, 600);         
                            dt.ajax.reload(); 
                    dt.ajax.reload();        
	          
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

		$('#btnCreateBeneficio').on('click',function(){
		    var data = $('#form-save-beneficio').serialize();

		    $.ajax({
		        // En data puedes utilizar un objeto JSON, un array o un query string
		       data:data,
		        //Cambiar a type: POST si necesario
		        type: "post",
		        // Formato de datos que se espera en la respuesta
		        dataType: "json",
		        // URL a la que se enviará la solicitud Ajax
		        url:$('#form-save-beneficio').attr('action') ,
		        success : function(json) {
 		            $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
		            $('#modal_crear_beneficio').modal('hide'); 
		            dt.ajax.reload();  
		        },

		        error : function(xhr, status) {
		        	responseJSON =  JSON.parse(xhr.responseText);

		            var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
		                for(var key in responseJSON)
		                {
		                    html += "<li>" + responseJSON[key][0] + "</li>";
		                }
		                $('#message-modal-create').html(html+'</div>');


		        },
		    }); 

			});

        $('table').on('click','.btn-delete', function(e){
            if(confirm("Esta seguro que desea eliminar el registro seleccionado?."))
            {
                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                    data:{_token :$('#getToken').val(), id: $(this).attr('id')},
                    //Cambiar a type: POST si necesario
                    type: "post",
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url:$('#urlBeneficioDestroy').val() ,
 					    success : function(json) {
					  	var html = '<div class="alert alert-success fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('.message').html(html);
                            $("html, body").animate({ scrollTop: 0 }, 600);			
							dt.ajax.reload();
						},

					    error : function(xhr, status) {
					    	alert('El usuario no fue eliminado');
							
					        console.log('Disculpe, existió un problema ');
					    },
                }); 
            
            }
            
        });

		} );

	</script>
@endsection