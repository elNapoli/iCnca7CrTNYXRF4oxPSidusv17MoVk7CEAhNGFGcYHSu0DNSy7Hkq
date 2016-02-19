@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
@include('representanteUach.partials.modal_create')
<div class="row">
      <!-- Default panel contents -->
    <div class="col-md-12" >

        <div class="panel panel-default">

      		<div class="panel-heading"><a class="btn-info btn" id='openModalRepresentante' href="#!">Crear representante</a></div>
      		<div class="message"></div>

          <!-- Table -->
			@include('representanteUach.partials.table')
			{!!Form::hidden('getUrlRepresentanteByUser',url('representante-uach/representante-by-user'),array('id'=>'getUrlRepresentanteByUser'));!!}

        </div>
    </div>

</div>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection

@section('scripts')
	<script>
		$(document).on('ready',function(){
			$('#btnAddRepresentante').on('click',function(){
				$.ajax({
	              // En data puedes utilizar un objeto JSON, un array o un query string
	                async : false,
	                data: $('#form-save-representante').serialize(),
	                //Cambiar a type: POST si necesario
	                type: $('#form-save-representante').attr('method'),
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:$('#form-save-representante').attr('action') ,
	                success : function(json) {   
	                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    	$('#modal_crear_representante').modal('hide'); 
                    	dt.ajax.reload();  
	                    
	                },

	                error : function(xhr, status) {
	                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                        for(var key in xhr.responseJSON)
                        {
                            html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                        }
                        $('#message-modal').html(html+'</div>');
	              
	                },                   

	            });

			});
			$('#openModalRepresentante').on('click',function(){

				$('#modal_crear_representante').modal('show');
			});
			var dt = $('#tableRepresentante').DataTable( {

				'searching':false,
				'paging':false,
		        "ajax": $('#getUrlRepresentanteByUser').val(),
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},

		        "columns": [
		           
		            { "data": "tipo" },
		            { "data": "nombre" },
		            { "data": "telefono_1" },
		            { "data": "telefono_2" },
		            { "data": "parentesco" },
		            { "data": "email" },
		            { "data": "direccion" },
		            { "data": null,
		                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
		                    $(nTd).html("<a href='#!' id ='"+oData.id+"' class='model-open-edit'> Edit</a>"+
		                                "<a href='#!' class='btn-delete' id='"+oData.id+"'> Del</a>"
		                        );

		                }
		            }
		        ],
		    });
		});
	</script>
@endsection