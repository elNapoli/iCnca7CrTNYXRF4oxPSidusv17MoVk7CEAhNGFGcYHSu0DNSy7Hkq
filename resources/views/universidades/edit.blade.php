@extends('layout.app')

@section('Dashboard') Universidad @endsection

@section('content')


                      
@include('universidades.partials.modal')
   

<div class="col-md-1" ></div>
    <div class="col-md-7" >

		@include('partials.error')

		{!! Form::open(['url'=>'universidades/store', 'method'=>'POST','id'=> 'formUniversidadStore'])!!}
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
			 $('#btnAdd').click(function (e) {

          var urlStoreCampus = $('#getUrlGuardarCampus').val();
          var token =  $('#getToken').val();
          var  form = $('#holamundo');

      
          $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:form.serialize(),
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:urlStoreCampus ,
                success : function(json) {
                    crearTab(json,urlStoreCampus,$('#getUrCiudadContinente').val(),$('#getToken').val());
                },

                error : function(xhr, status) {
                    console.log('Disculpe, existió un problema '+token);
                },

            });

        });



  });

 </script>
@endsection










