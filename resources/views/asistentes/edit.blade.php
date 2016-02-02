@extends('layout.app')

@section('Dashboard') Beneficios @endsection

@section('content')



<div class="col-md-1" ></div>
<div class="col-md-5" >

	@include('partials.error')

	{!! Form::model($asistentes, ['url'=>['asistentes/update',$asistentes->id], 'method'=>'PUT']) !!}

	@include('asistentes.partials.fields')

		<button type="submit" class="btn btn-default">Editar</button>

	{!!Form::close()!!}


</div>



@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('beneficioEditar',$asistentes) !!}
@endsection


@section('scripts')
<script type="text/javascript">

	$(document).ready(function(){


				    $('#tableDtealleBeneficio').DataTable( {
		        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        }
		    } );

	$('#beneficio').on('change',function(e){ 

		var id = $(this).val() //paso la id del select por referencia
		alert(id)

	});

	});

</script>
@endsection