@extends('layout.app')

@section('Dashboard') Beneficios @endsection

@section('content')



<div class="col-md-1" ></div>
    <div class="col-md-5" >

		@include('partials.error')

		{!! Form::open(['url'=>'beneficios/store', 'method'=>'POST'])!!}

		@include('beneficios.partials.fields')



		<button type="submit" class="btn btn-default">Guardar</button>
		{!!Form::close()!!}
	</div>



@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('beneficiosCrear') !!}
@endsection