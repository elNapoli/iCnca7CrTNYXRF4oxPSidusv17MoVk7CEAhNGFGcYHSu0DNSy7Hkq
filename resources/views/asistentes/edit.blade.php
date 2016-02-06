@extends('layout.app')

@section('Dashboard') Beneficios @endsection

@section('content')



<div class="col-md-1" ></div>
<div class="col-md-5" >

	@include('partials.error')

	{!! Form::model($asistentes, ['url'=>['asistentes/update',$asistentes->id], 'method'=>'PUT', 'id'=>'form_edit']) !!}
	{!!Form::hidden('asistente',$asistentes->id,array('id'=>'asistente'));!!}
	

		@include('asistentes.partials.fields')



	{!!Form::close()!!}

	{!! Form::open(['url'=>['detalles/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}




	{!!Form::hidden('urlBeneficioDestroy', url('detalles/destroy'),array('id'=>'urlBeneficioDestroy'));!!}
	{!!Form::hidden('urlBeneficioAdd', url('detalles/add'),array('id'=>'urlBeneficioAdd'));!!}
	{!!Form::close()!!}




</div>


{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('beneficioEditar',$asistentes) !!}
@endsection


@section('scripts')
<script type="text/javascript">

	$(document).ready(function(){



	$('#tableDetalleBeneficio').DataTable( {
		        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        }
		    } );

	$('#beneficio').on('change',function(e){ 

		var id = $(this).val() //paso la id del select por referencia
		var form  = $('#form_edit');
		alert(form.serialize())

	});


	$('#add_b').on('click',function(e){ //boton para añadir beneficios en edit
		e.preventDefault(); // jquery evento prevent default (e)

		if(confirm("Esta seguro que desea añador este beneficio!\nEither OK or Cancel.")){
					var id_a	= $('#asistente').val();//$('#asistente').val();
					var beneficio    = $('#beneficio').val(); //captura el id del select 
					var form  = $('#form-edit'); //traigo la id
					alert(id_a)
					alert(beneficio)
					var url   = $('#urlBeneficioAdd').val(); //remplazo el placeholder USER_ID con la id
					var data  = {id_a:id_a,beneficio:beneficio,_token:$('#getToken').val()}




					$.ajax({
					    // En data puedes utilizar un objeto JSON, un array o un query string
					   data:data,
					    //Cambiar a type: POST si necesario
					    type: "post",
					    // Formato de datos que se espera en la respuesta
					    dataType: "json",
					    // URL a la que se enviará la solicitud Ajax
					    url:url ,
					    success : function(json) {
					    	alert(json.message);				
							row.show(); //solo se elimina cuando se completa transaccion
						},

					    error : function(xhr, status) {
					    	alert('El beneficio no fue añadido');
							row.fadeOut();
					        console.log('Disculpe, existió un problema ');
					    },
					});		
				}

	});

	$('.btn-delete').on('click',function(e){
				e.preventDefault(); // jquery evento prevent default (e)

				if(confirm("El boton funciona!\nEither OK or Cancel.")){
					
					var row   = $(this).parents('tr');
					var id_a	= row.data('id')//$('#asistente').val();
					var id_b    = /*$('#asistente').val();*/row.data('benef'); //captura el id de la fila seleccionada
					var form  = $('#form-delete'); //traigo la id
					var url   = $('#urlBeneficioDestroy').val(); //remplazo el placeholder USER_ID con la id
					var data  = {id_a:id_a,id_b:id_b,_token:$('#getToken').val()}




					$.ajax({
					    // En data puedes utilizar un objeto JSON, un array o un query string
					   data:data,
					    //Cambiar a type: POST si necesario
					    type: "post",
					    // Formato de datos que se espera en la respuesta
					    dataType: "json",
					    // URL a la que se enviará la solicitud Ajax
					    url:url ,
					    success : function(json) {
					    	alert(json.message);				
							row.fadeOut(); //solo se elimina cuando se completa transaccion
						},

					    error : function(xhr, status) {
					    	alert('El usuario no fue eliminado');
							row.show();
					        console.log('Disculpe, existió un problema ');
					    },
					});		
				}

			});

	});

</script>
@endsection