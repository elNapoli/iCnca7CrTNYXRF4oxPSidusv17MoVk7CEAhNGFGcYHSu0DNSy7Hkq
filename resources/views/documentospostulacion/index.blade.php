@extends('layout.app')

@section('content')

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-0" ></div>
    <div class="col-md-12" >

		<div class="panel panel-default">

			@include('partials.success')
		  <div class="panel-heading"><a class="btn-info btn" href="{{ url('pdf/invoice-download')}}">Descargar Formulario Postulante</a></div>
		  <div class="panel-heading"><a class="btn-info btn" href="{{ url('pdf/invoice')}}">Visualizar Formulario Postulante</a></div>

		  <!-- Table -->
	

		</div>
    </div>

</div>

@endsection