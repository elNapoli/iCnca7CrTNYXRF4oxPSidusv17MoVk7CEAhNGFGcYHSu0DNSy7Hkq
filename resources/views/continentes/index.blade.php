@extends('layout.app')

@section('Dashboard') Continentes @endsection

@section('content')

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-1" ></div>
    <div class="col-md-8" >

		<div class="panel panel-default">

			@include('partials.success')
		  <div class="panel-heading"><a class="btn-info btn" href="{{ route('continentes.create')}}">Crear continente</a></div>

		  <!-- Table -->
			@include('continentes.partials.table')


		</div>
    </div>

</div>




@endsection




