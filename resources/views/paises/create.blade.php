	@extends('layout.app')

@section('Dashboard') Paises @endsection

@section('content')



<div class="col-md-1" ></div>
    <div class="col-md-4" >

		@include('partials.error')

		{!! Form::open(['url'=>'paises/store', 'method'=>'POST'])!!}

		@include('paises.partials.fields')



		<button type="submit" class="btn btn-default">Guardar</button>
		{!!Form::close()!!}
	</div>



@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('paisesCrear') !!}
@endsection