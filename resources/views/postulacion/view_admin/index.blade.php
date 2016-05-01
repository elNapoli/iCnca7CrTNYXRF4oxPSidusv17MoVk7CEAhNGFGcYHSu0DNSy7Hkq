@extends('intranet.app')



@section('content')

													
						<!-- BASIC FORM ELELEMNTS -->
						<div class="row mt">
								<div class="col-lg-12">
									<div class="form-panel">
											<div class="row">
													<div class="col-lg-6">
															
															<h4 class="mb"><i class="fa fa-angle-right"></i> Buscar por RUT o pasaporte</h4>

																		{!! Form::open(['class'=>'form-horizontal style-form','url'=>'postulacion/search-postulante', 'method'=>'post','id'=>'formSearchPostulante'])!!}

																		<div class="form-group">

																					<div class="col-lg-6">
																							<input type="text" id='rut' name='rut' class="form-control">
																					</div>
																					<div class="col-lg-6">
																						<a href="#" id='searchPostulante'class="btn btn-default">Buscar postulante</a>

																				</div>
																			</div> 

																			<div class="form-group">
																				<div class="col-lg-12">
																							<div class="alert alert-warning" style='display:none' id="existAlert"></div>
																					</div>
																					
																			</div> 

																														{!!Form::close()!!}
											
													</div>
													<div class="col-lg-offset-4 col-lg-1">
														<img src="{{url('avatar.jpg')}}" alt="" id='imgProfile'  height="150" width="150">
													</div>
											</div>
									</div>
								</div><!-- col-lg-12-->         
						</div><!-- /row -->


<!-- BASIC FORM ELELEMNTS -->
						<div class="row mt">
								<div class="col-lg-12">
									<div class="form-panel">
											<h4 class="mb"><i class="fa fa-angle-right"></i> Ficha del postulante</h4>
											<form class="form-horizontal style-form" method="get">
												<div class="row">
														<div class="col-lg-7">
																<div id="accordion">
																	<h3>Datos personales</h3>
																	<div>
																		@include('postulacion.view_admin.partials.table', array('id'=>'tableDatosPersonales'))
																		 @include('postulacion.view_admin.partials.table', array('id'=>'tableProcedencia'))
																	</div>
																	<h3>Estudios actuales</h3>
																	<div>
																		@include('postulacion.view_admin.partials.table', array('id'=>'tableEstudiosActuales'))
																	</div>
																	<h3>Información de intercambio</h3>
																	<div>
																		@include('postulacion.view_admin.partials.table', array('id'=>'tableInformacionIntercambio'))
																		
																	</div>
											
																</div>
																</div>
														<div class="col-lg-5">


																<div class="panel panel-default">
																	<div class="panel-heading">
																		<h3 class="panel-title">Documentos adjuntados hasta el momento</h3>
																	</div>
																	<div class="panel-body" id='docBody'>
																	 Ningún dato disponible en esta tabla
																	</div>
																</div>

														</div>

														<div class="col-lg-5">


																<div class="panel panel-default">
																	<div class="panel-heading">
																		<h3 class="panel-title">Adjuntar carta de aceptación </h3>
																	</div>
																		<div id="kv-documentos-errors"></div>
																	<div class="panel-body" id='docBody'>
																			<label>Carta de aceptación</label>
																			<input id="cartaF1" name="cartaF1" type="file" class="file-loading" disabled >
																			<hr>
																			<label>Resoluón de pregrado</label>
																			<input id="cartaF2" name="cartaF2" type="file" class="file-loading" disabled>
																			
																

																	</div>
																</div>

														</div>
												</div>
						 
											</form>
									</div>
								</div><!-- col-lg-12-->         
						</div><!-- /row -->



{!!Form::hidden('id_postulante',null,array('id'=>'id_postulante'));!!}
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}

@endsection

@section('styles')

		{!! Html::Style('plugins/bootstrap-fileinput/css/fileinput.css')!!}

@endsection


@section('scripts')
		{!! Html::Script('plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js')!!}
		{!! Html::Script('plugins/bootstrap-fileinput/js/fileinput.js')!!}
		{!! Html::Script('plugins/bootstrap-fileinput/js/fileinput_locale_es.js')!!}
		<script>
				$(document).on('ready',function(){

						$( "#accordion" ).accordion({
								heightStyle: "content",
								autoHeight: false,
								clearStyle: true, 
						});


								var tableDatosPersonales = $('#tableDatosPersonales').DataTable( {

										"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
										"bProcessing": true,
										'searching':false,
										"paging": false,
										"bInfo" : false,
										 "order": [[ 2, "asc" ]],
										"fnDrawCallback": function ( oSettings ) {
												$(oSettings.nTHead).hide();

										},
												"columns": [
														{ "data": "parametro",
																"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
																		$(nTd).html("<strong>"+sData+"</strong>");
																}
														},
														{ "data":"valor"},
														{ "data":"peso","visible": false,  },
												]

								});

								var tableEstudiosActuales = $('#tableEstudiosActuales').DataTable( {

										"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
										"bProcessing": true,
										'searching':false,
										"paging": false,
										"bInfo" : false,
										 "order": [[ 2, "asc" ]],
										"fnDrawCallback": function ( oSettings ) {
												$(oSettings.nTHead).hide();

										},
												"columns": [
														{ "data": "parametro",
																"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
																		$(nTd).html("<strong>"+sData+"</strong>");
																}
														},
														{ "data":"valor"},
														{ "data":"peso","visible": false,  },
												]

								});

								var tableProcedencia = $('#tableProcedencia').DataTable( {

										"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
										"bProcessing": true,
										'searching':false,
										"paging": false,
										"bInfo" : false,
										 "order": [[ 2, "asc" ]],
										"fnDrawCallback": function ( oSettings ) {
												$(oSettings.nTHead).hide();

										},
												"columns": [
														{ "data": "parametro",
																"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
																		$(nTd).html("<strong>"+sData+"</strong>");
																}
														},
														{ "data":"valor"},
														{ "data":"peso","visible": false,  },
												]

								});


								var tableInformacionIntercambio = $('#tableInformacionIntercambio').DataTable( {

										"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
										"bProcessing": true,
										'searching':false,
										"paging": false,
										"bInfo" : false,
										 "order": [[ 2, "asc" ]],
										"fnDrawCallback": function ( oSettings ) {
												$(oSettings.nTHead).hide();

										},
												"columns": [
														{ "data": "parametro",
																"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
																		$(nTd).html("<strong>"+sData+"</strong>");
																}
														},
														{ "data":"valor"},
														{ "data":"peso","visible": false,  },
												]

								});


						$('#searchPostulante').on('click',function(){

								$.ajax({
									// En data puedes utilizar un objeto JSON, un array o un query string
										data:$('#formSearchPostulante').serialize(),
									//Cambiar a type: POST si necesario
										type: "post",
										async:"false",
									// Formato de datos que se espera en la respuesta
										dataType: "json",
									// URL a la que se enviará la solicitud Ajax
										url:$('#formSearchPostulante').attr('action') ,
										success : function(json) {
												if(json.existe == '0'){
														$('#existAlert').html('<p>El rut o pasaporte que esta buscando no existe!.</p>');
														$('#existAlert').show();
														
												}
												else{
														$('#existAlert').hide();
														$("#cartaF1").fileinput("enable");
														$("#cartaF2").fileinput("enable");
														$("#id_postulante").val(json.postulante);


												 $("#imgProfile").attr("src", '/'+json.user.avatar);
												 var bodyDoc  = '<ul>';

												 $.each( json.documentos, function( key, value ) {
												 	if(value.nombre =="carta de aceptación"){
												 		$("#cartaF1").fileinput("disable");
														$("#cartaF1").fileinput("refresh", {
															showUpload: false,
															showBrowse: false,
															initialCaption: "Carta aceptación.pdf",
															layoutTemplates: {main1: '<div class="row"><div class="col-lg-9"><div tabindex="-1" class="form-control col-lg-1 file-caption {class}">\n' +
													        '<div class="file-caption-name"></div>\n' +
													        '</div></div> {remove} <a href="/documentos/'+value.path+'"class="btn btn-default" >' +
													    '<i class="fa fa-eye "></i>' +
													    '</a>{browse}</div>'},
														});


												 	}
												 	
												 	else{
												 		if(value.nombre =="Resolución de pregrado"){
													 		$("#cartaF2").fileinput("disable");
															$("#cartaF2").fileinput("refresh", {
																showUpload: false,
																showBrowse: false,
																initialCaption: "Carta aceptación.pdf",
																layoutTemplates: {main1: '<div class="row"><div class="col-lg-9"><div tabindex="-1" class="form-control col-lg-1 file-caption {class}">\n' +
														        '<div class="file-caption-name"></div>\n' +
														        '</div></div> {remove} <a href="/documentos/'+value.path+'"class="btn btn-default" >' +
														    '<i class="fa fa-eye "></i>' +
														    '</a>{browse}</div>'},
															});
													 	}
													 	else{
													 		
												 		bodyDoc = bodyDoc + '<a href="/documentos/'+value.path+'"><li>'+value.nombre+'</li></a>';
													 	}

												 	}
														
												});
												bodyDoc = bodyDoc + '</ul>';

												$('#docBody').html(bodyDoc);   
										tableDatosPersonales.ajax.url('datos-personales/'+json.postulante);
										tableDatosPersonales.ajax.reload();

										tableProcedencia.ajax.url('datos-procedencia/'+json.postulante);
										tableProcedencia.ajax.reload();

										tableEstudiosActuales.ajax.url('estudios-actuales/'+json.postulante);
										tableEstudiosActuales.ajax.reload();

										tableInformacionIntercambio.ajax.url('informacion-intercambio/'+json.postulante);
										tableInformacionIntercambio.ajax.reload();

												}
										},

										error : function(xhr, status) {
										
										},
								});
						});

$("#cartaF1").fileinput({
    uploadUrl: "/subir-archivos/upload-doc-admin", // server upload action
    uploadAsync: true,
    showPreview:false,
    showRemove: false,
    showBrowse:false,
    elErrorContainer: '#kv-documentos-errors',
    msgErrorClass: 'alert alert-block alert-danger',
    browseLabel:"",
    uploadLabel:"",
    removeLabel:"",
    showCaption:true,

	 allowedFileExtensions:['pdf'],
	 uploadExtraData:function(){

	 	var out = {};
	 	out['_token'] = $('#_token').val();
	 	out['id_postulante'] = $('#id_postulante').val();
	 	return out

	 },
    language:"es",
});

$("#cartaF2").fileinput({
    uploadUrl: "/subir-archivos/upload-doc-admin", // server upload action
    uploadAsync: true,
    showPreview:false,
    showRemove: false,
    showBrowse:false,
    elErrorContainer: '#kv-documentos-errors',
    msgErrorClass: 'alert alert-block alert-danger',
    browseLabel:"",
    uploadLabel:"",
    removeLabel:"",
    showCaption:true,
	 allowedFileExtensions:['pdf'],
	 uploadExtraData:function(){

	 	var out = {};
	 	out['_token'] = $('#_token').val();
	 	out['id_postulante'] = $('#id_postulante').val();
	 	return out

	 },
    language:"es",
});


				})

		</script>

@endsection

