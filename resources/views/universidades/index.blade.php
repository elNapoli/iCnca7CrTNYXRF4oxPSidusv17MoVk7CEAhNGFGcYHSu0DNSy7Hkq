@extends('intranet.app')

@section('Dashboard') Universidades @endsection

@section('content')

                <h3><i class="fa fa-angle-right"></i> Universidades!</h3>
                <hr>

    <div class="panel panel-default">
          <div class="panel-heading"><a class="btn-info btn" href="{{ url('universidades/create') }}">Crear universidad</a></div>

          <!-- Table -->
          <div class="message">
           

          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
         
            @if(Session::has('message'))
              {{Session::get('message')}}
            @endif


          </div>


           
           
          </div>  
            @include('universidades.partials.table')


{!! Form::open(['url'=>['universidades/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
  {!!Form::hidden('urUniversidadesDestroy', url('universidades/destroy'),array('id'=>'urUniversidadesDestroy'));!!}


@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection



@section('scripts')
    {!! Html::Script('js/funciones.js') !!}
<script type="text/javascript">

 
$(document).ready(function() {


    crearTablaUniversidad('#tableUniversidad',$('#getUrl').val());


    $("#tableUniversidad").on("click", '.btn-delete', function(event){

        event.preventDefault(); // jquery evento prevent default (e)
        if(confirm("Desea eliminar el registro seleccionado?")){
          var row   = $(this).parents('tr');
          var id    = $(this).attr('id'); //captura el id de la fila seleccionada
          var form  = $('#form-delete'); //traigo la id
          var url   = $('#urUniversidadesDestroy').val()+'/'+id; //remplazo el placeholder USER_ID con la id
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
                if(json.message[0] == 0){

                  $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message[2]+'</div>');          
                            $("html, body").animate({ scrollTop: 0 }, 600);    
                            row.hide();
                }
                else{

                  var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>código: '+json.message[1]+', '+json.message[2]+' </p></div>';
                    $('.message').html(html);
                    $("html, body").animate({ scrollTop: 0 },600); 
                }   
            },

              error : function(xhr, status) {
                alert(status);
              },
          });   
        }
    });





    
} );
</script>
@endsection






