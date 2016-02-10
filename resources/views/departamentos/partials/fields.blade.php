<div class="row">
    <div class="col-md-6">
        <div class="form-group">

            <div class="form-group">
                {!!  Form::label('pais', ' Pais ')!!}
                {!!  Form::select('pais', [null=>'Seleccione país']+$pais,null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('universidad', ' Universidad')!!}
                {!!  Form::select('universidad', [null=>'Seleccione universidad'],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('campus_sede', ' Campus o Sede')!!}
                {!!  Form::select('campus_sede', [null=>'Seleccione campus o sede'],null,array('class' => 'form-control'))!!}
            </div>

        </div> 
    </div>

    <div class="col-md-6">
        <div class="form-group">

            <div class="form-group">
                {!!  Form::label('tipo', ' Tipo de departamento ');!!}
                {!! Form::text('tipo',null,array('class' => 'form-control','placeholder'=>'Ej: Movilidad Estudiantil'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('sitio_web', ' Sitio web ');!!}
                {!! Form::text('sitio_web',null,array('class' => 'form-control','placeholder'=>'Ej: www.uach.cl'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('nombre_encargado', ' Nombre del encargado ');!!}
                {!! Form::text('nombre_encargado',null,array('class' => 'form-control','placeholder'=>'Ingrese el nombre del encargado'));!!}
            </div>
                
            <div class="form-group">
                {!!  Form::label('telefono', ' Telefono ');!!}
                {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej: +569123456789'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('email', ' E-mail ');!!}
                {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: direccion@uach.cl'));!!}
            </div>


        <br>
    
    

        </div>
    </div>

</div>
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlUniversidadByPais', url('departamentos/universidad-by-pais'),array('id'=>'getUrlUniversidadByPais'));!!}
{!!Form::hidden('getUrlCampusSedeByuniversidad', url('departamentos/universidad-by-pais'),array('id'=>'getUrlCampusSedeByuniversidad'));!!}



@section('scripts')

<script type="text/javascript">

    $(document).on('ready',function(){
        alert('holiwi')
    selectByTabs("div.row div.col-md-6 div.form-group div.form-group",'pais','getToken','getUrlUniversidadByPais','#universidad');
    selectByTabs("div.row div.col-md-6 div.form-group div.form-group",'universidad','getToken','getUrlCampusSedeByuniversidad','#campus_sede');


    });



</script>



@endsection