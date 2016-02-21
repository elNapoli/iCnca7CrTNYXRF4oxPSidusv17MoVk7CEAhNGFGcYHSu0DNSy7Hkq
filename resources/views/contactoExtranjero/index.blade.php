@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
	@include('contactoExtranjero.partials.fields')
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection
@section('scripts')
	<script>
		 $(document).on('ready',function(){


		 });
	</script>
@endsection