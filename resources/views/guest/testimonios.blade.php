@extends('internet.app')


@section('content')

<h2>Testimonios</h2>


@foreach($testimonios as $item)
<div class="div_testimonio">
	<a href ="view-testimonio/{{$item->id}}""><h4> {{$item->postulanteR->nombre}} {{$item->postulanteR->apellido_paterno}} {{$item->postulanteR->apellido_materno}}, estudiante de {{$item->postulanteR->tipo_estudio}} de la carrera "{{$item->carrera}}"</h4></a>
</div>
@endforeach

{!!$testimonios->render()!!}
@endsection

@section('styles')
<style type="text/css">


.div_testimonio{


	border: solid 1px #585858;
	border-radius: 5px;
	margin-bottom: 4px;
	padding-left: 20px;

}
.div_testimonio:hover {
    opacity: 0.5;
  	-moz-box-shadow: 0 0 15px #848484;
  	 -webkit-box-shadow: 0 0 15px #848484; 
  	 box-shadow: 0 0 15px #848484; 
}
</style>
@endsection