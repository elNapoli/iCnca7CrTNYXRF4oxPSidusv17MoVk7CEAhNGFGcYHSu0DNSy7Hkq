@extends('intranet.app')

@section('content')

                <h3><i class="fa fa-angle-right"></i> Asistentes!</h3>
                <hr>

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-0" ></div>
    <div class="col-md-12" >

		<div class="panel panel-default">

			@include('partials.success')
		  <div class="panel-heading"><a class="btn-info btn" href="{{ url('asistentes/create')}}">Crear asistente</a></div>

		  <!-- Table -->
		  <div class="message"></div>
			@include('asistentes.partials.table')


		</div>
    </div>

</div>


{!! Form::open(['url'=>['asistentes/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}


<!-- formulario que vincula la accion en destruir beneficio (en desarrollo porque aun no sirve el boton xD) -->
{!! Form::open(['url'=>['asistentes/destroy-benef',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
	{!!Form::hidden('urlAsistenteDestroy', url('asistentes/destroy'),array('id'=>'urlAsistenteDestroy'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlAsistentes', url('asistentes/asistentes'),array('id'=>'getUrlAsistentes'));!!}

@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('asistentes') !!}
@endsection

@section('scripts')
{!! Html::Script('js/funciones.js') !!}
	<script type="text/javascript">
		$(document).ready(function() {

		var dt = $('#tableAsistente').DataTable( {
			 
			 		"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
					 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
                    "bProcessing": true,
                    
			        "ajax": $('#getUrlAsistentes').val(),

			        "columns": [
			            { "data":"nombre" },
			            { "data":"pre_uachs_r.pregrado_r.postulante_r.nombre"},
			            { "data":"pre_uachs_r.pregrado_r.postulante_r.apellido_paterno"},
			            { "data": null,
			                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                $(nTd).attr('align','center');
                                
			                    $(nTd).html("<a href='asistentes/edit/"+oData.id+"' class='model-open-edit btn btn-primary btn-xs'> <i class='fa fa-pencil'></i></a>"+
			                                "<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+oData.id+"'>  <i class='fa fa-trash-o'></i></a>"
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
                    url:$('#urlAsistenteDestroy').val() ,
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



});
	</script>
@endsection