@extends('layout.app')

@section('Dashboard') Continentes @endsection

@section('content')




<div class="col-md-1" ></div>
<div class="col-md-5" >

	@include('partials.error')

	{!! Form::model($facultad, ['url'=>['ciudades/update',$facultad->id], 'method'=>'PUT']) !!}
	@include('facultades.partials.fields')

		<button type="submit" class="btn btn-default">Editar</button>

	{!!Form::close()!!}


	

		{!! Form::open(['url'=>['ciudades/destroy',$facultad->id], 'method'=>'DELETE']) !!}
			<button  tye="submit" onClick="return confirm('Esta seguro de eliminar el registro?')" class="btn-danger btn"> Eliminar continente</button>
		{!! Form::close()!!}
</div>



@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('ciudadesEditar',$facultad) !!}
@endsection



@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {

	
 			getListForSelect($('#urlCampusByUniversidad').val(),
 							 $('#getToken').val(), 
 							 $("#universidad").val(), 'campus_sede');	

		


		});

	</script>
@endsection