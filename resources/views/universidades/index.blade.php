@extends('layout.app')

@section('Dashboard') Universidades @endsection

@section('content')

<div class="row">
      <!-- Default panel contents -->
    <div class="col-md-1" ></div>
    <div class="col-md-9" >

        <div class="panel panel-default">

            @include('partials.success')
          <div class="panel-heading"><a class="btn-info btn" href="{{ url('universidades/create') }}">Crear universidad</a></div>

          <!-- Table -->
            @include('universidades.partials.table')
        

        </div>
    </div>

</div>

{!! Form::open(['url'=>['universidades/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
  {!!Form::hidden('urUniversidadesDestroy', url('universidades/destroy'),array('id'=>'urUniversidadesDestroy'));!!}


@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection



@section('scripts')
<script type="text/javascript">

 
$(document).ready(function() {


    crearTablaUniversidad('#tableUniversidad',$('#getUrl').val());


    $("#tableUniversidad").on("click", '.btn-delete', function(event){

        event.preventDefault(); // jquery evento prevent default (e)
        if(confirm("Press a button!\nEither OK or Cancel.")){
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
                alert(json.message);        
              row.fadeOut(); //solo se elimina cuando se completa transaccion
            },

              error : function(xhr, status) {
                alert('El usuario no fue eliminado');
              row.show();
                  console.log('Disculpe, existió un problema '+token);
              },
          });   
        }
    });





    
} );
</script>
@endsection






