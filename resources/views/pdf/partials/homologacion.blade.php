<!DOCTYPE html>
@include('pdf.partials.style')

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="./style.css" type="text/css" media="all">
</head>
<body>

  <img width="100" style="float: left; padding: 0.5em;" src="https://raw.githubusercontent.com/elNapoli/MonitoreoCurricular/Inicio_Validaciones/Tesis/tesis_documento/images/portada/escudo.png">


  <br>
  <div style="left; width: 55%; background: #D00A0A no-repeat margin-right: 200px; left: 34.4607px; font-size: 18.2353px; color: #fff; font-family: sans-courier; transform: scaleX(0.983209);" data-canvas-width="131.75000000000003">Universidad Austral de Chile
    <br>Dirección de Estudios de Pregrado<br>Unidad de Movilidad Estudiantil<br>Vicerrectoria Academica</div>
    <br>
    <br>
    <hr style="color: #D00A0A;">
    <div id="cab_h">HOMOLOGACION DE ASIGNATURAS</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="14" class="no">Nombre</th>
            <th colspan="52" class="desc">{{$p->nombre.' '.$p->apellido_paterno.' '.$p->apellido_materno}}</th>
            <th colspan="10" class="no">Rut</th>
            <th colspan="24" class="desc">             
             @foreach($p->documentoIdentidadR as $item)
                @if($item->tipo == 'ci')
                  {{$item->numero}}
                @endif
              @endforeach</th>
          </tr>
          <tr>
            <th colspan="14" class="no">E-mail</th>
            <th colspan="52" class="desc">{{$p->pregradosR->preUachsR->email_institucional}}</th>
            <th colspan="10" class="no">Teléfono</th>
            <th colspan="24" class="desc">{{$p->telefono}}</th>
          </tr>
          <tr>
            <th colspan="14" class="no">Carrera</th>
            <th colspan="52" class="desc">{{$p->pregradosR->preUachsR->preUEstudioActualesR->carreraR->nombre}}</th>
            <th colspan="10" class="no">PGA</th>
            <th colspan="24" class="desc">
              {{$p->pregradosR->preUachsR->homologacionesR[$p->pregradosR->preUachsR->homologacionesR->count()-1]->pga}}</th>
          </tr>
          <tr>
            <th colspan="22" class="no">Institucion de destino</th>
            <th colspan="38" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->universidadR->nombre}}</th>
            <th colspan="16" class="no">País de destino</th>
            <th colspan="24" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->ciudadR->paisR->nombre}}</th>
          </tr>
        </tbody>
      </table>
      <div id="stmnt_h">
      <p>  &nbsp &nbsp &nbsp  Sr/a. <strong>{{$p->pregradosR->preUachsR->preUEstudioActualesR->carreraR->director}}</strong> Director/a de la Escuela de <strong>{{$p->pregradosR->preUachsR->preUEstudioActualesR->carreraR->facultadR->nombre}}</strong> de la facultad <strong>{{$p->pregradosR->preUachsR->preUEstudioActualesR->carreraR->nombre}}</strong> certifica que el/la alumno/a <strong>{{$p->nombre.' '.$p->apellido_paterno.' '.$p->apellido_materno}}</strong> realizará una pasantía en la Universidad <strong>{{$p->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->universidadR->nombre}}</strong> por <strong>
           @if($p->pregradosR->prePostulacionUniversidadesR->semestre == 'semestre 1' or $p->pregradosR->prePostulacionUniversidadesR->semestre == 'semestre 2') 1
           @elseif($p->pregradosR->prePostulacionUniversidadesR->semestre == 'ambos') 2
           @elseif($p->pregradosR->prePostulacionUniversidadesR->semestre == 'otro')
                  el periodo contemplado entre {{$p->pregradosR->prePostulacionUniversidadesR->desde}} y {{$p->pregradosR->prePostulacionUniversidadesR->hasta}}
          @endif
         </strong> semestres(s) correspondiente al año <strong>{{$p->pregradosR->prePostulacionUniversidadesR->anio}}</strong>.</p>

      <p> &nbsp &nbsp &nbsp Cabe destacar que la Escuela ha decidido homologar las siguientes asignaturas una vez 
			que el estudiante 
			haya aprobado y enviado el certificado de notas final con firma y timbre 
			otorgado por la universidad extranjera.
			Ante cualquier problema con la inscripción de ramos en 
			la Universidad extranjera comunicarse con su director (a) d
			e escuela lo antes posible para 
			buscar una solución o en su defecto con Movilidad Estudiantil. Cualquier asignatura inscrita y 
			no cursada se catalogará como reprobada.</p>
  		</div>
    <div id="cab_h">ASIGNATURAS HOMOLOGADAS</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="14" class="no">PERIODO UACH</th>
            <th colspan="43" class="no">UNIVERSIDAD AUSTRAL DE CHILE</th>
            <th colspan="43" class="no">UNIVERSIDAD [VARIABLE]</th>
          </tr>
          <tr>
            <th colspan="7" class="no">S1</th>
            <th colspan="7" class="no">S2</th>
            <th colspan="8" class="no">Codigo</th>
            <th colspan="35" class="no">Asignatura</th>
            <th colspan="8" class="no">Codigo</th>
            <th colspan="35" class="no">Asignatura</th>
          </tr>
          @foreach($p->pregradosR->preUachsR->homologacionesR[$p->pregradosR->preUachsR->homologacionesR
      ->count()-1]->asignaturaHomologadaR as $item)
          <tr>
            <th colspan="7" class="desc">S1</th>
            <th colspan="7" class="desc">S2</th>
            <th colspan="8" class="desc">{{$item->asignatura}}</th>
            <th colspan="35" class="desc">{{$item->asignaturaR->nombre}}</th>
            <th colspan="8" class="desc">{{$item->codigo_asignatura_intercambio}}</th>
            <th colspan="35" class="desc">{{$item->nombre_asignatura_intercambio}}</th>
          </tr>
          @endforeach
         </tbody>
      </table>
          <div id="cab_h">FIRMAS</div>
          <table border="0" cellspacing="0" cellpadding="0">
        	<tbody>
          <tr>
             <th colspan="10" class="no">Fecha</th>
             <th colspan="40" class="desc"></th>
             <th colspan="10" class="no">Ciudad</th>
             <th colspan="40" class="desc"></th>
          </tr> 
          <tr>
             <th colspan="20" class="no">Firma y timbre Director/a de escuela</th>
             <th colspan="30" class="desc">
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
              </th>
             <th colspan="20" class="no">Firma y timbre Estudiante</th>
             <th colspan="30" class="desc">
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
              </th>
          </tr> 
        </tbody>
      </table>
      <div id="cab_h">Fecha de emision: {{ $date }}</div>
</body>
<div class="footer">
    Page <span class="pagenum"></span>
  </div>
</html>