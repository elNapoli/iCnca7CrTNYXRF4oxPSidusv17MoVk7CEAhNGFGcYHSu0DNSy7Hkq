@extends('layout.app')

@section('Dashboard') Ciudades @endsection

@section('content')

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-1" ></div>
    <div class="col-md-9" >

		<div class="panel panel-default">

			@include('partials.success')
		  <div class="panel-heading"><a class="btn-info btn" href="{{ route('ciudades.create')}}">Crear ciudad</a></div>

		  <!-- Table -->
			@include('ciudades.partials.table')
		

		</div>
    </div>

</div>




@endsection




