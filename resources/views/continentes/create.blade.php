@extends('layout.app')

@section('Dashboard') Continentes @endsection

@section('content')



<div class="col-md-1" ></div>
    <div class="col-md-5" >

		@include('partials.error')

		{!! Form::open(['url'=>'continentes/store', 'method'=>'POST'])!!}

		@include('continentes.partials.fields')



		<button type="submit" class="btn btn-default">Guardar</button>
		{!!Form::close()!!}
	</div>



@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('continentesCrear') !!}
@endsection