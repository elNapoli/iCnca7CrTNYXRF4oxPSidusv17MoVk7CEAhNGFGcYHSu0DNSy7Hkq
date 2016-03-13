@extends('intranet.app')

@section('Dashboard') Carreras @endsection

@section('content')

                <h3><i class="fa fa-angle-right"></i> Carreras!</h3>
                <hr>
                <div class="panel panel-default">


		    <div class="panel-heading"><a href="#!" id="agregarCiudadModal" class="btn btn-info btn-outline" data-toggle="modal" data-target="#modal_crear_carrera"> Agregar carrera</a></div>

          <div class="message"></div>
			@include('carreras.partials.table')



{!!Form::hidden('getUrlCarreras', url('carreras/carreras'),array('id'=>'getUrlCarreras'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
{!!Form::hidden('getUrlFacultadesByCampus', url('facultades/facultades-by-campus'),array('id'=>'getUrlFacultadesByCampus'));!!}
{!!Form::hidden('getUrlCarreraByFacultad', url('carreras/carreras-by-facultad'),array('id'=>'getUrlCarreraByFacultad'));!!}
{!!Form::hidden('getUrCiudadContinente', url('ciudades/ciudad-by-pais'),array('id'=>'getUrCiudadContinente'));!!}
{!!Form::hidden('getCampusByPais', url('universidades/universidad-by-pais'),array('id'=>'getCampusByPais'));!!}
{!!Form::hidden('getUrlCarreraUpdate', url('carreras/update'),array('id'=>'getUrlCarreraUpdate'));!!}
{!!Form::hidden('getUrlCarreraDestroy', url('carreras/destroy'),array('id'=>'getUrlCarreraDestroy'));!!}

@endsection

@section('scripts')

    {!! Html::Script('js/function_carrera.js')!!}
    {!! Html::Script('js/funciones.js')!!}

	<script type="text/javascript">

	$(document).on('ready',function(){

        initCarrera();
		var dt = $('#tableCarreras').DataTable( {

        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
        "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
        "bProcessing": true,
 
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
                    $(nTd).html("<a href='#!' id ='"+oData.id+"' class='model-open-edit btn btn-primary btn-xs'> <i class='fa fa-pencil'></i></a>"+"<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+oData.id+"'>  <i class='fa fa-trash-o'></i></a>"
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
                        console.log(json);
                    $('form#form-edit div  div select#continente').val(json.continente);
                    selectByTabsSinAccion("form#form-edit div div",'#getToken','#getUrlPaisByContinente','#pais',json.continente,json.pais);
                    selectByTabsSinAccion("form#form-edit div div",'#getToken','#getCampusByPais','#campus_sede',json.pais,json.campus_sede);
                    selectByTabsSinAccion("form#form-edit div div",'#getToken','#getUrlFacultadesByCampus','#facultad',json.campus_sede,json.facultad);

                    $('div#boyd-modal div div input#nombre').val(json.nombre);
                    $('div#boyd-modal div div input#director').val(json.director);
                    $('div#boyd-modal div div input#email').val(json.email);
                    $('div#boyd-modal div  input#id').val(json.id);
                    $('#modal_edit_carrera').modal('show'); 
          
          
                },

                error : function(xhr, status) {
                    alert('mal conexion');


                },
            }); 
            
            
        });


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
                    url:$('#getUrlCarreraDestroy').val() ,
                    success : function(json) {
                        $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                        $('#message').modal('hide'); 

                            $("html, body").animate({ scrollTop: 0 }, 600);         
                            dt.ajax.reload();            
              
                    },

                    error : function(xhr, status) {
                        alert('mal conexion');


                    },
                }); 
            
            }
            
        });

        $('#btnEditCarrera').on('click', function(e){

            var data = $('#form-edit').serialize();
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:data,
                //Cambiar a type: POST si necesario
                type: "put",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#getUrlCarreraUpdate').val() ,
                success : function(json) {
                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    $('#modal_edit_carrera').modal('hide');

                            $("html, body").animate({ scrollTop: 0 }, 600);         
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

        $('#btnCreateCarrera').on('click',function(){
            var data = $('#form-save-carrera').serialize();

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:data,
                //Cambiar a type: POST si necesario
                type: "post",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#form-save-carrera').attr('action') ,
                success : function(json) {

                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                    $('#modal_crear_carrera').modal('hide'); 
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



	});
	</script>



    @include('carreras.partials.modal_create')
    @include('carreras.partials.modal_edit')
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('ciudades') !!}
@endsection




