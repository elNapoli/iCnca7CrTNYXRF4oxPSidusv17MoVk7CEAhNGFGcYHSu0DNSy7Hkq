@extends('layout.app')

@section('Dashboard') Universidad @endsection

@section('content')


                      
@include('universidades.partials.modal')
   

<div class="col-md-1" ></div>
    <div class="col-md-7" >

		@include('partials.error')

		{!! Form::open(['url'=>'universidades/store', 'method'=>'POST'])!!}
	    <div class="form-group">
        	<a href="#!" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#myModal"> Agregar Campus</a>
		</div>
		@include('universidades.partials.tabs')

		<button type="submit" class="btn btn-default">Guardar</button>
		{!!Form::close()!!}
	</div>


@endsection

@section('scripts')

<script type="text/javascript">

  $(document).ready(function(){

alert('asdf');

  });
</script>
@endsection








