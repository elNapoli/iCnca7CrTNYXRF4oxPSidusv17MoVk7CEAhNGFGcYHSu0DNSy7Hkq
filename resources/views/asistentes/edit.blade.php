
@extends('intranet.app')

@section('content')
                <h3><i class="fa fa-angle-right"></i> Asistentes \ Editar registro </h3>
                <hr>

<div class="row">


<div class="col-md-0" ></div>
<div class="col-md-12" >

	@include('partials.error')

	{!! Form::model($asistentes, ['url'=>['asistentes/update',$asistentes->id], 'method'=>'PUT', 'id'=>'form_edit']) !!}
	{!!Form::hidden('asistente',$asistentes->id,array('id'=>'asistente'));!!}
	

		@include('asistentes.partials.fields')



	{!!Form::close()!!}

	{!! Form::open(['url'=>['detalles/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}




	{!!Form::hidden('urlBeneficioDestroy', url('detalles/destroy'),array('id'=>'urlBeneficioDestroy'));!!}
	{!!Form::hidden('urlBeneficioAdd', url('detalles/add'),array('id'=>'urlBeneficioAdd'));!!}
	{!!Form::hidden('urlBeneficioByAsistente', url('asistentes/detalle'),array('id'=>'urlBeneficioByAsistente'));!!}
	{!!Form::close()!!}




</div>


{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('beneficioEditar',$asistentes) !!}
@endsection


@section('scripts')
<script type="text/javascript">

	$(document).ready(function(){

		var dt = $('#tableDetalleBeneficio').DataTable( {
 
			 		"lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
					 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
                    "bProcessing": true,

        "ajax": $('#urlBeneficioByAsistente').val()+'/'+$('#asistente').val(),


        "columns": [
    
            { "data": "beneficio_r.nombre" },
            { "data": null,
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(
                                "<a href='#!' class='btn-delete' id='"+oData.id_a+'.'+oData.beneficio+"'> Del</a>"
                        );

                }
            }
       
        ],
        "order": [[1, 'asc']]
    } );

	$('#beneficio').on('change',function(e){ 

		var id = $(this).val() //paso la id del select por referencia
		var form  = $('#form_edit');

	});


	$('#add_b').on('click',function(e){ //boton para añadir beneficios en edit
		e.preventDefault(); // jquery evento prevent default (e)

		if(confirm("Esta seguro que desea añadir este beneficio!\nEither OK or Cancel.")){
		
					var id_a	= $('#asistente').val();//$('#asistente').val();
					var beneficio    = $('#beneficio').val(); //captura el id del select 
					var form  = $('#form-edit'); //traigo la id
					var url   = $('#urlBeneficioAdd').val(); //remplazo el placeholder USER_ID con la id
					var data  = {id_a:id_a,beneficio:beneficio,_token:$('#getToken').val()}




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
					  	var html = '<div class="alert alert-success fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('#message2').html(html);
                            $("html, body").animate({ scrollTop: 0 }, 600);			
							dt.ajax.reload();
						},

					    error : function(xhr, status) {
					    	alert('El beneficio no fue añadido');
					        console.log('Disculpe, existió un problema ');
					    },
					});		
				}

	});

    $('table').on('click','.btn-delete', function(e){


				if(confirm("Esta seguro de querer eliminar este beneficio?!!\nEither OK or Cancel.")){
					
					var row   = $(this).attr('id');
					var row_array = row.split(".");
					var id_a	= row_array[0]//$('#asistente').val();
					var id_b    = row_array[1]/*$('#asistente').val();*///row.data('benef'); //captura el id de la fila seleccionada
					var form  = $('#form-delete'); //traigo la id
					var url   = $('#urlBeneficioDestroy').val(); //remplazo el placeholder USER_ID con la id
					var data  = {id_a:id_a,id_b:id_b,_token:$('#getToken').val()}


						console.log(id_a);
						console.log(id_b);

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
					  	var html = '<div class="alert alert-success fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('#message2').html(html);
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


	});

</script>
@endsection