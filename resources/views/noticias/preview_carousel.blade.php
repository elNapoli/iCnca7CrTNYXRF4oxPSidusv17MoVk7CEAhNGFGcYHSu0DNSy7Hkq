@extends('intranet.app')

@section('Dashboard') Beneficios @endsection

@section('content')

	<div class="row">
	<div class="col-lg-11">
		@include('noticias.partials.carousel')
	</div>
</div>
<style type="text/css">

.carousel-inner {
    height: 350px;
    width: 100%;
}

.carousel-inner .item {
    overflow: hidden;
    width: 100%;
    max-height: 100%;
}

.carousel-inner .item img {
	width: 100%;
	height: 350px;
	margin-left: auto;
    margin-right: auto;
    margin-bottom: auto;
    max-height: none;
}

.carousel-caption h3{
	font-size: 2em;
}

.carousel-caption p{
	font-size: 1.2em;
}

#carousel-example-geberuc{
	background: red;
}


</style>
@endsection