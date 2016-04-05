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
                                  <div class="panel-body" id='docBody'>
                                      <input id="cartaF" name="cartaF" type="file" multiple=true class="file-loading">

                                  </div>
                                </div>

                            </div>
                        </div>
             
                      </form>
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->





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
            $("#cartaF").fileinput({

                maxFileSize: 1500,
                showClose: false,
                showRemove: true,
                showCaption: false,
                browseLabel: '',
                removeLabel: '',
                language:'es',
                initialPreview:'<img src="{{Auth::user()->avatar}}" alt="Your Avatar" style="width:160px">',
                layoutTemplates: {main2: '{preview}  {remove} {browse}'},
                allowedFileExtensions: ["pdf"],
                previewFileIcon: '<i class="fa fa-file"></i>',
                previewFileType:'pdf',
                allowedPreviewTypes: null, 
                previewFileIconSettings: {
                    'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
                },

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


                         $("#imgProfile").attr("src", '/'+json.user.avatar);
                         var bodyDoc  = '<ul>';

                         $.each( json.documentos, function( key, value ) {
                            bodyDoc = bodyDoc + '<a href="/documentos/'+value.path+'"><li>'+value.nombre+'</li></a>';
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


        })

    </script>

@endsection

