<div class='col-lg-12'>

            <div class="form-group">
                {!!  Form::label('tipo', ' Tipo de alojamiento ')!!}
             	{!!  Form::select('tipo', [null=>'Seleccione tipo',
                                                'Cabaña'=>'Cabaña',
                                                'Casa'=>'Casa',
                                                'Departamento'=>'Departamento',
                                                'Hostal'=>'Hostal',
                                                'Pension'=>'Pension',
                                                'Pieza'=>'Pieza'],null,array('class' => 'form-control'))!!}
    {!!Form::hidden('id','',array('id'=>'id'));!!}
            </div>
            <div class="form-group">
                {!!  Form::label('direccion', ' Direccion ');!!}
                {!! Form::text('direccion',null,array('class' => 'form-control','placeholder'=>'Ej: calle #123'));!!}
            </div>
            <div class="form-group">
                {!!  Form::label('telefono', ' Telefono ');!!}
                {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej: +566322121212'));!!}
            </div>
            <div class="form-group">
                {!!  Form::label('precio', ' Precio (mensual) ');!!}
                {!! Form::text('precio',null,array('class' => 'form-control','placeholder'=>'Ej: 60000'));!!}
            </div>
 
</div>  