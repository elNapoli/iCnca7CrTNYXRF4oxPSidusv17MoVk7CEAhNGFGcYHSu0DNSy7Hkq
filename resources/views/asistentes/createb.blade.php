@extends('layout.app')

@section('Dashboard') Asistente @endsection

@section('content')



<div class="col-md-1" ></div>
    <div class="col-md-5" >

		@include('partials.error')

		{!! Form::open(['url'=>'detalle/add', 'method'=>'POST'])!!}

		<div class="form-group">

  	{!!  Form::label('beneficio', ' Agregar beneficio ')!!}
	{!!  Form::select('beneficio', [null=>'Seleccione un beneficio']+$beneficios,null,array('class' => 'form-control'))!!}
		<button id="add_b" type="button" class="btn btn-default">Guardar y Terminar</button>
		{!!Form::close()!!}
	</div>

	{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('beneficiosCrear') !!}
@endsection

@section('scripts')
<script type="text/javascript">

    $(document).ready(function(){
    });

</script>
@endsection