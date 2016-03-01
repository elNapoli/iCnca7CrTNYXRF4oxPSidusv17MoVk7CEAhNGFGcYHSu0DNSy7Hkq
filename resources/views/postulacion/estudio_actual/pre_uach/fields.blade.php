<div id="preUachEstudio"  style="display: none">
    <div class="row">
      <div class="col-xs-6">
        <div class="form-group">
            {!!  Form::label('anio_ingreso', 'Año de ingreso a la carrera ')!!}
            {!! Form::text('anio_ingreso',null,array('class' => 'form-control','placeholder'=>'Ej: 2008'));!!}
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-xs-6">
        <div class="form-group">

        {!!  Form::label('ranking', 'Ranking de su promoción');!!}
        {!! Form::text('ranking',null,array('data-toggle'=>'tooltip','title'=>'El ranking puede ser consultado en su escuela','class' => 'form-control','placeholder'=>'Ej: 60'));!!}
        </div>
      </div>
    </div>


    <div class="form-group">
        {!!  Form::label('beneficios', 'Mencione beneficios; becas y créditos vigentes ')!!}
        {!!  Form::textarea('beneficios')!!}
    </div>
</div>