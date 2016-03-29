@extends('intranet.app')

@section('Dashboard') Panel Administrador @endsection

@section('content')
                <h3><i class="fa fa-angle-right"></i> Alojamientos!</h3>
                <hr>

		  <div class="message"></div>
		  @include('alojamientos.partials.table')
		  
{!!Form::hidden('urlAlojamientoDestroy', url('alojamientos/destroy'),array('id'=>'urlAlojamientoDestroy'));!!}
{!!Form::hidden('getUrlAlojamiento', url('alojamientos/alojamiento'),array('id'=>'getUrlAlojamiento'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function (){


//Opciones tablas
var dt = $('#tableAlojamientos').DataTable( {
			 
			 		"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
					 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
                    "bProcessing": true,
                    
			        "ajax": $('#getUrlAlojamiento').val(),

			        "columns": [
			            { "data":"id" },
			            { "data":"tipo" },
			            { "data":"direccion" },
			            { "data":"telefono" },
			            { "data":"precio" },
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
                    url:$('#urlAlojamientoDestroy').val() ,
 					    success : function(json) {
					  	var html = '<div class="alert alert-success fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('.message').html(html);
                            $("html, body").animate({ scrollTop: 0 }, 600);			
							dt.ajax.reload();
						},

					    error : function(xhr, status) {
					    	alert('El usuario no fue eliminado');
							
					        console.log('Disculpe, existió un problema ');
					    },
                }); 
            
            }
            
        });

        $('table').on('click','.model-open-edit', function(e){
            var data = $('#form-edit-usuario').serialize();
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-edit-usuario').attr('action')+'/'+$(this).attr('id') ,
                success : function(json) {

					$('div#boyd-modal div div input#name').val(json.name);
					$('div#boyd-modal div div input#apellido_paterno').val(json.apellido_paterno);
					$('div#boyd-modal div div input#apellido_materno').val(json.apellido_materno);
					$('div#boyd-modal div div input#email').val(json.email);
					$('div#boyd-modal div div input#id').val(json.id);

                    $('#modal_edit_user').modal('show'); 


          
                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            
            
        });

			$('#btnUpdateUsuario').on('click',function(){
	            var data = $('#form-edit-usuario').serialize();
	            $.ajax({
	                // En data puedes utilizar un objeto JSON, un array o un query string
	               data:data,
	                //Cambiar a type: POST si necesario
	                type: "put",
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#urlUsuarioUpdate').val()+'/'+$('#id').val(),
	                success : function(json) {
                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    $('#modal_edit_user').modal('hide');

                            $("html, body").animate({ scrollTop: 0 }, 600);         
                            dt.ajax.reload(); 
                    dt.ajax.reload();           
	          
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

 });


</script>
@endsection