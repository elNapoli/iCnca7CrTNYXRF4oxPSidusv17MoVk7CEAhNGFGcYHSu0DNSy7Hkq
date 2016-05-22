@extends('internet.app2')

@section('content')


{!!html_entity_decode($noticia->cuerpo)!!}


@endsection