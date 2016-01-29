@extends('layout.app')

@section('Dashboard') Universidad @endsection

@section('content')


                      
@include('universidades.partials.modal')
   

<div class="col-md-1" ></div>
    <div class="col-md-7" >

		@include('partials.error')
    @include('universidades.partials.botonEliminarUniversidad')

    {!! Form::open(['url'=>'universidades/store', 'method'=>'POST','id'=> 'formUniversidadStore'])!!}
      <div class="form-group">
          <a href="#!" id="agregarCiudadModal" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#myModal"> Agregar Campus</a>
    </div>

		@include('universidades.partials.tabs')

		<button type="submit" class="btn btn-default">Editar datos de la universidad</button>
		{!!Form::close()!!}
	</div>

{!! Form::open(['url'=>['universidades/destroy-campus',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
  {!!Form::hidden('urlCampusDestroy', url('universidades/destroy-campus'),array('id'=>'urlCampusDestroy'));!!}

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
    $(".tab-content").on("click", ".btn-delete", function(event){
        event.preventDefault(); // jquery evento prevent default (e)
        if(confirm("Press a button!\nEither OK or Cancel.")){
          var tab   = $(this).parents('li');
          var id    = $(this).attr('id'); //captura el id de la fila seleccionada
          var form  = $('#form-delete'); //traigo la id
          var url   = $('#urlCampusDestroy').val()+'/'+id; //remplazo el placeholder USER_ID con la id
          var data  = form.serialize();
          

        
          $.ajax({
              // En data puedes utilizar un objeto JSON, un array o un query string
             data:data,
              //Cambiar a type: POST si necesario
              type: "post",
              // Formato de datos que se espera en la respuesta
              dataType: "json",
              // URL a la que se enviará la solicitud Ajax
              url:url ,
              success : function(json) {
                alert(json.message);  
                $('#tabHead'+id).fadeOut();      
                $('#tab'+id).fadeOut();      

            },

              error : function(xhr, status) {
                alert('El usuario no fue eliminado');
                //$('#tabHead'+id).fadeOut();
                  console.log('Disculpe, existió un problema '+token);
              },
          });   
        }
    });



  });

 </script>
@endsection










