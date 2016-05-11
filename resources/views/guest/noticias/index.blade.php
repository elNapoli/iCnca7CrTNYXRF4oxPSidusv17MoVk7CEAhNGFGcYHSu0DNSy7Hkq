@extends('internet.app2')


@section('content')

		<div class="col-md-6" id="caja-seccion-titular">Noticias recientes</div>
		<div class="col-md-6" id="caja-seccion-titular">Todas
			<div id="search-div" class="form-group pull-right">
    			<input id="search-input" type="text" class="search form-control" placeholder="What you looking for?">
			</div>
		</div>

		<div class="col-md-6" id="reciente">
			<img id="img1" src="http://cdn.abclocal.go.com/content/kfsn/images/cms/26184_1280x720.jpg" alt="..."  hspace="0">
		</div>
		<div class="col-md-6" id="todas">
			@include('guest.noticias.partials.table')
		</div>

@endsection
<style type="text/css">

#caja-seccion-titular {
    background-image: url("http://noticias.uach.cl/paginas/verde/imagenes/fondo-tit-verde.jpg");
    color: #fff;
    display: block;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 20px;
    font-weight: bold;
    height: 40px;
    line-height: 25px;
    padding: 6px 0 0 6px;
}

#reciente {
	border: 1px solid #ccc;
	padding: 6px;
	height: 360px;
}

#search-div {
	padding-right: 10px;

}

#search-input {
	height: 25px;

}

#todas {
	border: 1px solid #ccc;
	padding: 6px;
	overflow-x: hidden;
	overflow-y: auto;
	height: 360px;
}

#img1 {
	width:100%;
	height: 350px;
}

#img2 {
	width:100%;
	height: 50px;
}

.table tr {
	height:50px;
	width:100%;
}
.table {
	padding: 6px;
}

#td1 {
	height:50px;
	width:90px;
}

#td2 {
	font-family: Arial,Helvetica,sans-serif;
    font-size: 15px;
    text-align: center
}
</style>

@section('scripts')
{!! Html::Style('plugins/dataTables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')!!}
{!! Html::Script('plugins/dataTables/media/js/jquery.dataTables.min.js') !!}
    {!! Html::Script('plugins/dataTables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}
	<script type="text/javascript">
		$(document).ready(function() {

		} );

	</script>
@endsection