@extends('intranet.app')

@section('Dashboard') Ciudades @endsection

@section('content')
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"> 

                <div id="subsectionTitle">
                    <h1 id="sSh1">Ciudades</h1>
                </div>

		<div class="panel panel-default">
                <div class="panel-heading"><a class="button button1" data-toggle="modal" data-target="#modal_crear_ciudad" href="#!">{{trans('city.create')}}</a></div>

		<div class="message"></div>

		  <!-- Table -->
			@include('ciudades.partials.table')

@include('ciudades.partials.modal_create')
@include('ciudades.partials.modal_edit')



{!!Form::hidden('urlCiudadDestroy', url('ciudades/destroy'),array('id'=>'urlCiudadDestroy'));!!}
{!!Form::hidden('urlAllCiudades', url('ciudades/all-ciudades'),array('id'=>'urlAllCiudades'));!!}
{!!Form::hidden('urlEditCiudad', url('ciudades/edit'),array('id'=>'urlEditCiudad'));!!}
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}



@endsection

<style type="text/css">
    
#subsectionTitle{
    background-image: url(https://newevolutiondesigns.com/images/freebies/city-wallpaper-32.jpg);
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
    {!! Html::Script('js/funciones.js') !!}

	<script type="text/javascript">
		$(document).ready(function() {
			var dt = $('#tableCiudad').DataTable( {

        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
        "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
        "bProcessing": true,

		        "ajax": $('#urlAllCiudades').val(),
		        "columns": [
			           { "data": "ciudadID",
                        "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html('<a href="#!" id="'+oData.ciudadID+'" class="model-open-edit">'+oData.ciudadID+'</a>');
                            }
                        },
			            { "data":"ciudadNombre" },
			            { "data":"codigo_postal" },
			            { "data":"paisNombre" },
			            { "data":"continenteNombre" },
			            { "data": null,
			                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                $(nTd).attr('align','center');

			                    $(nTd).html("<a href='#!' id ='"+oData.ciudadID+"' class='model-open-edit btn btn-primary btn-xs'> <i class='fa fa-pencil'></i></a>"+
			                                "<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+oData.ciudadID+"'>  <i class='fa fa-trash-o'></i></a>"
			                        );

			                }
			            }
			       
			        ]

		    } );



			$('#btnCreateCiudad').on('click',function(){
		    var data = $('#form-save-ciudad').serialize();

		    $.ajax({
		        // En data puedes utilizar un objeto JSON, un array o un query string
		       data:data,
		        //Cambiar a type: POST si necesario
		        type: "post",
		        // Formato de datos que se espera en la respuesta
		        dataType: "json",
		        // URL a la que se enviará la solicitud Ajax
		        url:$('#form-save-ciudad').attr('action') ,
		        success : function(json) {

		            $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
		            $('#modal_crear_ciudad').modal('hide'); 
		            dt.ajax.reload();            
		  
		        },

               error : function(xhr, status) {
                    responseJSON =  JSON.parse(xhr.responseText);

                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                        for(var key in responseJSON)
                        {
                            html += "<li>" + responseJSON[key][0] + "</li>";
                        }
                        $('#message-modal-create').html(html+'</div>');


		        },
		    }); 

			});

        $('table').on('click','.btn-delete', function(e){

				e.preventDefault(); // jquery evento prevent default (e)
				if(confirm("Desea eliminar el registro seleccionado.?")){
					
					var id    = $(this).attr('id') //captura el id de la fila seleccionada

					var url   = $('#urlCiudadDestroy').val()+'/'+id; //remplazo el placeholder USER_ID con la id



				
					$.ajax({
					    // En data puedes utilizar un objeto JSON, un array o un query string
					    data:$('#form-save-ciudad').serialize(),
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
					    	$('.message').html('<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>La ciudad seleccionada no ha podido ser eliminada debido a que pertenece a postulaciones actuales.</div>');   				
                            $("html, body").animate({ scrollTop: 0 }, 600);         
                            dt.ajax.reload();  

					    },
					});		
				}

			});


		$('table').on('click','.model-open-edit', function(e){
          
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data:{
                		id:$(this).attr('id'),
                		_token :$('#_token').val(),
                	},
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#urlEditCiudad').val() ,
                success : function(json) {


                    $('#modal_edit_ciudad #continente').val(json.continente);
                    $('#modal_edit_ciudad #nombre').val(json.nombre);
                    $('#modal_edit_ciudad #codigo_postal').val(json.codigo_postal);
                    $('#modal_edit_ciudad #id_ciudad').val(json.id);
                    selectByTabsSinAccion("#modal_edit_ciudad",'#_token','#getUrlPaisByContinente','#pais',json.continente,json.pais);
                    $('#modal_edit_ciudad').modal('show'); 


          
                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            
            
        });

        $('#btn_update_ciudad').on('click',function(){
                var data = $('#form-edit-ciudad').serialize();
                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                   data:data,
                    //Cambiar a type: POST si necesario
                    type: "put",
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url:$('#form-edit-ciudad').attr('action'),
                    success : function(json) {
                        $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                        $('#modal_edit_ciudad').modal('hide'); 
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
                        $('#message-modal-create').html(html+'</div>');


                    },
                }); 
            });

		$('#continente').on('change',function(e){
		e.preventDefault();
			getListForSelect($('#getUrlPaisByContinente').val(), $('#getToken').val(), $("#continente").val(), 'pais');	
		});
        selectByTabs("div#modal_edit_ciudad",'#continente','#_token','#getUrlPaisByContinente','#pais');   




		} );

	</script>
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('ciudades') !!}
@endsection




