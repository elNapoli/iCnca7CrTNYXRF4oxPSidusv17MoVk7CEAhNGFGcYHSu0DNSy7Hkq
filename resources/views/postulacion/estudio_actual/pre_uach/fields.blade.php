<div id="preUachEstudio"  style="display: none">
    <div class="row">
      <div class="col-xs-6">
        <div class="form-group">

        {!!  Form::label('ranking', 'Ranking de su promoción');!!}
        {!! Form::text('ranking',null,array('class' => 'form-control','placeholder'=>'Ej: 60'));!!}
        </div>

      </div>
    </div>


    <div class="form-group">
        {!!  Form::label('beneficios', 'Mencione beneficios; becas y créditos vigentes ')!!}
        {!!  Form::textarea('beneficios')!!}
    </div>
</div>