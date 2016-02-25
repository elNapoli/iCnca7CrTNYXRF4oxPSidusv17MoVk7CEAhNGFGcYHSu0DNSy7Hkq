@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
  {!! Form::model(['url'=>['contacto-en-extranjero/store-and-update'], 'method'=>'post','id'=>'form-save-contacto-extranjero']) !!}
      		<div class="message"></div>
             
			@include('cursosNoUach.partials.table')
  {!!Form::close()!!}
{!!Form::hidden('getUrlCursosNoUach', url('cursos-no-uach/cursos-no-uach'),array('id'=>'getUrlCursosNoUach'));!!}
{!!Form::hidden('getUrlAsignaturasByCarrera', url('asignaturas/asignaturas-by-carrera'),array('id'=>'getUrlAsignaturasByCarrera'));!!}
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
{!!Form::hidden('getUrlSolicitudCursoStore',url('solicitud-curso/store-and-update'),array('id'=>'getUrlSolicitudCursoStore'));!!}
{!!Form::hidden('getUrlSolicitudCursoDestroy',url('solicitud-curso/destroy'),array('id'=>'getUrlSolicitudCursoDestroy'));!!}

  
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection
@section('scripts')
	<script>
		 $(document).on('ready',function(){

 			

 			var dt = $('#tableCursosNoUach').DataTable( {

	            'searching':false,
	            'paging':false,
	            "ajax": $('#getUrlCursosNoUach').val(),

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
	                },
	                { "data": null,
	                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
	                        var html = "<a href='#!'  class='addCurso'> Agregar</a>";

	                        if(sData.semestre != ''){

	                            html = "<a href='#!' id='"+oData.id+"' class='btn-delete' > eliminar</a>";
	                        }              
	                        $(nTd).html(html);

	                    }
	                }

	        
	                   
	            ],
	        });


            selectByTabs("table#tableCursosNoUach",'#codigo_carrera-0','#_token','#getUrlAsignaturasByCarrera','#codigo_asignatura-0');
            $('#tableCursosNoUach').on('click','.btn-delete',function(){

	            $.ajax({
	                                  
	                async : false,
	                data:{
	                    _token: $('#_token').val(),
	                    id: $(this).attr('id'),

	                },
	                //Cambiar a type: POST si necesario
	                type: 'POST',
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#getUrlSolicitudCursoDestroy').val() ,
	                success : function(json) {   
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');  
	                    dt.ajax.reload();              
	             
	                    
	                },

	                error : function(xhr, status) {
	                    alert(status);
	              
	                },
	                


	            });
	        });
            $('#tableCursosNoUach').on('click','.addCurso',function(){

	         
	            $.ajax({
	                async : false,
	                data:{
	                    _token: $('#_token').val(),
	                    asignatura: $('table#tableCursosNoUach #codigo_asignatura-0').val(),

	                },
	                //Cambiar a type: POST si necesario
	                type: 'POST',
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#getUrlSolicitudCursoStore').val() ,
	                success : function(json) {   
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');  
	                    dt.ajax.reload();              
	             
	                    
	                },

	                error : function(xhr, status) {
	                    alert(status);
	              
	                },
	                


	            });
            })

		 });
	</script>
@endsection