@extends('intranet.app')

@section('content')

                <h3><i class="fa fa-angle-right"></i> Asignaturas!</h3>
                <hr>
<div class="row">

	  <!-- Default panel contents -->
    <div class="col-md-0" ></div>
    <div class="col-md-12" >

		<div class="panel panel-default">
		<div class="panel-heading"><a class="btn btn-info" data-toggle="modal" data-target="#modal_crear_asignatura" href="#!">Crear Asignatura</a></div>

		  <!-- Table -->
		  <div class="message"></div>	
			@include('asignaturas.partials.table')


		</div>
    </div>

</div>

{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlasignaturas', url('asignaturas/asignaturas'),array('id'=>'getUrlasignaturas'));!!}
{!!Form::hidden('urlAsignaturaDestroy', url('asignaturas/destroy'),array('id'=>'urlAsignaturaDestroy'));!!}
{!!Form::hidden('urlAsignaturaUpdate', url('asignaturas/update'),array('id'=>'urlAsignaturaUpdate'));!!}

{!!Form::hidden('getUrlCampusSedeByUniversidad', url('asignaturas/campus-sede-by-universidad'),array('id'=>'getUrlCampusSedeByUniversidad'));!!}
{!!Form::hidden('getUrlFacultadByCampusSede', url('asignaturas/facultad-by-campus-sede'),array('id'=>'getUrlFacultadByCampusSede'));!!}
{!!Form::hidden('getUrlCarreraByFacultad', url('asignaturas/carreras-by-facultad'),array('id'=>'getUrlCarreraByFacultad'));!!}

@include('asignaturas.partials.modal_edit')
@include('asignaturas.partials.modal_create')
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('departamentos') !!}

@endsection

@section('scripts')
    {!! Html::Script('js/funciones.js') !!}
	<script type="text/javascript">
		$(document).ready(function() {

				var dt = $('#tableAsignaturas').DataTable( {
			 
			 		"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
					 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
                    "bProcessing": true,
                    
			        "ajax": $('#getUrlasignaturas').val(),

			        "columns": [
			            { "data":"codigo" },
			            { "data":"nombre" },
			            { "data":"nivel" },
			            { "data":"anio" },
			            { "data":"carrera_r.nombre" },
			            { "data":"carrera_r.facultad_r.campus_sedes_r.universidad_r.nombre" },
			            { "data": null,
			                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                $(nTd).attr('align','center');
                                
			                    $(nTd).html("<a href='#!' id ='"+oData.codigo+"' class='model-open-edit btn btn-primary btn-xs'> <i class='fa fa-pencil'></i></a>"+
			                                "<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+oData.codigo+"'>  <i class='fa fa-trash-o'></i></a>"
			                        );

			                }
			            }
			       
			        ]
			    } );




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
                    url:$('#urlAsignaturaDestroy').val() ,
					    success : function(json) {
					  	var html = '<div class="alert alert-danger fade in">'+
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

		$('#btnUpdateAsignatura').on('click',function(){
	            var data = $('#form-edit-asignatura').serialize();
	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
	               data:data,
	                //Cambiar a type: POST si necesario
	                type: "put",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#urlAsignaturaUpdate').val()+'/'+$('#codigo').val(),
	                success : function(json) {
					  	var html = '<div class="alert alert-success fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('.message').html(html);
                            $("html, body").animate({ scrollTop: 0 }, 600);
                            $('#modal_edit_asignatura').modal('hide'); 			
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

		$('table').on('click','.model-open-edit', function(e){
            var data = $('#form-edit-asignatura').serialize();
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-edit-asignatura').attr('action')+'/'+$(this).attr('id') ,
                success : function(json) {

					$('div#boyd-modal div div input#carrera').val(json.carrera_r.nombre);
					$('div#boyd-modal div div input#facultad').val(json.carrera_r.facultad_r.nombre);
					$('div#boyd-modal div div input#campus_sede').val(json.carrera_r.facultad_r.campus_sedes_r.nombre);
					$('div#boyd-modal div div input#universidad').val(json.carrera_r.facultad_r.campus_sedes_r.universidad_r.nombre);

					$('div#boyd-modal div div input#nombre').val(json.nombre);
					$('div#boyd-modal div div input#codigo').val(json.codigo);
					$('div#boyd-modal div div input#anio').val(json.anio);
					$('div#boyd-modal div div select#nivel').val(json.nivel);

                    $('#modal_edit_asignatura').modal('show'); 


          
                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            
            
        });

		$('#btnCreateAsignatura').on('click',function(){
		    var data = $('#form-save-asignatura').serialize();

		    $.ajax({
		        // En data puedes utilizar un objeto JSON, un array o un query string
		       data:data,
		        //Cambiar a type: POST si necesario
		        type: "post",
		        // Formato de datos que se espera en la respuesta
		        dataType: "json",
		        // URL a la que se enviará la solicitud Ajax
		        url:$('#form-save-asignatura').attr('action') ,
		        success : function(json) {

		            $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
		            $('#modal_crear_asignatura').modal('hide'); 
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

    selectByTabs('div#boyd-modal','#universidad','#getToken','#getUrlCampusSedeByUniversidad','#campus_sede');
    selectByTabs("div#boyd-modal",'#campus_sede','#getToken','#getUrlFacultadByCampusSede','#facultad');
    selectByTabs("div#boyd-modal",'#facultad','#getToken','#getUrlCarreraByFacultad','#carrera');


		} );

	</script>
@endsection