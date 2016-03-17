@extends('intranet.app')

@section('Dashboard') Universidad @endsection

@section('content')

{!! Form::open(['url'=>'universidades/store', 'method'=>'POST','id'=> 'formUniversidadStore','class'=>'form-horizontal style-form'])!!}
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-12">
      <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Datos de la universidad</h4>
          <div class="form-horizontal style-form" method="get">
            <fieldset disabled >
              
                @include('universidades.partials.tabs_head')
            </fieldset>
         <a href="#!" id="open-modal-add-campus" class="btn btn-default" data-toggle="modal" data-target="#modal_campus_universidad"> Agregar Campus</a>

          </div>
      </div>
  </div><!-- col-lg-12-->       
</div><!-- /row -->

                      


<div class="row mt">
  <div class="col-lg-12">
      <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Campus y sedes</h4>
          <div class="message">
  
          </div>
            @include('universidades.partials.fields')
              {!!Form::hidden('getUrlPaisContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisContinente'));!!}
              {!!Form::hidden('getUrCiudadContinente', url('ciudades/ciudad-by-pais'),array('id'=>'getUrCiudadContinente'));!!}

      </div>
  </div><!-- col-lg-12-->       
</div><!-- /row -->

{!!Form::close()!!}






@include('universidades.partials.modal')
  {!!Form::hidden('urlUniversidadUpdate', url('universidades/update'),array('id'=>'urlUniversidadUpdate'));!!}
  {!!Form::hidden('urlDestroyCampus', url('universidades/destroy-campus'),array('id'=>'urlDestroyCampus'));!!}


@endsection


@section('scripts')
    {!! Html::Script('js/funciones.js') !!}

 <script type="text/javascript">







  $(document).ready(function(){

    $(".alert").hide();
    selectByTabs(".form-horizontal",'#continente','#_token','#getUrlPaisContinente','#pais');   
    selectByTabs(".form-horizontal",'#pais','#_token','#getUrCiudadContinente','.miCiudad');   
    traerInfoUniversidad('infoUniversidad',
                        $('#getUrlGuardarCampus').val(),
                        '#getUrlPaisContinente',
                        '#getUrCiudadContinente',
                        '#getToken');




        $('#editarUniversidad').on('click',function(e){

          var arrayCampus = new Array();
          var idUniversidad = JSON.parse($('#infoUniversidad').val())[0].id;
          var url = $('#urlUniversidadUpdate').val();
          var token = $('#getToken').val();
          $(".tab-pane").each(function (index) 
          { 
              var idTab = $(this).attr('id');

                var idCampus =idTab.substr(3,idTab.length);
                var campus = new Object();
                campus.id_universidad = idUniversidad;
                campus.nombre_universidad = $('#nombre_universidad').val();
                campus.id = idCampus;
                campus.nombre = $('#nombre'+idCampus).val();
                campus.telefono = $('#telefono'+idCampus).val();
                campus.fax = $('#fax'+idCampus).val();
                campus.sitio_web = $('#sitio_web'+idCampus).val();
                campus.ciudad = $('#ciudad'+idCampus).val();
                campus.direccion = $('#direccion'+idCampus).val();
                arrayCampus[index] = campus;
              
          }) ;
          arrayCampus.shift();
          $.ajax({
              // En data puedes utilizar un objeto JSON, un array o un query string
             data: {
                "_token": token,
                "infoUniversidad": JSON.stringify(arrayCampus)
              },

             
              //Cambiar a type: POST si necesario
              type: "post",
              // Formato de datos que se espera en la respuesta
              dataType: "json",
              // URL a la que se enviará la solicitud Ajax
              url:url ,
              success : function(json) {   

            },

              error : function(xhr, status) {
                alert('El usuario no fue eliminado');
                //$('#tabHead'+id).fadeOut();
                  console.log('Disculpe, existió un problema '+token);
              },
          });  


        });



     // solo para probar 
       $('#open-modal-add-campus').click(function (e) {
               getListForSelect($('#getUrCiudadContinente').val(), $('#getToken').val(), $("#pais").val(), 'ciudad','putaputa');   

       });
			 $('#btnAdd').click(function (e) {

          var urlStoreCampus = $('#getUrlGuardarCampus').val();
          var token =  '#getToken';
          var form = $('#holamundo');
          var idPais = $('#pais').val();
          var ciudadByPais = '#getUrCiudadContinente';
          CrearTabPorCampus(urlStoreCampus,token,form,idPais,ciudadByPais);



        });
    $("ul#tabs").on("click", ".btn-delete", function(event){
        event.preventDefault(); // jquery evento prevent default (e)
        if(confirm("Desea eliminar el campus seleccionado?")){
          var tab   = $(this).parents('li');
          var id    = $(this).attr('id'); //captura el id de la fila seleccionada
          var token = $('#getToken').val();
       
        
          $.ajax({
              // En data puedes utilizar un objeto JSON, un array o un query string
             data:{_token: token, id : id},
              //Cambiar a type: POST si necesario
              type: "post",
              // Formato de datos que se espera en la respuesta
              dataType: "json",
              // URL a la que se enviará la solicitud Ajax
              url:$('#urlDestroyCampus').val() ,
              success : function(json) {
             console.log(json);
                if(json.message[0] == 0){

                  $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message[2]+'</div>');          
                            $("html, body").animate({ scrollTop: 0 }, 600);    
                            $('#tabHead'+id).remove();
                            $('span#'+id).remove();
                $('#tab'+id).remove();
                }
                else{

                  var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>código: '+json.message[1]+', '+json.message[2]+' </p></div>';
                    $('.message').html(html);
                    $("html, body").animate({ scrollTop: 300 },600); 
                }
                
                
                
                //$().fadeOut();      
               // $('#tab'+id).fadeOut();      

            },

              error : function(xhr, status) {
                alert(status);
                
              },
          });   
        }
    });



  });

 </script>
@endsection










