<div class="panel-body">

        <div class="col-lg-6">

 <section>

        <div class='page-header'>
          <h1>Bootstrap Select</h1>
        </div>

        <div class='row span6 offset3'>

          <form class='form-horizontal' action=''>
            <fieldset>

              <!-- PREPEND EXAMPLE -->
              <div class='control-group'>
                <label class='control-label'>Prepend</label>
                <div class='controls'>
                  <div class='input-prepend dropdown' data-select='true'>
                    <!-- there must not be a space between the prepend toggle and the input field -->
                    <a class='add-on dropdown-toggle' data-toggle='dropdown' href='#'>
                      <!-- span.dropdown-display will be updated with the text from the selected option -->
                      <span class='dropdown-display'>http://</span>
                      <i class='caret'></i>
                    </a><input type='text' placeholder='jh-lim.com' class='span2' />
                    <!-- this hidden field is used to contain the selected option from the dropdown -->
                    <input type='hidden' value='http://' class='dropdown-field' />
                    <!-- unordered list of options -->
                    <ul class='dropdown-menu'>
                      <li>
                        <a href="#" data-value="http://">http://</a>
                      </li>
                      <li>
                        <a href="#" data-value="https://">https://</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /PREPEND EXAMPLE -->

              <!-- APPEND EXAMPLE -->
              <div class='control-group'>
                <label class='control-label'>Append</label>
                <div class='controls'>
                  <div class='input-append dropdown' data-select='true'>
                    <!-- The hidden field can be anywhere within div.dropdown -->
                    <input type='hidden' value='' class='dropdown-field' />
                    <!-- Unordered list of options -->
                    <ul class='dropdown-menu'>
                      <li>
                        <a href="http://localhost:3000/" data-value="minutes">minutes</a>
                      </li>
                      <li>
                        <a href="http://localhost:3000/" data-value="hours">hours</a>
                      </li>
                      <li>
                        <a href="http://localhost:3000/" data-value="days">days</a>
                      </li>
                    </ul>
                    <!-- Make sure there isn't a space between the input and the toggle -->
                    <input type='number' placeholder='5' class='input-mini'/><a
                      class='add-on dropdown-toggle'
                      data-toggle='dropdown' href='#'>
                      <span class='dropdown-display'>minutes</span>
                      <i class='caret'> </i>
                    </a>
                  </div>
                </div>
              </div>
              <!-- /APPEND EXAMPLE -->

            </fieldset>
          </form>

        </div><!-- /.row -->
      </section>

            <div class="form-group">
                {!! Form::label('semestre', 'Semester:') !!}
                <label class="radio-inline">
                    {!! Form::radio('semestre', 'semestre 1',array('id'=>'semestreI'))!!} Semestre I
                </label>
                <label class="radio-inline">
                    {!! Form::radio('semestre', 'semestre 2',array('id'=>'semestreII'))!!} Semestre II
                </label>
                <label class="radio-inline">
                    {!! Form::radio('semestre', 'ambos',array('id'=>'semestreIII'))!!} Todo el Año
                </label>

            </div>

            <div class="form-group">
                {!!  Form::label('anio', 'Año de intercambio ')!!}
                {!! Form::number('anio',null,array('min'=>'2015','class' => 'form-control','placeholder'=>'Ej: 2015'));!!}
            </div>

            <div class="form-group">
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Desde</span>
                           
                            {!! Form::text('desde',null,array('id'=>'desde','class' => 'form-control'));!!}

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Hasta</span>
                            {!! Form::text('hasta',null,array('id'=>'hasta','class' => 'form-control'));!!}

                        </div>
                    </div>
                </div>
            </div>
    
                
            <div class="form-horizontal">
              <div class="form-group">
                <div class="col-lg-4">
                    {!! Form::label('financiamiento', 'Financiamiento:') !!}
                </div>
                <div class="col-lg-7">
                    

                </div>
              </div>

            </div>

        </div>
        <div class="col-lg-6">
            @include('postulacion.partials.fields')
           
        </div>
          
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
{!!Form::hidden('urlStoreInformacion',url('prepostulacionuniversidad/store'),array('id'=>'urlStoreInformacion'));!!}
{!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
{!!Form::hidden('getCampusByPais', url('universidades/universidad-by-pais'),array('id'=>'getCampusByPais'));!!}
{!!Form::hidden('getUrlFacultadByCampus', url('facultades/facultades-by-campus'),array('id'=>'getUrlFacultadByCampus'));!!}

{!!Form::hidden('getUrlFinanciamientos', url('financiamientos/financiamientos'),array('id'=>'getUrlFinanciamientos'));!!}
{!!Form::hidden('getUrlCarreraByFacultad', url('carreras/carreras-by-facultad'),array('id'=>'getUrlCarreraByFacultad'));!!}
</div>
