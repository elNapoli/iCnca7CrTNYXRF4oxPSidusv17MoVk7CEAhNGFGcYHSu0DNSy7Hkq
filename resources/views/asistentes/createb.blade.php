@extends('intranet.app')

@section('Dashboard') Asistente @endsection

@section('content')

                <h3><i class="fa fa-angle-right"></i> Asistentes \ Crear registro \ Añadir beneficios</h3>
                <hr>

<div class="row">
<div class="col-md-6">
<div class="form-group">
	<div class="message"></div>
		@include('partials.error')

		{!! Form::open(['url'=>'detalle/add', 'method'=>'POST'])!!}

		<div class="form-group">

	{!!  Form::label('beneficio', ' Agregar beneficio ')!!}
    {!!  Form::select('beneficio', [null=>'Seleccione un beneficio']+$beneficios,null,array('class' => 'form-control'))!!}

    <button id='add_b' type="button" class="btn btn-success btn-block">Agregar</button>
               <br>
    @include('asistentes.partials.table_3')

{!!Form::hidden('asistente',$asistente->id,array('id'=>'asistente'));!!}
{!!Form::hidden('postulante',$postulante,array('id'=>'postulante'));!!}

    	{!!Form::hidden('urlBeneficioDestroy', url('detalles/destroy'),array('id'=>'urlBeneficioDestroy'));!!}
	{!!Form::hidden('urlBeneficioAdd', url('detalles/add'),array('id'=>'urlBeneficioAdd'));!!}
	{!!Form::hidden('urlIndicacionAdd', url('asistentes/indicacion'),array('id'=>'urlIndicacionAdd'));!!}
	{!!Form::hidden('urlBeneficioByAsistente', url('asistentes/detalle'),array('id'=>'urlBeneficioByAsistente'));!!}
		{!!Form::close()!!}

		</div> 
</div>
</div>
<div class="col-md-6">
<div class="form-group">
	<div id="message_ind"></div>
	{!!  Form::label('indicaciones', ' Indicaciones ');!!}
    {!! Form::textarea('indicaciones',null,array('id' => 'txt_ind' ,'class' => 'form-control','placeholder'=>'Ingrese indicaciones', 'rows'=>'3'));!!}
		<button id="add_ind" type="button" class="btn btn-success btn-block">Finalizar</button>
	</div>
		</div>
	</div>


	{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}

@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('beneficiosCrear') !!}
@endsection

@section('scripts')
<script type="text/javascript">

    $(document).ready(function(){

var dt2 = $('#tableDetalleBeneficio3').DataTable( {
 
 		"lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
		 "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},

        "ajax": $('#urlBeneficioByAsistente').val()+'/'+$('#asistente').val(),


        "columns": [
    
            { "data": "beneficio_r.nombre" },
            { "data": null,
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                	$(nTd).attr('align','center');
                    $(nTd).html(
                                "<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+oData.id_a+'.'+oData.beneficio+"'> <i class='fa fa-trash-o'></i></a>"
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

		if(confirm("Esta seguro que desea añador este beneficio!\nEither OK or Cancel.")){
		
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
					    if(json.tipo == 0){
					  	var html = '<div class="alert alert-success fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('.message').html(html);
                            $("html, body").animate({ scrollTop: 0 }, 600);			
							dt2.ajax.reload();
					    	
					    }
					    else{
					  	var html = '<div class="alert alert-danger fade in">'+
                            '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p>'+
                            json.message+'</p></div>';
                            
                            $('.message').html(html);
                            $("html, body").animate({ scrollTop: 0 }, 600);			
							dt2.ajax.reload();					    	
					    }
						},

					    error : function(xhr, status) {
					    	alert('El beneficio no fue añadido');
					        console.log('Disculpe, existió un problema ');
					    },
					});		
				}

	});

$('#add_ind').on('click',function(e){ //boton para añadir beneficios en edit
		e.preventDefault(); // jquery evento prevent default (e)
		
					var id_a	= $('#asistente').val();//$('#asistente').val();
					var ind		= $('#txt_ind').val();
					var url   = $('#urlIndicacionAdd').val(); //remplazo el placeholder USER_ID con la id
					var data  = {id:id_a,indicaciones:ind,_token:$('#getToken').val()}



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
					  	 	window.location.href = '/asistentes';				
						},

					    error : function(xhr, status) {
		        		responseJSON =  JSON.parse(xhr.responseText);

	                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>';
	                        for(var key in responseJSON)
	                        {
	                            html += "<li>" + responseJSON[key][0] + "</li>";
	                        }
	                        $('#message_ind').html(html+'</div>');
					    },
					});		

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
                            
                            $('.message').html(html);
                            $("html, body").animate({ scrollTop: 0 }, 600);			
							dt2.ajax.reload();
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

