<div id="preNoUachEstudio" style="display: none">
    <div class="row">
      <div class="col-xs-8">
        <div class="form-group">
            {!!  Form::label('area', 'Área de estudio: ')!!}
            {!! Form::text('area',null,array('class' => 'form-control','placeholder'=>'Ej: Tecnología e información'));!!}
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-xs-6">
        <div class="form-group">

        {!!  Form::label('anios_cursados', 'Años cursados');!!}
        {!! Form::number('anios_cursados',null,array('class' => 'form-control','placeholder'=>'Ej: 2'));!!}
        </div>

      </div>
    </div>


 
</div>