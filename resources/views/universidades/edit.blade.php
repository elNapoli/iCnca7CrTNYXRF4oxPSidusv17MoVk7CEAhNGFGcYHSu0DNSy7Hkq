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




    <div class="form-group">
        	<a href="#!" class="btn btn-primary btn-outline" id="holahola"> validando Campus</a>

		</div>
@endsection


@section('scripts')
 <script type="text/javascript">







  $(document).ready(function(){

    traerInfoUniversidad('infoUniversidad',
                        $('#getUrlGuardarCampus').val(),
                        $('#getUrlPaisContinente').val(),
                        $('#getUrCiudadContinente').val(),
                        $('#getToken').val());





   


     // solo para probar 
			 $('#holahola').click(function (e) {

			alert($('#pais').val());


			 });
  });

 </script>
@endsection










