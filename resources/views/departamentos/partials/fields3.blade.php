<div class='col-lg-12'>

    <div class="form-group">

 <fieldset disabled>
            <div class="form-group">
                {!!  Form::label('campus_sede', ' Campus o Sede ');!!}
                {!! Form::text('campus_sede',null,array('class' => 'form-control','placeholder'=>'algo'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('tipo', ' Tipo de departamento ');!!}
                {!! Form::text('tipo',null,array('class' => 'form-control','placeholder'=>'algo'));!!}
            </div>
</fieldset>

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
{!!Form::hidden('id','',array('id'=>'id'));!!}
        </div>
        </div>
