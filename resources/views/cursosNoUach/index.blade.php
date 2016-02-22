@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
  {!! Form::model(['url'=>['contacto-en-extranjero/store-and-update'], 'method'=>'post','id'=>'form-save-contacto-extranjero']) !!}
      		<div class="message"></div>
             
			@include('cursosNoUach.partials.table')
  {!!Form::close()!!}
{!!Form::hidden('getUrlCarreras', url('carreras/all-carreras-uach'),array('id'=>'getUrlCarreras'));!!}
  
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection
@section('scripts')
	<script>
		 $(document).on('ready',function(){

 			

 			var dt = $('#tableCursosNoUach').DataTable( {

	            'searching':false,
	            'paging':false,
	            "ajax": $('#getUrlCarreras').val(),


	            "columns": [
	                { "data": "periodo" },
	                { "data": "periodo" },
	                { "data": "periodo" },
	                   
	            ],
	        });

		 });
	</script>
@endsection