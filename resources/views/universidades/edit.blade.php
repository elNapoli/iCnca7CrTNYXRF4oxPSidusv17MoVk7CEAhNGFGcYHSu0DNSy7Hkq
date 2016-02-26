@extends('intranet.app')

@section('Dashboard') Universidad @endsection

@section('content')


                      
@include('universidades.partials.modal')
<div class="row mt">
    <div class="col-lg-12">
        <section class="content-panel">
            <div class="panel-heading">
                <div class="pull-left"><h5><i class="fa fa-tasks"></i> Datos de la universidad</h5></div>
                <br>
            </div>
            <hr>
            {!! Form::open(['url'=>'universidades/store', 'method'=>'POST','id'=> 'formUniversidadStore','class'=>'form-horizontal style-form'])!!}
                <div class="row">
                    <div class="col-lg-6">
                            @include('universidades.partials.tabs_head')
                        

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        
                        <div class="panel-body">
                            <div class="form-group">
                                <a href="#!" id="agregarCiudadModal" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#modal_campus_universidad"> Agregar Campus</a>
                            </div>

                            @include('universidades.partials.tabs')

                            <div class=" add-task-row">
                                <a class="btn btn-success btn-sm pull-left" href="#!" id="editarUniversidad">Guardar los cambios</a>
                            </div>
                        </div>

                    </div>
                </div>
            {!!Form::close()!!}
        </section>
    </div><!-- /col-md-12-->
</div>







{!! Form::open(['url'=>['universidades/destroy-campus',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
  {!!Form::hidden('urlCampusDestroy', url('universidades/destroy-campus'),array('id'=>'urlCampusDestroy'));!!}
  {!!Form::hidden('urlUniversidadUpdate', url('universidades/update'),array('id'=>'urlUniversidadUpdate'));!!}


@endsection


@section('scripts')
    {!! Html::Script('js/funciones.js') !!}

 <script type="text/javascript">







  $(document).ready(function(){


    $(".alert").hide();
    traerInfoUniversidad('infoUniversidad',
                        $('#getUrlGuardarCampus').val(),
                        $('#getUrlPaisContinente').val(),
                        $('#getUrCiudadContinente').val(),
                        $('#getToken').val());

        $('#continente').on('change',function(e){
        e.preventDefault();
        getListForSelect($('#getUrlPaisContinente').val(), $('#getToken').val(), $("#continente").val(), 'pais');    
        });


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
        if(confirm("Desea eliminar el campus seleccionado?")){
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
                $(".alert-success").html("El registro fue eliminado exitosamente").show();
                $(".alert-danger").hide();
                $('#tabHead'+id).remove();
                $('#tab'+id).remove();
                //$().fadeOut();      
               // $('#tab'+id).fadeOut();      

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










