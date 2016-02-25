@extends('layout.app')
@section('content')



<div class="col-md-0" ></div>
    <div class="col-md-12" >

		@include('partials.error')

		{!! Form::open(['url'=>'asignaturas/store', 'method'=>'POST'])!!}

		@include('asignaturas.partials.fields')



		<button type="submit" class="btn btn-default">Guardar</button>
		{!!Form::close()!!}
	</div>



@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('beneficiosCrear') !!}
@endsection