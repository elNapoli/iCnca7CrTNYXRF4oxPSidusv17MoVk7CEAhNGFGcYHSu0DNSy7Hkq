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
               
               <!-- en caso de no tener mas documentos es necesario contar para rellenar el vacio-->
          		@if($item->tipo == 'p')
		            <th colspan="15" class="no">Pasaporte</th>
		            <th colspan="30" class="desc">{{$item->numero}}</th>
		         @elseif($item->tipo == 'ci')
		            <th colspan="25" class="no">Documento Nacional (*)</th>
		            <th colspan="30" class="desc">{{$item->numero}}</th>
		         @endif
            @endforeach
             @if($p->documentoIdentidadR->count() == 1)
                <th colspan="15" class="no">Pasaporte</th>
                <th colspan="30" class="desc"> No aplica</th>
            @endif
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
            <th colspan="70" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->universidadR->nombre}}</th>
          </tr>
          <tr>
            <th colspan="25" class="no">Area de estudio</th>
            <th colspan="59" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->area}}</th>        <th colspan="8" class="no">Año</th>
            <th colspan="8" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->anios_cursados.'°'}}</th>
          </tr>
          <tr>
            <th colspan="32" class="no">Coordinador de intercambio</th>
            <th colspan="68" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->departamentosR[0]->nombre_encargado}}</th>        
          </tr>
           <tr>
            <th colspan="32" class="no">Datos coordinador</th>
            <th colspan="68" class="desc">Email: {{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->departamentosR[0]->email}} - Telefono: {{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->departamentosR[0]->telefono}} - Direccion: {{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->direccion}}</th>        
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
            <!-- agregar condiciones como a todo lo demas xD 4 casos (sem1 o sem2) (ambos) y (desde hasta)-->
            <th colspan="20" class="no">Semestre(s)</th>
            @if($p->pregradosR->prePostulacionUniversidadesR->semestre == 'otro')
              <th colspan="80" class="desc">No aplica</th>
            @else
                @if($p->pregradosR->prePostulacionUniversidadesR->semestre == 'ambos')
                      <th colspan="80" class="desc">{{'Semestre 1 y 2 del '.$p->pregradosR->prePostulacionUniversidadesR->anio}}</th>
                @else
                      <th colspan="80" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->semestre.' del '.$p->pregradosR->prePostulacionUniversidadesR->anio}}</th>
                @endif
            @endif
          </tr>            
        </tbody>
      </table>
    <div id="cab">3.1 - OTRO PERIODO DE INTERCAMBIO</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            @if($p->pregradosR->prePostulacionUniversidadesR->semestre != 'otro')
                <th colspan="20" class="no">Desde</th>
                <th colspan="30" class="desc"> No aplica </th>
                <th colspan="20" class="no">Hasta</th>
                <th colspan="30" class="desc"> No aplica </th>
            @elseif($p->pregradosR->prePostulacionUniversidadesR->semestre == 'otro')
                <th colspan="20" class="no">Desde</th>
                <th colspan="30" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->desde}}</th>
                <th colspan="20" class="no">Hasta</th>
                <th colspan="30" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->hasta}}</th>
            @endif
          </tr>             
        </tbody>
      </table> 
      <div id="cab">4 - SOLICITUD DE CURSOS</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
                <th colspan="10" class="no">Codigo</th>
                <th colspan="25" class="no">Nombre</th>
                <th colspan="25" class="no">Carrera</th>
                <th colspan="40" class="no">Autorizacion (Uso interno UACh)</th>
          </tr>
          <tr>
                <th colspan="10" class="desc">INFO123</th>
                <th colspan="25" class="desc">Introduccion a la programacion</th>
                <th colspan="25" class="desc">Ingenieria civil en informática</th>
                <th colspan="40" class="desc2">
                    <div>Acepta:____  &nbsp &nbsp &nbsp &nbsp Rechaza:____</div>
                    <div>Observacion:</div>
                    <div><br></div>
                </th>
          </tr>
          <tr>
                <th colspan="10" class="desc">INFO123</th>
                <th colspan="25" class="desc">Introduccion a la programacion</th>
                <th colspan="25" class="desc">Ingenieria civil en informática</th>
                <th colspan="40" class="desc2">
                    <div>Acepta:____  &nbsp &nbsp &nbsp &nbsp Rechaza:____</div>
                    <div>Observacion:</div>
                    <div><br></div>
                </th>
          </tr>
          <tr>
                <th colspan="10" class="desc">INFO123</th>
                <th colspan="25" class="desc">Introduccion a la programacion</th>
                <th colspan="25" class="desc">Ingenieria civil en informática</th>
                <th colspan="40" class="desc2">
                    <div>Acepta:____  &nbsp &nbsp &nbsp &nbsp Rechaza:____</div>
                    <div>Observacion:</div>
                    <div><br></div>
                </th>
          </tr>
          <tr>
                <th colspan="10" class="desc">INFO123</th>
                <th colspan="25" class="desc">Introduccion a la programacion</th>
                <th colspan="25" class="desc">Ingenieria civil en informática</th>
                <th colspan="40" class="desc2">
                    <div>Acepta:____  &nbsp &nbsp &nbsp &nbsp Rechaza:____</div>
                    <div>Observacion:</div>
                    <div><br></div>
                </th>
          </tr>
          <tr>
                <th colspan="10" class="desc">INFO123</th>
                <th colspan="25" class="desc">Introduccion a la programacion</th>
                <th colspan="25" class="desc">Ingenieria civil en informática</th>
                <th colspan="40" class="desc2">
                    <div>Acepta:____  &nbsp &nbsp &nbsp &nbsp Rechaza:____</div>
                    <div>Observacion:</div>
                    <div><br></div>
                </th>
          </tr> 
          <tr>
                <th colspan="10" class="desc">INFO123</th>
                <th colspan="25" class="desc">Introduccion a la programacion</th>
                <th colspan="25" class="desc">Ingenieria civil en informática</th>
                <th colspan="40" class="desc2">
                    <div>Acepta:____  &nbsp &nbsp &nbsp &nbsp Rechaza:____</div>
                    <div>Observacion:</div>
                    <div><br></div>
                </th>
          </tr>                                 
        </tbody>
      </table>
    <div id="cab">4 - CONVENIO</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Financiamiento</th>
            @if($p->pregradosR->prePostulacionUniversidadesR->financiamiento <= 3)
              <th colspan="30" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->financiamientoR->nombre}}</th>
            @else  
              <th colspan="30" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->preOtroFinanciamientosR->first()->descripcion}}</th>
            @endif
            <th colspan="20" class="no">Convenio</th>
            @if($p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->universidadR->conveniosR->toArray() == null)
              <th colspan="30" class="desc">No</th>
            @else
              <th colspan="30" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->universidadR->conveniosR[0]->nombre}}</th>
            @endif
          </tr>                                 
        </tbody>
      </table>
<div id="decl2">
        <div id="cab">5 - DECLARACION</div>
        <ul><p>Yo  afirmo  que  la  información 
          y  documentación  contenida 
          en  esta  postulación
          es  verdadera, 
          completa y precisa</p>
        <ul></ul>
         

          <br>
          <ul>
          <strong>Firma</strong>
          <strong>__________________ &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</strong>
          <strong>Fecha firma: </strong>
          <strong>__________________</strong>
          </ul>
          <br>

  </div>
      <div id="cab">6 - UNIDAD RESPONSABLE DE MOVILIDAD ESTUDIANTIL</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>     
          <tr>
             <th colspan="20" class="no">Institucion</th>
             <th colspan="40" class="desc">Universidad bla bla</th>
             <th colspan="10" class="no">Nombre</th>
             <th colspan="30" class="desc">Nombre del wn</th>
          </tr>
          <tr>
             <th colspan="10" class="no">Cargo</th>
             <th colspan="30" class="desc">Coordinador</th>
             <th colspan="20" class="no">Unidad responsable</th>
             <th colspan="40" class="desc">Movilidad y weas xd</th>
          </tr>   
          <tr>
             <th colspan="10" class="no">Direccion</th>
             <th colspan="40" class="desc"></th>
             <th colspan="10" class="no">Telefono</th>
             <th colspan="40" class="desc"></th>
          </tr> 
          <tr>
             <th colspan="10" class="no">E-mail</th>
             <th colspan="40" class="desc"></th>
             <th colspan="10" class="no">Website</th>
             <th colspan="40" class="desc"></th>
          </tr>
          <tr>
             <th colspan="10" class="no">Fecha</th>
             <th colspan="40" class="desc"></th>
             <th colspan="10" class="no">Lugar</th>
             <th colspan="40" class="desc"></th>
          </tr> 
          <tr>
             <th colspan="20" class="no">Firma y timbre</th>
             <th colspan="80" class="desc">
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
              </th>
          </tr>                                     
        </tbody>
      </table>
    <div id="cab">Fecha de emision: {{ $date }}</div>