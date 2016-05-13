<div class="form-group">
    <label class="col-lg-1 control-label">Universidad</label>
    <div class="col-sm-2">
        {!!  Form::select('universidad', ['0'=>'Todos los Campus']+$campus,null,array('class' => 'form-control','id'=>'campusSede'))!!}
    </div>
    <label class="col-lg-1 control-label">Campus</label>
    <div class="col-sm-2">
        {!!  Form::select('campusSede', ['0'=>'Todos los Campus']+$campus,null,array('class' => 'form-control','id'=>'campusSede'))!!}
    </div>
    <label class="col-lg-1 control-label">Facultad</label>
    <div class="col-sm-2">
                {!!  Form::select('facultad', ['0'=>'Todas las facultades'],null,array('class' => 'form-control','id'=>'facultad'))!!}

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
       {!! Form::text('grupo_sanguineo',null,array('class' => 'form-control','placeholder'=>'Año de intercambio'));!!}
    </div>
    <label class="col-lg-1 control-label">semestre</label>
    <div class="col-lg-2">
       <select class="form-control">
        <option>Seleccione el semestre</option>
        <option>Semestre 1</option>
        <option>Semestre 2</option>
        <option>Semestre 3</option>
       </select>
    </div>

    <label class="col-lg-1 control-label">Postuante UACh</label>
    <div class="col-sm-2">
            <input type="checkbox"/>

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

