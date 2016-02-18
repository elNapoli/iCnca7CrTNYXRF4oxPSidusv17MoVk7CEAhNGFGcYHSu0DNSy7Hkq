@extends('layout.app')

@section('Dashboard') Cursos Homologados @endsection

@section('content')

<div class="row">
      <!-- Default panel contents -->
    <div class="col-md-11" >

        <div class="panel panel-default">

            <div class="panel-heading"></div>

            <div class="panel-body">
                    
{!! Form::model($parametros, ['url'=>['declaracion/update'], 'method'=>'put','id'=>'form-postulacion-active']) !!}




                @include('homologacion.partials.fields')

{!!Form::close()!!}

                
{!!Form::hidden('getUrlAsignaturaByCodigo', url('asignaturas/asignatura-by-codigo'),array('id'=>'getUrlAsignaturaByCodigo'));!!}
            


    
                <!-- Table -->
                <div class="message"></div>
                @include('homologacion.partials.table')
    
            </div>
    

        </div>
    </div>

</div>

    {!!Form::hidden('getUlrCursosHomologados', url('homologacion/cursos-homologados'),array('id'=>'getUlrCursosHomologados'));!!}

{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}



@endsection

@section('scripts')


    <script>    


    $(document).ready(function() {
        var dt = $('#tableCursosHomologados').DataTable( {

            'searching':false,
            'paging':false,
            "ajax": $('#getUlrCursosHomologados').val(),


            "columns": [
                { "data": "periodo" },
                { "data": null,
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        //$(nTd).attr('data','jojo');
                        var html = '<option value ="">Seleccione código</option>';

                        $.each(oData.codigo_asignatura, function(index, subCatObj){
                       
                            html = html + '<option value ="'+subCatObj+'">'+subCatObj+'</option>';
                            
                        });

                        
                        $(nTd).html('<select id="codigo_1" mane="codigo_1" class="form-control"> '+html+'</select>');

                    }
                },
                { "data": "codigo_1" },
                { "data": null,
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                               
                        $(nTd).html('<input type="text" id="codigo_asignatura_2" name="codigo_asignatura_2" class="form-control">');

                    }
                },
                { "data": null,
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        
                        $(nTd).html('<input type="text" id="nombre_asignatura_2" name="nombre_asignatura_2" class="form-control">');

                    }
                },
                { "data": null,
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                          
                        $(nTd).html('<a  href="#!" class="btn btn-info btn-circle"><i class="fa  fa-plus-circle"></i>'+
                            '</a>');

                    }
                }
                   
            ],
        });


        $('#tableCursosHomologados').on('change','#codigo_1',function(){
            var row = dt.row( $(this).parent().parent() ).index();

             $.ajax({
                                  
                async : false,
                data:{_token: $('#_token').val(),codigoAsignatura: $(this).val()},
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#getUrlAsignaturaByCodigo').val() ,
                success : function(json) {   
       
             
                    dt.cell( row, 0 ).data( json.periodo ).draw();
                    dt.cell( row, 2 ).data( json.nombre ).draw();
                    
                },

                error : function(xhr, status) {
                    alert(status);
              
                },
                


            });

        });


    });
    </script>
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('paises') !!}
@endsection


