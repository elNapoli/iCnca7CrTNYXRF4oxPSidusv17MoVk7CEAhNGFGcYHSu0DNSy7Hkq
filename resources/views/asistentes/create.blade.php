@extends('intranet.app')

@section('Dashboard') Asistente @endsection

@section('content')
                <h3><i class="fa fa-angle-right"></i> Asistentes \ Crear registro </h3>
                <hr>

<div class="row">


<div class="col-md-1" ></div>
    <div class="col-md-5" >

		@include('partials.error')

		{!! Form::open(['url'=>'asistentes/store', 'method'=>'POST'])!!}

		<div class="form-group">


    {!!  Form::label('nombre', ' Nombre asistente ');!!}
    {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ingrese nombre de El/La Asistente'));!!}

    {!!  Form::label('postulate', ' Postulante ');!!}
    {!!  Form::select('postulante', [null=>'Seleccione un beneficio']+$post,null,array('class' => 'form-control','id'=>'post'))!!}

<!--
    {!!  Form::label('indicaciones', ' Indicaciones ');!!}
    {!! Form::textarea('indicaciones',null,array('class' => 'form-control','placeholder'=>'Ingrese indicaciones', 'rows'=>'3'));!!}
-->

    </div>  



        <a href="{{{ url('asistentes') }}}" class="btn btn-default">Cancelar</a>
        <button type="submit" class="btn btn-info">Guardar y Continuar</button>
        {!!Form::close()!!}
    </div>

{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('beneficiosCrear') !!}
@endsection

@section('scripts')
<script type="text/javascript">

    $(document).ready(function(){

    $('#post').on('change',function(e){ 
        var id = $(this).val() //paso la id del select por referencia
    });
        
$('#create_a').on('click',function(e){ //boton para añadir beneficios en edit
        e.preventDefault(); // jquery evento prevent default (e)

        if(confirm("Continuar y añador beneficios?\nAceptar y contiunar o Cancelar.")){
                    var id_a    = $('#asistente').val();//$('#asistente').val();
                    var post    = $('#post').val(); //captura el id del select 
                    var form  = $('#form-edit'); //traigo la id
                   // var url   = $('#urlBeneficioAdd').val(); //remplazo el placeholder USER_ID con la id
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
                            alert(json.message);                
                            row.show(); //solo se elimina cuando se completa transaccion
                        },

                        error : function(xhr, status) {
                            alert('El beneficio no fue añadido');
                            row.fadeOut();
                            console.log('Disculpe, existió un problema ');
                        },
                    });     
                }

    });

    });

</script>
@endsection