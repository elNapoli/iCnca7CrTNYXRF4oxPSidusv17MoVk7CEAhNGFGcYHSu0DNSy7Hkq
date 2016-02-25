@extends('layout.app')

@section('Dashboard') Departamentos @endsection

@section('content')

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-0" ></div>
    <div class="col-md-12" >

		<div class="panel panel-default">

			@include('partials.success')
		  <div class="panel-heading"><a class="btn-info btn" href="{{ url('departamentos/create')}}">Crear departamento</a></div>

		  <!-- Table -->
			@include('departamentos.partials.table')


		</div>
    </div>

</div>

{!! Form::open(['url'=>['departamentos/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
{!!Form::hidden('urlDepartamentosDestroy', url('departamentos/destroy'),array('id'=>'urlDepartamentosDestroy'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlDepartamentos', url('departamentos/departamentos'),array('id'=>'getUrlDepartamentos'));!!}



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
			                    $(nTd).html("<a href='departamentos/edit/"+oData.id+"' class='btn-edit'> Edit</a>"+
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