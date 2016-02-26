@extends('intranet.app')

@section('Dashboard') Universidad @endsection

@section('content')


                      
                    <div class="message"></div>      
              <!-- BASIC FORM ELELEMNTS -->

                          {!! Form::open(['url'=>'universidades/store', 'method'=>'POST','id'=>'form-save'])!!}
<div class="padreMayor">
  
                
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Datos principales de Universidad</h4>
                          <div class="form-horizontal style-form">
                            
                          {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
                              
                          {!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
                          {!!Form::hidden('getUrCiudadContinente', url('ciudades/ciudad-by-pais'),array('id'=>'getUrCiudadContinente'));!!}

                          @include('universidades.partials.tabs_head')
                          </div>
                 
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->


         @include('universidades.partials.tabs')

</div>
                          {!!Form::close()!!}
		<a href="#!" id="add_universidad" class="btn btn-default">Guardar</a>

        {!!Form::hidden('urlUniversidadIndex',url('universidades'),array('id'=>'urlUniversidadIndex'));!!}


@endsection




@section('scripts')
    {!! Html::Script('js/funciones.js') !!}

 <script type="text/javascript">
  $(document).ready(function(){

        selectByTabs(".padreMayor",'#continente','#_token','#getUrlPaisByContinente','#pais');   
        selectByTabs(".padreMayor",'#pais','#_token','#getUrCiudadContinente','#ciudad');   
        $('#add_universidad').on('click', function(e){

            var form = $('#form-save');
            var data = form.serialize();
            var url = form.attr('action');
            var html = "";
              $.ajax({
                  // En data puedes utilizar un objeto JSON, un array o un query string
                 data: data,

                 
                  //Cambiar a type: POST si necesario
                  type: "post",
                  // Formato de datos que se espera en la respuesta
                  dataType: "json",
                  // URL a la que se enviará la solicitud Ajax
                  url:url ,
                  success : function(json) {   
                    $(".alert-success").html("El registro fue guardado exitosamente").show();
                    $(".alert-danger").hide();

                    window.location.href = $('#urlUniversidadIndex').val();

                },

                  error : function(xhr, status) {
                    responseJSON =  JSON.parse(xhr.responseText);

                      var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                          for(var key in responseJSON)
                          {
                              html += "<li>" + responseJSON[key][0] + "</li>";
                          }
                          $('.message').html(html+'</div>');
                  },
              });  


        });

  

  });

 </script>
@endsection



