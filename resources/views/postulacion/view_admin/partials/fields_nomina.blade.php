<div class="form-group">
    <label class="col-lg-1 control-label">Universidad</label>
    <div class="col-sm-2">
        {!!  Form::select('universidad', ['0'=>'Todas las Universidades']+$universidad,null,array('class' => 'form-control','id'=>'universidad'))!!}
    </div>
    <label class="col-lg-1 control-label">Campus</label>
    <div class="col-sm-2">
        {!!  Form::select('campusSede', ['0'=>'Todos los Campus'],null,array('class' => 'form-control','id'=>'campusSede'))!!}
    </div>
    <label class="col-lg-1 control-label">Facultad</label>
    <div class="col-sm-2">
                {!!  Form::select('facultad', ['0'=>'Todas las facultades'],null,array('class' => 'form-control','id'=>'facultad'))!!}

    </div>
    <label class="col-lg-1 control-label">Carrera</label>
    <div class="col-sm-2">
                {!!  Form::select('carrera', ['0'=>'Todas las carreras'],null,array('class' => 'form-control','id'=>'carrera'))!!}

    </div>


       <!-- 
    <label class="col-lg-2 control-label">Fecha inicio de cursos</label>
    <div class="col-sm-2">
       <input type="text" name='fechaCursos' id="fechaCursos" class="form-control">
    </div>    
   -->


</div>

<div class="form-group">
    <label class="col-lg-1 control-label">Año</label>
    <div class="col-lg-2">
       {!! Form::text('anio_intercambio',null,array('class' => 'form-control','placeholder'=>'Año de intercambio'));!!}
    </div>
    <label class="col-lg-1 control-label">semestre</label>
    <div class="col-lg-2">
       <select class="form-control" id ="semestre">
        <option>Seleccione el semestre</option>
        <option>Semestre 1</option>
        <option>Semestre 2</option>
        <option>Semestre 3</option>
       </select>
    </div>

    <label class="col-lg-1 control-label">Procedencia</label>
    <div class="col-lg-2">
       <select class="form-control" name="procedencia" id ="procedencia">
        <option value="0">Seleccione la Procedencia</option>
        <option value="NO UACH">No UACh</option>
        <option value="UACH">UACh</option>
       </select>
    </div>




       <!-- 
    <label class="col-lg-2 control-label">Fecha inicio de cursos</label>
    <div class="col-sm-2">
       <input type="text" name='fechaCursos' id="fechaCursos" class="form-control">
    </div>    
   -->

     <div class="col-sm-2">
        <a href='#!'class='btn-primary btn' id='generarNomina'> Generar </a>
    </div>    

</div>
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
{!!Form::hidden('getUrlFacultadByCampus', url('facultades/facultades-by-campus'),array('id'=>'getUrlFacultadByCampus'));!!}
{!!Form::hidden('getCampusByUniversidad', url('universidades/campus-by-universidad'),array('id'=>'getCampusByUniversidad'));!!}
{!!Form::hidden('getCarreraByFacultad', url('carreras/carreras-by-facultad'),array('id'=>'getCarreraByFacultad'));!!}

