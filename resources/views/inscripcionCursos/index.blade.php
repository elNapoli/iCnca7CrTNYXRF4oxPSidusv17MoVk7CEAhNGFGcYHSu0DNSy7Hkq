@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
  {!! Form::model(['url'=>['inscripcion-cursos/store-and-update'], 'method'=>'post','id'=>'form-save-inscripcion-cursos']) !!}
      		<div class="message"></div>
			@include('inscripcionCursos.partials.table')
             
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
		                        //$(nTd).attr('data','jojo');
		                        var html = '';
		                        $(nTd).html(sData.nom_carrera);

		                        if(sData.id === ''){
		                            html = '<option value ="">Seleccione Carrera</option>';
		                            disabled = '';
		                            $.each(oData.carreras, function(index, subCatObj){
		                           
		                                html = html + '<option value ="'+subCatObj.id+'">'+subCatObj.nombre+'</option>';
		                                
		                            });

		                            $(nTd).html('<select  id="codigo_carrera-'+iRow+'" mane="codigo_carrera-'+iRow+'" class=" codigo_asignatura_select form-control"> '+html+'</select>');

		                        }                     

		                    }
	                },
	                { "data": null,
	                    	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
		                        //$(nTd).attr('data','jojo');
		                        var html = '';
		                        $(nTd).html(sData.asignatura_codigo+": "+sData.asignatura_nombre);

		                        if(sData.id === ''){
		                            html = '<option value ="">Seleccione asignatura</option>';
		                            disabled = '';
		              

		                            $(nTd).html('<select  id="codigo_asignatura-'+iRow+'" mane="codigo_asignatura-'+iRow+'" class=" codigo_asignatura_select form-control"> '+html+'</select>');

		                        }                     

		                    }
	                },
	                { "data": null,
	                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
	                        var html = sData.semestre;
             
	                        $(nTd).html(html);

	                    }
	                }

	        
	                   
	            ],
	        });

		 });
	</script>
@endsection