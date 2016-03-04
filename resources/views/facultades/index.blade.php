@extends('intranet.app')

@section('content')
                <h3><i class="fa fa-angle-right"></i> Facultades!</h3>
                <hr>

        <div class="panel panel-default">
                <div class="panel-heading"><a class="btn btn-info" data-toggle="modal" data-target="#modal_crear_facultad" href="#!">Crear facultad</a></div>

            <div class="message"></div>
			@include('facultades.partials.table')


@include('facultades.partials.modal_create')
@include('facultades.partials.modal_edit')
{!!Form::hidden('getUrlFacultades', url('facultades/facultades'),array('id'=>'getUrlFacultades'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlFacultadUpdate', url('facultades/update'),array('id'=>'getUrlFacultadUpdate'));!!}
{!!Form::hidden('getUrlFacultadDestroy', url('facultades/destroy'),array('id'=>'getUrlFacultadDestroy'));!!}
{!!Form::hidden('urlCampusByUniversidad', url('universidades/campus-by-universidad'),array('id'=>'urlCampusByUniversidad'));!!}




@endsection


@section('scripts')
    {!! Html::Script('js/funciones.js') !!}

	<script type="text/javascript">
		$(document).ready(function() {
        
        selectByTabs("form",'#universidad','#getToken','#urlCampusByUniversidad','#campus_sede');   

	var dt = $('#tableFacultad').DataTable( {
			 
			 		"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
					 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
                    "bProcessing": true,

			        "ajax": $('#getUrlFacultades').val(),

			        "columns": [
			           { "data": "id",
                        "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html('<a href="#!" id="'+oData.id+'" class="model-open-edit">'+oData.id+'</a>');
                            }
                        },
			            { "data":"nombre" },
			            { "data":"campus_sedes_r.nombre" },
			            { "data":"campus_sedes_r.universidad_r.nombre" },
			            { "data":"telefono" },
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
        $('#btnCreatefacultad').on('click',function(){
            var data = $('#form-save-facultad').serialize();

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-save-facultad').attr('action') ,
                success : function(json) {

                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    dt.ajax.reload();            
                    $('#modal_crear_facultad').modal('hide'); 
          
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

            var data = $('#form-edit').serialize()
        //    alert($('#id'))
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-edit').attr('action')+'/'+$(this).attr('id') ,
                success : function(json) {
                      //  console.log(json);

                    $('div#boyd-modal div div input#nombre').val(json.nombre);
                    $('div#boyd-modal div div input#telefono').val(json.telefono);
                    $('div#boyd-modal div div input#id_facultad').val(json.id);
                    $('div#boyd-modal div div select#universidad').val(json.campus_sedes_r.universidad_r.id);

                    selectByTabsSinAccion("div#boyd-modal div div",'#getToken','#urlCampusByUniversidad','#campus_sede',json.campus_sedes_r.universidad_r.id,json.campus_sedes_r.id);

                    $('#modal_edit_facultad').modal('show'); 
          

                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            
            
        });


        $('table').on('click','.btn-delete', function(e){

                e.preventDefault(); // jquery evento prevent default (e)
                if(confirm("Desea eliminar el registro seleccionado.?")){
                    
                    var id    = $(this).attr('id') //captura el id de la fila seleccionada

                    var url   = $('#getUrlFacultadDestroy').val()+'/'+id; //remplazo el placeholder USER_ID con la id



                
                    $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data:{_token:$('#getToken').val()},
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

        $('#btnEditfacultad').on('click', function(e){


            var data = $('#form-edit').serialize();
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#getUrlFacultadUpdate').val(),
                success : function(json) {
                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    $('#modal_edit_facultad').modal('hide'); 
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

		} );

	</script>
@endsection