@extends('layout.app')


@section('content')



<div class="col-md-1" ></div>
    <div class="col-md-5" >

		@include('partials.error')

		{!! Form::open(['url'=>'facultades/store', 'method'=>'POST'])!!}

		@include('facultades.partials.fields')



		<button type="submit" class="btn btn-default">Guardar</button>
		{!!Form::close()!!}
	</div>



@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {

			$('#universidad').on('change',function(e){
			e.preventDefault();
 			getListForSelect($('#urlCampusByUniversidad').val(),
 							 $('#getToken').val(), 
 							 $("#universidad").val(), 'campus_sede');	
			});


		});

	</script>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('ciudadesCrear') !!}
@endsection