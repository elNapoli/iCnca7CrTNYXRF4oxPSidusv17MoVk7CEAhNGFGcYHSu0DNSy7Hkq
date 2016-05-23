@extends('intranet.app')


@section('content')
  


            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Nómina de postulantes UACh</h4>
                      <form class="form-horizontal style-form" method="get">
                          @include('postulacion.view_admin.partials.fields_nomina')
                      </form>
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->


            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      @include('postulacion.view_admin.partials.table_nomina')
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->
{!!Form::hidden('getUrlGeneradorNomina', url('postulacion/generar-nomina'),array('id'=>'getUrlGeneradorNomina'));!!}


@endsection


@section('scripts')
    {!! Html::Script('js/datepicker-es.js')!!}
    {!! Html::Script('js/funciones.js') !!}

<script>
    $(document).on('ready',function(){
        selectByTabs("form.form-horizontal",'#universidad','#_token','#getCampusByUniversidad','#campusSede');

        selectByTabs("form.form-horizontal",'#campusSede','#_token','#getUrlFacultadByCampus','#facultad');
        selectByTabs("form.form-horizontal",'#facultad','#_token','#getCarreraByFacultad','#carrera');

        $('#fechaCursos').datepicker({

            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            showAnim: 'drop',
            yearRange: '1989:2020'

        });

        var dt = $('#tableNominas').DataTable( {
       
            "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
            "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
            "scrollX": true,
            "bProcessing": true,    
            'ajax':{
                'type': 'POST',
                'url':$('#getUrlGeneradorNomina').val(),
                'data':function(d){

                	var obj = {
        'universidad':$('#universidad').val(),
		  	'campusSede':$('#campusSede').val(),
		    'facultad':$('#facultad').val(),
        'anio_intercambio':$('#anio_intercambio').val(),
        'semestre':$('#semestre').val(),
        'procedencia':$('#procedencia').val(),
		    '_token':$('#_token').val()
    	};
    	return obj;
                }
            },    
            "columns": [
                  { "data":"nombre" },
                  { "data":"apellido_paterno" },
                  { "data":"apellido_materno" },
                  { "data":"fecha_nacimiento" },
                  { "data":"telefono1" },
                  { "data":"email_personal" },
                  { "data":"area" },
                  { "data":"anios_cursados" },
                  { "data":"campus1" },
                  { "data":"universidad1" },
                  { "data":"anio_ingreso" },
                  { "data":"carrera" },
                  { "data":"facultad" },
                  { "data":"campus2" },
                  { "data":"universidad2" },
                  
             
              ]
          } );

        $('#generarNomina').on('click',function(){
            dt.ajax.url($('#getUrlGeneradorNomina').val());
            console.log($('#campusSede').val());
            dt.ajax.reload();

        });


    });

</script>
@endsection
