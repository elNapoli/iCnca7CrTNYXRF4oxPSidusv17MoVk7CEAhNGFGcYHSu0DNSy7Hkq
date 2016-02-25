@extends('layout.app')


@section('content')



<div class="col-md-1" ></div>
    <div class="col-md-5" >

		@include('partials.error')

		{!! Form::open(['url'=>'ciudades/store', 'method'=>'POST'])!!}

		@include('ciudades.partials.fields')



		<button type="submit" class="btn btn-default">Guardar</button>
		{!!Form::close()!!}
	</div>



@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('ciudadesCrear') !!}
@endsection