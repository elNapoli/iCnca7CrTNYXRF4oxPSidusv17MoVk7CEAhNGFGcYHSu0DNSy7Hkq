@extends('intranet.app')

@section('Dashboard') Beneficios @endsection

@section('content')


	<div class="panel panel-default">
<div class="panel-heading"><a class="btn btn-info" href="{{url('noticias/crear')}}">Crear Noticia</a></div>


		  <!-- Table -->
		  <div class="message"></div>
		  @if(Session::has('message1')) 
            <div class="alert alert-success fade in">
                <button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>
                               {{Session::get('message1')}}         </p></div>
           @endif

		  @include('noticias.partials.table')



{!!Form::hidden('urlNoticiaDestroy', url('noticias/destroy'),array('id'=>'urlNoticiaDestroy'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}


@endsection

@section('scripts')
{!! Html::Script('js/funciones.js') !!}
	<script type="text/javascript">
		$(document).ready(function() {

		var dt = $('#tableNoticias').DataTable( {
			 
			 		"lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
					 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
                    "bProcessing": true,
                    
			    } );


        $('table').on('click','.btn-delete', function(e){
        	var row = $(this).parents('tr');
            if(confirm("Esta seguro que desea eliminar el registro seleccionado?."))
            {
                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                    data:{_token :$('#getToken').val(), id: $(this).attr('id')},
                    //Cambiar a type: POST si necesario
                    type: "post",
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url:$('#urlNoticiaDestroy').val() ,
					    success : function(json) {
					  	var html = '<div class="alert alert-success fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="success" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            $('.message').html(html);
                            $("html, body").animate({ scrollTop: 0 }, 600);			
							row.fadeOut();
						},

					    error : function(xhr, status) {
					    	alert('El usuario no fue eliminado');
							
					        console.log('Disculpe, existió un problema ');
					    },
                }); 
            
            }
            
        });



});
	</script>
@endsection