@extends('layout.app')

@section('Dashboard') Beneficios @endsection

@section('content')



<div class="col-md-1" ></div>
<div class="col-md-5" >

	@include('partials.error')

	{!! Form::model($beneficio, ['url'=>['beneficios/update',$beneficio->id], 'method'=>'PUT']) !!}

	@include('beneficios.partials.fields')

		<button type="submit" class="btn btn-default">Editar</button>

	{!!Form::close()!!}


		{!! Form::open(['url'=>['beneficios/destroy',$beneficio->id], 'method'=>'DELETE']) !!}
			<button  tye="submit" onClick="return confirm('Esta seguro de eliminar el registro?')" class="btn-danger btn"> Eliminar beneficio</button>
		{!! Form::close()!!}
</div>



@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('beneficioEditar',$beneficio) !!}
@beneficio