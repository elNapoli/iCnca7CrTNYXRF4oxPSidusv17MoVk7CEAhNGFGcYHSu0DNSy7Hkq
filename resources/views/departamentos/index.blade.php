@extends('intranet.app')

@section('Dashboard') Departamentos @endsection

@section('content')


		  <div class="panel-heading"><a class="btn btn-info" data-toggle="modal" data-target="#modal_crear_departamento" href="#!">Crear departamento</a></div>

		  <!-- Table -->
			@include('departamentos.partials.table')


{!! Form::open(['url'=>['departamentos/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
{!!Form::hidden('urlDepartamentosDestroy', url('departamentos/destroy'),array('id'=>'urlDepartamentosDestroy'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlDepartamentos', url('departamentos/departamentos'),array('id'=>'getUrlDepartamentos'));!!}
{!!Form::hidden('urlDepartamentoUpdate', url('departamentos/update'),array('id'=>'urlDepartamentoUpdate'));!!}

@include('departamentos.partials.modal_create')
@include('departamentos.partials.modal_edit')

@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('departamentos') !!}
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {

				var dt = $('#tableDepartamentos').DataTable( {
			 
			 		"lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
					 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
                    "bProcessing": true,
                    "scrollX": true,
			        "ajax": $('#getUrlDepartamentos').val(),


			        "columns": [
			            { "data":"id" },
			            { "data":"tipo" },
			            { "data":"sitio_web" },
			            { "data":"nombre_encargado" },
			            { "data":"telefono" },
			            { "data":"email" },
			            { "data":"campus_sede_r.nombre" },
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

		$('#btnCreateDepartamento').on('click',function(){
		    var data = $('#form-save-departamento').serialize();

		    $.ajax({
		        // En data puedes utilizar un objeto JSON, un array o un query string
		       data:data,
		        //Cambiar a type: POST si necesario
		        type: "post",
		        // Formato de datos que se espera en la respuesta
		        dataType: "json",
		        // URL a la que se enviará la solicitud Ajax
		        url:$('#form-save-departamento').attr('action') ,
		        success : function(json) {

		            $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
		            $('#departamento').modal('hide'); 
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

        $('table').on('click','.model-open-edit', function(e){
            var data = $('#form-edit-departamento').serialize();
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-edit-departamento').attr('action')+'/'+$(this).attr('id') ,
                success : function(json) {

					$('div#boyd-modal div div fieldset input#campus_sede').val(json.campus_sede_r.nombre);
					$('div#boyd-modal div div fieldset input#tipo').val(json.tipo);
					$('div#boyd-modal div div input#telefono').val(json.telefono);
					$('div#boyd-modal div div input#email').val(json.email);
					$('div#boyd-modal div div input#nombre_encargado').val(json.nombre_encargado);
					$('div#boyd-modal div div input#sitio_web').val(json.sitio_web);
					$('div#boyd-modal div div input#id').val(json.id);

                    $('#modal_edit_departamento').modal('show'); 


          
                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            
            
        });


			$('#btnUpdateDepartamento').on('click',function(){
	            var data = $('#form-edit-departamento').serialize();
	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
	               data:data,
	                //Cambiar a type: POST si necesario
	                type: "put",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#urlDepartamentoUpdate').val()+'/'+$('#id').val(),
	                success : function(json) {
                            var html = '<div class="alert alert-success fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('#message-modal-edit').html(html);

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
                    url:$('#urlDepartamentosDestroy').val() ,
					    success : function(json) {
					    	alert(json.message);				
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