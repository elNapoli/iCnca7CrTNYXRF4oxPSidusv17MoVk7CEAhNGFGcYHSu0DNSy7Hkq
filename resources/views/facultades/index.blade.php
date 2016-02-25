@extends('intranet.app')

@section('content')

		  <div class="panel-heading"><a class="btn-info btn" href="{{ url('facultades/create')}}">Crear facultad</a></div>



			@include('facultades.partials.table')


@include('facultades.partials.modal_create')
@include('facultades.partials.modal_edit')
{!!Form::hidden('getUrlFacultades', url('facultades/facultades'),array('id'=>'getUrlFacultades'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlFacultadUpdate', url('facultades/update'),array('id'=>'getUrlFacultadUpdate'));!!}




@endsection


@section('scripts')

	<script type="text/javascript">
		$(document).ready(function() {

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

	$('table').on('click','.model-open-edit', function(e){
			$('#modal_edit_facultad').modal('show');
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
                    $('div#boyd-modal div div input#campus_sede').val(json.campus_sedes_r.nombre);
                    $('div#boyd-modal div div input#universidad').val(json.campus_sedes_r.universidad_r.nombre);
                    $('#modal_edit_facultad').modal('show'); 
          

                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            
            
        });

        $('#btnEditfacultad').on('click', function(e){

            var data = $('#form-edit').serialize();
            alert(data)
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#getUrlFacultadUpdate').val()+'/'+$('#id').val(),
                success : function(json) {
                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    $('#modal_edit_carrera').modal('hide'); 
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

		} );

	</script>
@endsection