@extends('intranet.app')

@section('Dashboard') Paises @endsection

@section('content')
@include('paises.partials.modal_create')
@include('paises.partials.modal_edit')


<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"> 



                <div id="subsectionTitle">
  					<h1 id="sSh1">Países  <button class="button button1" data-toggle="modal" data-target="#modal_crear_pais" href="#!">Crear país</button></h1>
				</div>

                <div class="panel panel-default">

		<div class="message"></div>

			@include('paises.partials.table')
	

{!! Form::open(['url'=>['continentes/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
	{!!Form::hidden('urlPaisDestroy', url('paises/destroy'),array('id'=>'urlPaisDestroy'));!!}
	{!!Form::hidden('urlAllPaises', url('paises/all-paises'),array('id'=>'urlAllPaises'));!!}
	{!!Form::hidden('UrlPaisUpdate', url('paises/update'),array('id'=>'UrlPaisUpdate'));!!}
    {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}



@endsection

<style type="text/css">
	
#subsectionTitle{
	background-image: url(http://sf.co.ua/16/01/wallpaper-420ba.jpg);
  background-size: 100%;
    background-position: center;

    height: 100px;
    box-shadow: 0px 1px 10px #5E5E5E;
}

#sSh1{
	text-align: left;
	padding-left: 100px;
    color: #efefef;
    padding-top: 10px;
    font-size: 5em;
    font-family: montserrat;
    text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black;
  }

  .button {
  	right: 100px;
  	top: 58px;
  	position: absolute;
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

  .button1 {
    background-color: #2d852f; 
    color: white; 

}

.button1:hover {
    background-color: #e2e0e3;
    color: #2d852f;
}

</style>


@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {

		    var dt = $('#tablePais').DataTable( {
        	"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
        	"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
        	"bProcessing": true,
		        "ajax": $('#urlAllPaises').val(),
		        "columns": [

			            { "data":"nombre" },
			            { "data":"continente_r.nombre" },
			            { "data": null,
			                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                $(nTd).attr('align','center');

			                    $(nTd).html("<a href='#!' id ='"+oData.id+"' class='model-open-edit btn btn-primary btn-xs'> <i class='fa fa-pencil'></i></a>"+
			                                "<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+oData.id+"'>  <i class='fa fa-trash-o'></i></a>"
			                        );

			                }
			            }
			       
			        ]

		    } );

        	$('table').on('click','.btn-delete', function(e){

				e.preventDefault(); // jquery evento prevent default (e)
				if(confirm("Desea eliminar el país seleccionado?")){
					
					var row   = $(this).parents('tr');
					var id    = $(this).attr('id') //captura el id de la fila seleccionada
					var form  = $('#form-delete'); //traigo la id
					var url   = $('#urlPaisDestroy').val()+'/'+id; //remplazo el placeholder USER_ID con la id
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
					    	$('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   				
                            $("html, body").animate({ scrollTop: 0 }, 600);         
                            dt.ajax.reload();
						},

					    error : function(xhr, status) {
					    	$('.message').html('<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>El país seleccionado no ha podido ser eliminado debido a que pertenece a postulaciones actuales.</div>');   				
                            $("html, body").animate({ scrollTop: 0 }, 600);         
                            dt.ajax.reload(); 
							
					    },
					});		
				}

			});

			



			$('#btnUpdatePais').on('click',function(){
	            var data = $('#form-edit-pais').serialize();
	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
	               data:data,
	                //Cambiar a type: POST si necesario
	                type: "put",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#UrlPaisUpdate').val()+'/'+$('#id').val(),
	                success : function(json) {
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    	$('#modal_edit_pais').modal('hide');
                    	
                            $("html, body").animate({ scrollTop: 0 }, 600);         
                            dt.ajax.reload();            
                         

	                  //  dt.reload();            
	          
	                },

	                error : function(xhr, status) {
		        		responseJSON =  JSON.parse(xhr.responseText);

	                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
	                        for(var key in responseJSON)
	                        {
	                            html += "<li>" + responseJSON[key][0] + "</li>";
	                        }
	                        $('#message-modal-edit').html(html+'</div>');


	                },
	            }); 
			});



			$('table').on('click','.model-open-edit', function(e){

	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
	                data:{_token:$('#_token').val()},
	                //Cambiar a type: POST si necesario
	                type: "post",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#form-edit-pais').attr('action')+'/'+$(this).attr('id') ,
	                success : function(json) {


	                    $('#modal_edit_pais div div input#nombre').val(json.nombre);
	                    $('#modal_edit_pais div div select#continente').val(json.continente_r.id);
	                    $('#modal_edit_pais div div input#id').val(json.id);

	                    $('#modal_edit_pais').modal('show'); 


	          
	                },

	                error : function(xhr, status) {
	                    alert('mal conexion');


	                },
	            }); 
	            
	            
	        });



		} );

	</script>
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('paises') !!}
@endsection


