    <div id="cab">1 - DATOS PERSONALES</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="18" class="no">Apellido paterno</th>
            <th colspan="32" class="desc">{{$p->apellido_paterno}}</th>
            <th colspan="18" class="no">Aepllido materno</th>
            <th colspan="32" class="desc">{{$p->apellido_materno}}</th>
          </tr>
          <tr>
            <th colspan="10" class="no">Nombres</th>
            <th colspan="50" class="desc">{{$p->nombre}}</th>
            <th colspan="22" class="no">Fecha de Nacimiento</th>
            <th colspan="18" class="desc">{{$p->fecha_nacimiento}}</th>
          </tr>
           <tr>
            <th colspan="22" class="no">Nacionalidad</th>
            <th colspan="46" class="desc">{{$p->nacionalidad}}</th>
            <th colspan="10" class="no">Edad</th>
            <th colspan="6" class="desc">{{$date-$p->fecha_nacimiento}}</th>
            <th colspan="10" class="no">Sexo</th>
            @if($p->sexo = 'm')
              <th colspan="6" class="desc">M</th>
            @elseif($p->sexo = 'f')
              <th colspan="6" class="desc">F</th>
              @endif
          </tr>          
          <tr>
          	@foreach($p->documentoIdentidadR as $item)
          		@if($item->tipo == 'p')
		            <th colspan="15" class="no">Pasaporte</th>
		            <th colspan="30" class="desc">{{$item->numero}}</th>
		         @elseif($item->tipo == 'ci')
		            <th colspan="25" class="no">Documento Nacional (*)</th>
		            <th colspan="30" class="desc">{{$item->numero}}</th>
		         @endif
            @endforeach
          </tr>
          <tr>
            <th colspan="18" class="no">Pais</th>
            <th colspan="28" class="desc">{{$p->ciudadR->paisR->nombre}}</th>
            <th colspan="22" class="no">Lugar de nacimiento</th>
            <th colspan="32" class="desc">{{$p->lugar_nacimiento}}</th>
          </tr>
           <tr>
            <th colspan="17" class="no">Direccion origen</th>
            <th colspan="45" class="desc">{{$p->direccion}}</th>
            <th colspan="15" class="no">Ciudad</th>
            <th colspan="23" class="desc">{{$p->ciudadR->nombre}}</th>
          </tr>
           <tr>
            <th colspan="17" class="no">Email</th>
            <th colspan="45" class="desc">{{$p->email_personal}}</th>
            <th colspan="15" class="no">Telefono</th>
            <th colspan="23" class="desc">{{$p->telefono}}</th>
          </tr>
        </tbody>
      </table>
   <div id="cab">2 - INFORMACION ACADEMICA</div>
		<table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="30" class="no">Universidad procedencia</th>
            <th colspan="70" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedesR->universidadR->nombre}}</th>
          </tr>
          <tr>
            <th colspan="25" class="no">Area de estudio</th>
            <th colspan="59" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->area}}</th>        <th colspan="8" class="no">Año</th>
            <th colspan="8" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->anios_cursados.'°'}}</th>
          </tr>
          <tr>
            <th colspan="32" class="no">Coordinador de intercambio</th>
            <th colspan="68" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedesR->departamentosR[0]->nombre_encargado}}</th>        
          </tr>
           <tr>
            <th colspan="32" class="no">Datos coordinador</th>
            <th colspan="68" class="desc">Email: {{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedesR->departamentosR[0]->email}} - Telefono: {{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedesR->departamentosR[0]->telefono}} - Direccion: Falta agregar el campo a la tabla campus<!--{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedesR->direccion}} --></th>        
          </tr>
        </tbody>
      </table>
    <div id="cab">3 - INFORMACION INTERCAMBIO ESTUDIANTIL</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Carrera postulacion</th>
            <th colspan="45" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->carreraR->nombre}}</th>
            <th colspan="15" class="no">Campus</th>
            <th colspan="20" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->nombre}}</th>
          </tr>  
          <tr>
            <!-- agregar condiciones como a todo lo demas xD 3 casos (sem1 o sem2) (ambos) y (desde hasta)-->
            <th colspan="20" class="no">Semestre I</th>
            <th colspan="30" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->semestre.' del '.$p->pregradosR->prePostulacionUniversidadesR->anio}}</th>
            <th colspan="20" class="no">Semestre II</th>
            <th colspan="30" class="desc"> - </th>
          </tr>            
        </tbody>
      </table>
    <div id="cab">3.1 - OTRO PERIODO DE INTERCAMBIO</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Desde</th>
            <th colspan="30" class="desc"> - </th>
            <th colspan="20" class="no">Hasta</th>
            <th colspan="30" class="desc"> - </th>
          </tr>            
        </tbody>
      </table> 