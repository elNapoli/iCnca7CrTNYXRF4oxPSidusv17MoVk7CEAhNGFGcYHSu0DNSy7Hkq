@extends('layout.app')

@section('content')



<div class="col-md-1" ></div>
<div class="col-md-5" >

	@include('partials.error')

	{!! Form::model($departamento, ['url'=>['departamentos/update',$departamento->id], 'method'=>'PUT']) !!}

	@include('departamentos.partials.fields2')

	<button type="submit" class="btn btn-default">Editar</button>

	{!!Form::close()!!}

</div>



@endsection


