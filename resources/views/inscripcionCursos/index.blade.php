@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
  {!! Form::model(['url'=>['inscripcion-cursos/store-and-update'], 'method'=>'post','id'=>'form-save-inscripcion-cursos']) !!}
      		<div class="message"></div>
			@include('inscripcionCursos.partials.table')
             <a href="#!">guardar cambios</a>
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
	                                  
	                        $(nTd).html('<input type="text" value="'+sData.profesor+'" id="parentesco" name="parentesco" class="form-control">');

	                    }
	                }

	        
	                   
	            ],
	        });

		 });
	</script>
@endsection