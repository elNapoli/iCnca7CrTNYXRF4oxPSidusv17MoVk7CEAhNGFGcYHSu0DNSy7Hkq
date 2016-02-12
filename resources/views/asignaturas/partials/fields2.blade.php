<div class="row">
    <div class="col-md-6">
        <div class="form-group">

<fieldset disabled>

            <div class="form-group">
                {!!  Form::label('universidad', ' Universidad ')!!}
                {!!  Form::select('universidad', [$asignatura->carreraR->facultadR->campusSedeR->universidadR->nombre=>$asignatura->carreraR->facultadR->campusSedeR->universidadR->nombre],null,array('class' => 'form-control'))!!}
            </div>


            <div class="form-group">
                {!!  Form::label('campus_sede', ' Campus o Sede')!!}
                {!!  Form::select('campus_sede', [$asignatura->carreraR->facultadR->campusSedeR->nombre=>$asignatura->carreraR->facultadR->campusSedeR->nombre],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('facultad', ' Facultad')!!}
                {!!  Form::select('facultad', [$asignatura->carreraR->facultadR->nombre=>$asignatura->carreraR->facultadR->nombre],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('carrera', ' Carrera')!!}
                {!!  Form::select('carrera', [$asignatura->carreraR->nombre=>$asignatura->carreraR->nombre],null,array('class' => 'form-control'))!!}
            </div>

</fieldset>

        </div> 
    </div>

    <div class="col-md-6">
        <div class="form-group">

            <div class="form-group">
                {!!  Form::label('codigo', ' Codigo de asignatura ');!!}
                {!! Form::text('codigo',null,array('class' => 'form-control','placeholder'=>'Ej: INFO123'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('nombre', ' Nombre asignatura ');!!}
                {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Proyecto de tesis'));!!}
            </div>
                
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                    {!!  Form::label('nivel', 'Nivel ')!!}
                    {!!  Form::select('nivel', [null=>'Seleccione nivel',
                                                '1'=>'Nivel 1',
                                                '2'=>'Nivel 2',
                                                '3'=>'Nivel 3',
                                                '4'=>'Nivel 4',
                                                '5'=>'Nivel 5',
                                                '6'=>'Nivel 6',
                                                '7'=>'Nivel 7',
                                                '8'=>'Nivel 8',
                                                '9'=>'Nivel 9',
                                                '10'=>'Nivel 10',
                                                '11'=>'Nivel 11',
                                                '12'=>'Nivel 12'],null,array('class' => 'form-control'))!!}

                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                    {!!  Form::label('anio', 'Año malla curricular')!!}
                    {!! Form::text('anio',null,array('class' => 'form-control','placeholder'=>'Ej: '.date('Y')));!!}
                </div>
              </div>
            </div>
    
        </div>
    </div>

</div>