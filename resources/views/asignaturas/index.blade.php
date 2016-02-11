@extends('layout.app')

@section('content')

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-0" ></div>
    <div class="col-md-12" >

		<div class="panel panel-default">

			@include('partials.success')
		  <div class="panel-heading"><a class="btn-info btn" href="{{ url('asignaturas/create')}}">Crear asignatura</a></div>

		  <!-- Table -->
			@include('asignaturas.partials.table')


		</div>
    </div>

</div>

{!!Form::hidden('getUrlasignaturas', url('asignaturas/asignaturas'),array('id'=>'getUrlasignaturas'));!!}


@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('departamentos') !!}
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {

				var dt = $('#tableAsignaturas').DataTable( {
			 
			 		"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
					 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},

			        "ajax": $('#getUrlasignaturas').val(),


			        "columns": [
			            { "data":"codigo" },
			            { "data":"nombre" },
			            { "data":"nivel" },
			            { "data":"anio" },
			            { "data":"carrera_r.nombre" },
			            { "data":"carrera_r.facultad_r.campus_sede_r.universidad_r.nombre" },
			            { "data": null,
			                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
			                    $(nTd).html("<a href='asignaturas/edit/"+oData.id+"' class='btn-edit'> Edit</a>"+
			                                "<a href='#!' class='btn-delete' id='"+oData.id+"'> Del</a>"
			                        );

			                }
			            }
			       
			        ]
			    } );




        $('table').on('click','.btn-delete', function(e){
            if(confirm("Press a button!\nEither OK or Cancel."))
            {
                alert($(this).attr('id'))
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