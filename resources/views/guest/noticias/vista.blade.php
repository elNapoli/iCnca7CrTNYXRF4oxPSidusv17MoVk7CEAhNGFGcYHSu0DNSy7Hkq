@extends('internet.app2')

@section('content')


{!!html_entity_decode($noticia->cuerpo)!!}
<br>
<br>
<br>
<div class="log">
            <a href="{{url('internet/noticias')}}"  class="btn btn-default btn-ms active " role="button"> Regresar   <i class='fa fa-arrow-left '></i> </a>
            </div>


@endsection