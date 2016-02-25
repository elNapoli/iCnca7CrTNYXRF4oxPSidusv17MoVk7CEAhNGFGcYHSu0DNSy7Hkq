@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
  {!! Form::open(['url'=>['inscripcion-cursos/update'], 'method'=>'post','id'=>'form-save-inscripcion-cursos']) !!}
      		<div class="message"></div>
			@include('inscripcionCursos.partials.table')
             <a href="#!" id="guardarprofesores">guardar cambios</a>
  {!!Form::close()!!}

{!!Form::hidden('gerUrlCursosInscritos',url('inscripcion-cursos/cursos-inscritos-aceptados'),array('id'=>'gerUrlCursosInscritos'));!!}
  
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection
@section('scripts')
	<script>
		 $(document).on('ready',function(){

 			var dt = $('#tableInscripcionCursos').DataTable( {

	            'searching':false,
	            'paging':false,
	            "ajax": $('#gerUrlCursosInscritos').val(),

	            "columns": [
	                { "data": null,
	                    	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
	          
		                        $(nTd).html(sData.detalle_solicitud_curso_r.asignatura_r.codigo);
     
		                    }
	                },
	                { "data": null,
	                    	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
		                        $(nTd).html(sData.detalle_solicitud_curso_r.asignatura_r.nombre);
		                                          

		                    }
	                },
	                { "data": null,
	                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
	                                  
	                        $(nTd).html('<input type="text" value="'+sData.profesor+'" id="profesor-'+iRow+'" name="profesor-'+iRow+'" class="form-control">'+
			
								'<input name="id-inscripcion-'+iRow+'" type="hidden" value="'+
								sData.detalle_solicitud_curso+'">');

	                    }
	                }

	        
	                   
	            ],
	        });
			


			$('#guardarprofesores').on('click',function(){
                data = $('#form-save-inscripcion-cursos').serialize();
				
                $.ajax({
                                  
	                async : false,
	                data:data,
	                //Cambiar a type: POST si necesario
	                type: 'POST',
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#form-save-inscripcion-cursos').attr('action') ,
	                success : function(json) {   
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');  
	                    dt.ajax.reload();
	             
	                    
	                },

	                error : function(xhr, status) {
	                     var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
	                        for(var key in xhr.responseJSON)
	                        {
	                            html += "<li>" + xhr.responseJSON[key][0] + "</li>";
	                        }
	                        $('.message').html(html+'</div>');
	              
	                },
	                

	            });


			});
		 });
	</script>
@endsection