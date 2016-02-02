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


		{!! Form::open(['url'=>['asistente/destroy',$asistentes->id], 'method'=>'DELETE']) !!}
			<button  tye="submit" onClick="return confirm('Esta seguro de eliminar el registro?')" class="btn-danger btn"> Eliminar asistentes</button>
		{!! Form::close()!!}
</div>



@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('beneficioEditar',$asistentes) !!}
@endsection


@section('scripts')
<script type="text/javascript">

	$(document).ready(function(){

	$('#beneficio').on('change',function(e){ 

		var as = $('$asistentes').val()
		var id = $(this).val() //paso la id del select por referencia
		alert(as)

	});

	});

</script>
@endsection