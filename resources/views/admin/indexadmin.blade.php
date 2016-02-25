@extends('intranet.app')

@section('Dashboard') Panel Administrador @endsection

@section('content')


			@include('admin.partials.table')



{!! Form::open(['route'=>['admin.usuarios.destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}


@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function (){
		$('.btn-delete').click(function(e){ //vincula la funcion del boton al ser presionado

			e.preventDefault(); // jquery evento prevent default (e)
			var row   = $(this).parents('tr');
			var id    = row.data('id'); //captura el id de la fila seleccionada
			var form  = $('#form-delete'); //traigo la id
			var url   =  form.attr('action').replace(':USER_ID',id); //remplazo el placeholder USER_ID con la id
			var data  = form.serialize();

			

			$.post(url,data,function(result){  //peticion ajax vincula los datos obtenidos para dar funcionalidad al boton
				alert(result);				
				row.fadeOut(); //solo se elimina cuando se completa transaccion
			}).fail(function(){
				alert('El usuario no fue eliminado');
				row.show();
			});
		});


//Opciones tablas
		    $('#tableContinente').DataTable( {
		        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        }
		    } );
 });


</script>
@endsection

