@extends('layout.app')

@section('Dashboard') Carreras @endsection

@section('content')

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-1" ></div>
    <div class="col-md-9" >

		<div class="panel panel-default">


		   <a href="#!" id="agregarCiudadModal" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#modal_crear_carrera"> Agregar carrera</a>

		  <!-- Table -->
          <div class="message"></div>
			@include('carreras.partials.table')
		

		</div>
    </div>

</div>
    {!!Form::hidden('getUrlCarreras', url('carreras/carreras'),array('id'=>'getUrlCarreras'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
{!!Form::hidden('getUrlFacultadesByCampus', url('facultades/facultades-by-campus'),array('id'=>'getUrlFacultadesByCampus'));!!}
{!!Form::hidden('getUrlCarreraByFacultad', url('carreras/carreras-by-facultad'),array('id'=>'getUrlCarreraByFacultad'));!!}
{!!Form::hidden('getUrCiudadContinente', url('ciudades/ciudad-by-pais'),array('id'=>'getUrCiudadContinente'));!!}
{!!Form::hidden('gerUrlUniversidadByPais', url('universidades/universidad-by-pais'),array('id'=>'gerUrlUniversidadByPais'));!!}

@endsection

@section('scripts')

	<script type="text/javascript">

	$(document).on('ready',function(){
        $('.modal-dialog').css('width', '750px');
        selectByTabs("modal_crear_carrera",'continente','getToken','getUrlPaisByContinente','pais','div#boyd-modal div div select');

        selectByTabs("modal_crear_carrera",'pais','getToken','gerUrlUniversidadByPais','campus_sede','div#boyd-modal div div select');
        selectByTabs("modal_crear_carrera",'campus_sede','getToken','getUrlFacultadesByCampus','facultad','div#boyd-modal div div select');

		var dt = $('#tableCarreras').DataTable( {


        "ajax": $('#getUrlCarreras').val(),


        "columns": [
           
            { "data": "id",
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html('<a href="#!" id="'+oData.id+'" class="model-open-edit">'+oData.id+'</a>');
                }
            },
            { "data": "nombre" },
            { "data": "director" },
            { "data": "email" },
            { "data": null,
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html("<a href='#!' class='model-open-edit'> Edit</a>"+
                                "<a href='#!' class='btn-delete' id='"+oData.id+"'> Del</a>"
                        );

                }
            }
        ],
        "order": [[1, 'asc']]
    } );
        
        $('table').on('click','.model-open-edit', function(e){
            var data = $('#form-edit').serialize();
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-edit').attr('action')+'/'+$(this).attr('id') ,
                success : function(json) {

                    $('form#form-edit div  div select#continente').val(json.continente);
                    selectByTabsSinAccion("modal_edit_carrera",'continente','getToken','getUrlPaisByContinente','pais','form#form-edit div div select',json.continente,json.pais);
                    selectByTabsSinAccion("modal_edit_carrera",'pais','getToken','gerUrlUniversidadByPais','campus_sede','form#form-edit div div select',json.pais,json.campus_sede);

                    alert(json.campus_sede);      
          
                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            $('#modal_edit_carrera').modal('show'); 
            
        });
        $('#btnAddCarrera').on('click', function(e){

            var data = $('#form-save').serialize();

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-save').attr('action') ,
                success : function(json) {
                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    $('#modal_crear_carrera').modal('hide'); 
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


	});
	</script>



    @include('carreras.partials.modal_create')
    @include('carreras.partials.modal_edit')
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('ciudades') !!}
@endsection




