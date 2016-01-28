@extends('layout.app')

@section('Dashboard') Universidad @endsection

@section('content')


                      
@include('universidades.partials.modal')
   

<div class="col-md-1" ></div>
    <div class="col-md-7" >

		@include('partials.error')

		{!! Form::open(['url'=>'universidades/store', 'method'=>'POST','id'=> 'formUniversidadStore'])!!}
	    <div class="form-group">
        	<a href="#!" id="agregarCiudadModal" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#myModal"> Agregar Campus</a>
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

        $('#continente').on('change',function(e){
        e.preventDefault();
        getListForSelect($('#getUrlPaisContinente').val(), $('#getToken').val(), $("#continente").val(), 'pais');    
        });


        
        $('#pais').on('change',function(e){
        e.preventDefault();

        getListForSelect($('#getUrCiudadContinente').val(), $('#getToken').val(), $("#pais").val(), 'ciudad','miCiudad');    
        });

     // solo para probar 
       $('#agregarCiudadModal').click(function (e) {
               getListForSelect($('#getUrCiudadContinente').val(), $('#getToken').val(), $("#pais").val(), 'ciudad','putaputa');   

       });
			 $('#btnAdd').click(function (e) {

          var urlStoreCampus = $('#getUrlGuardarCampus').val();
          var token =  $('#getToken').val();
          var form = $('#holamundo');
          var idPais = $('#pais').val();
          var ciudadByPais = $('#getUrCiudadContinente').val()
          CrearTabPorCampus(urlStoreCampus,token,form,idPais,ciudadByPais);


        });



  });

 </script>
@endsection










