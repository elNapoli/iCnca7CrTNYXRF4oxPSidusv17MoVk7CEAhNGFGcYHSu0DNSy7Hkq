@extends('intranet.app')

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
{!!Form::hidden('getUrlStoreCursoHomologado', url('homologacion/store'),array('id'=>'getUrlStoreCursoHomologado'));!!}
{!!Form::hidden('getUrlDestroyCursoHomologado', url('homologacion/destroy'),array('id'=>'getUrlDestroyCursoHomologado'));!!}
            


    
                <!-- Table -->
                <div class="message"></div>
                @include('homologacion.partials.table')
    
            </div>
    

        </div>
    </div>

</div>

    {!!Form::hidden('getUlrCursosHomologados', url('homologacion/cursos-homologados'),array('id'=>'getUlrCursosHomologados'));!!}

{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}

@include('partials.loading')

@endsection

@section('scripts')


    <script>    


    $(document).ready(function() {
         $('[data-toggle="tooltip"]').tooltip(); 
        var dt = $('#tableCursosHomologados').DataTable( {

            'searching':false,
            'paging':false,
            "bProcessing": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "ajax": $('#getUlrCursosHomologados').val(),


            "columns": [
                { "data": "periodo" },
                { "data": null,
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        //$(nTd).attr('data','jojo');
                        var html = '';
                        $(nTd).html(sData.codigo_1);

                        if(sData.periodo === ''){
                            html = '<option value ="">Seleccione código</option>';
                            disabled = '';
                            $.each(oData.codigo_asignatura, function(index, subCatObj){
                           
                                html = html + '<option value ="'+subCatObj+'">'+subCatObj+'</option>';
                                
                            });

                            $(nTd).html('<select  id="codigo_asignatura_1-'+iRow+'" mane="codigo_asignatura_1-'+iRow+'" class=" codigo_asignatura_select form-control"> '+html+'</select>');

                        }
                        

                            
                        

                      

                    }
                },
                { "data": "asignatura_1" },
                { "data": null,
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html(sData.codigo_2);
                        $(nTd).attr('style','border-left: 3px solid black');
                        if(sData.periodo === ''){
                            
                            $(nTd).html('<input type="text" value="'+oData.codigo_2+'" id="codigo_asignatura_2-'+iRow+'" name="codigo_asignatura_2-'+iRow+'" class="form-control">');
                        }       

                    }
                },
                { "data": null,
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html(sData.asignatura_2);
                        if(sData.periodo === ''){
                        
                            $(nTd).html('<input type="text" value="'+oData.asignatura_2+'" id="nombre_asignatura_2-'+iRow+'" name="nombre_asignatura_2'+iRow+'" class="form-control">');
                        }

                    }
                },
                { "data": null,
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).attr('align','center');

                        var html = "<a href='#!'  class='addCurso  btn btn-primary btn-xs'> <i class='fa fa-plus'></i></a>";
                        if(sData.periodo != ''){

                            html = "<a href='#!' id='"+oData.id+"' class='btn btn-danger btn-delete btn-xs' > "+
                            "<i class='fa fa-trash-o'></i></a>";
                        }               
                        $(nTd).html(html);

                    }
                }
                   
            ],
        });
                    

        $('#tableCursosHomologados').on('click','.btn-delete',function(){

            $.ajax({
                                  
                async : false,
                data:{
                    _token: $('#_token').val(),
                    id: $(this).attr('id'),

                },
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#getUrlDestroyCursoHomologado').val() ,
                beforeSend:function() {
                        $('#loading').show();
                    },
                    complete: function(){
                        $('#loading').hide();
                    },
                success : function(json) {   
                    $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');  
                    dt.ajax.reload();              
             
                    
                },

                error : function(xhr, status) {
                    alert(status);
              
                },
                


            });
        });
        $('#tableCursosHomologados').on('click','.addCurso',function(){

            var row = dt.row( $(this).parent().parent() ).index();

            var codigo_1 = $('#codigo_asignatura_1-'+row).val();
            var codigo_2 = $('#codigo_asignatura_2-'+row).val();
            var nombre_asignatura_2 = $('#nombre_asignatura_2-'+row).val();
           // alert(nombre_asignatura_2);

            $.ajax({
                                  
                async : false,
                data:{
                    _token: $('#_token').val(),
                    codigo_1: codigo_1,
                    codigo_2: codigo_2,
                    nombre_asignatura_2: nombre_asignatura_2,
                    pga: $('#pga').val(),

                },
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#getUrlStoreCursoHomologado').val() ,
                beforeSend:function() {
                        $('#loading').show();
                },
                complete: function(){
                    $('#loading').hide();
                },
                success : function(json) {   
       
                        dt.ajax.reload();              
             
                    
                },

                error : function(xhr, status) {
                    console.log(xhr);
                    responseJSON =  JSON.parse(xhr.responseText);

                    var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                        for(var key in responseJSON)
                        {
                            html += "<li>" + responseJSON[key][0] + "</li>";
                        }
                        $('.message').html(html+'</div>');
              
                },
                


            });



        });
        $('#tableCursosHomologados').on('change','.codigo_asignatura_select',function(){
            var row = dt.row( $(this).parent().parent() ).index();
             $.ajax({
                                  
                async : false,
                data:{
                    _token: $('#_token').val(),
                    codigoAsignatura: $(this).val()},
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url:$('#getUrlAsignaturaByCodigo').val() ,
                beforeSend:function() {
                    $('#loading').show();
                },
                complete: function(){
                    $('#loading').hide();
                },
                success : function(json) {   

                    dt.cell( row, 0 ).data( json.periodo );

                    dt.cell( row, 2 ).data( json.nombre );
                
                   // dt.ajax.reload();
                    
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


