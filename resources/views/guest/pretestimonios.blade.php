@extends('internet.app')


@section('content')

<h2>TESTIMONIOS DE INTERCAMBIO</h2>
<br>
<br>
<p>No hay mejor motivación que conocer las experiencias de tus compañeros que ya vivieron el Intercambio. Esperamos tu testimonio al final de tu estadía para compartirlo en nuestra página web. </p>


<div class="log">
            <a href="{{url('internet/testimonios')}}"  class="btn btn-default btn-ms active " role="button"> Ir a testimonios   <i class='fa fa-book '></i> </a>
            </div>

@endsection

<style type="text/css">

.log a{
    padding: 0px 0px 0px 15px;
    font-size: 1.4em;
    position: absolute;
    right: 60px;
    bottom: 17px;
    font-family: sans-serif;
}

.log i{
    padding: 0px 10px 0px 15px;
    color: white;
}

.log .btn{
    background: grey;

}

#scroll #contenedor a {
    color: white;
    text-decoration: none;
}

    
</style>
