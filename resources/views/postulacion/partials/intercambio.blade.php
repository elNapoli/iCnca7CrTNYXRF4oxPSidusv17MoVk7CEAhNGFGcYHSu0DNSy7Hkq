<div class="panel-body">

        <div class="col-lg-6">

            <div class="form-group">
                {!! Form::label('sexo', 'Sexo:') !!}
                <label class="checkbox-inline">
                    {!! Form::checkbox('name', 'value')!!}Semestre I(Marzo-Julio)
                </label>
                <label class="checkbox-inline">
                    {!! Form::checkbox('name', 'value')!!}Semestre II(Agosto-Diciembre)
                </label>
            </div>
            
            <div class="form-group">
                {!!  Form::label('anio', 'Año de intercambio ')!!}
                {!! Form::text('anio',null,array('class' => 'form-control','placeholder'=>'Ej: 1027'));!!}
            </div>


            <div class="row">
              <div class="col-xs-4">
                <div class="form-group">
                    {!!  Form::label('tipo', 'Otro ')!!}

                </div>
              </div>
              <div class="col-xs-8">

                <div class="input-group input-daterange">
                    <input type="text" class="form-control" value="2012-04-05">
                    <span class="input-group-addon">to</span>
                    <input type="text" class="form-control" value="2012-04-19">
                </div>

              </div>
            </div>


        </div>
 
          

</div>
