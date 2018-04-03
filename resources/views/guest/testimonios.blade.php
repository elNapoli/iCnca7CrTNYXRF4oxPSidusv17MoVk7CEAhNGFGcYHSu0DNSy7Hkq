@extends('internet.app')


@section('content')

<div class="col-md-11">
<br>

<div class= "shape">TESTIMONIOS</div>
<p>No hay mejor motivación que conocer las experiencias de tus compañeros que ya vivieron el Intercambio. Esperamos tu testimonio al final de tu estadía para compartirlo en nuestra página web. </p>
<br>

@foreach($testimonios as $item)
<div class="div_testimonio">
	<a href ="view-testimonio/{{$item->id}}""><h4> {{$item->postulanteR->nombre}} {{$item->postulanteR->apellido_paterno}} {{$item->postulanteR->apellido_materno}}, estudiante de {{$item->postulanteR->tipo_estudio}} de la carrera "{{$item->carrera}}"</h4></a>
</div>

@endforeach

{!!$testimonios->render()!!}
@endsection

@section('styles')
<style type="text/css">

.shape{
  text-align:center;
  background-color:rgba(102, 102, 102, 1);
  width:200px;
  height:40px;
  line-height:40px;
  color:white;
  margin-bottom:20px;
  position:relative;
}
.shape:before{
  content:"";
  width:0px;
  height:0px;
  border-top:40px solid rgba(102, 102, 102, 1);
  border-right:40px solid transparent;
  position:absolute;
  left:100%;
  top:0px;
}

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