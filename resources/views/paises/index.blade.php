@extends('layout.app')

@section('Dashboard') Paises @endsection

@section('content')

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-1" ></div>
    <div class="col-md-6" >

		<div class="panel panel-default">

			@include('partials.success')
		  <div class="panel-heading"><a class="btn-info btn" href="{{ route('paises.create')}}">Crear país</a></div>

		  <!-- Table -->
			@include('paises.partials.table')
	

		</div>
    </div>

</div>




@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('paises') !!}
@endsection


