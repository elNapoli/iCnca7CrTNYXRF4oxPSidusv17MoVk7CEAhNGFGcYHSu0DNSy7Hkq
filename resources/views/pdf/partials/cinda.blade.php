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
  <div style="left; width: 55%; background: #000000 no-repeat margin-right: 200px; left: 34.4607px; font-size: 18.2353px; color: #fff; font-family: sans-courier; transform: scaleX(0.983209);" data-canvas-width="131.75000000000003">Universidad Austral de Chile
    <br>Dirección de Estudios de Pregrado<br>Unidad de Movilidad Estudiantil<br>Vicerrectoria Academica</div>
    <br>
    <br>
    <hr style="color: #000000;">
    <div id="cab_cinda">FORMULARIO CINDA</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Nombre completo</th>
            <th colspan="80" class="desc">{{$p->nombre.' '.$p->apellido_paterno.' '.$p->apellido_materno}}</th>
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
             @if($p->documentoIdentidadR->count() == 1 and $p->documentoIdentidadR->first()->tipo == 'ci')
                <th colspan="15" class="no">Pasaporte</th>
                <th colspan="30" class="desc"> No aplica</th>
             @elseif($p->documentoIdentidadR->count() == 1 and $p->documentoIdentidadR->first()->tipo == 'p')
                <th colspan="25" class="no">Documento Nacional (*)</th>
                <th colspan="30" class="desc"> No aplica</th>
            @endif
          </tr>
          <tr>
            <th colspan="16" class="no">Nacionalidad</th>
            <th colspan="30" class="desc">{{$p->nacionalidad}}</th>
            <th colspan="22" class="no">Fecha de nacimiento</th>
            <th colspan="16" class="desc">{{$p->fecha_nacimiento}}</th>
            <th colspan="8" class="no">Sexo</th>
            @if($p->sexo = 'm')
              <th colspan="8" class="desc">M</th>
            @elseif($p->sexo = 'f')
              <th colspan="8" class="desc">F</th>
              @endif
          </tr>
          <tr>
            <th colspan="20" class="no">Dirección</th>
            <th colspan="80" class="desc">{{$p->direccion}}</th>
          </tr>
          <tr>
            <th colspan="15" class="no">Teléfono</th>
            <th colspan="25" class="desc">{{$p->telefono}}</th>
            <th colspan="15" class="no">E-mail</th>
            <th colspan="45" class="desc">{{$p->email_personal}}</th>
          </tr>
          <tr>
            <th colspan="25" class="no">Universidad de origen</th>
            <th colspan="75" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->universidadR->nombre}}</th>
          </tr>
          <tr>
            <th colspan="15" class="no">País</th>
            <th colspan="30" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->ciudadR->paisR->nombre}}</th>
            <th colspan="15" class="no">Facultad</th>
            <th colspan="40" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->nombre}}</th>
          </tr>
          <tr>
            <th colspan="20" class="no">Especialidad</th>
            <th colspan="80" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->area}}</th>
          </tr>
          <tr>
            <th colspan="25" class="no">Código universitario</th>
            <th colspan="50" class="desc">{{$p->pregradosR->preNoUachsR->cindaR->codigo_universidad}}</th>
            <th colspan="15" class="no">Años cursados</th>
            <th colspan="10" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->anios_cursados}}</th>
          </tr>
        </tbody>
      </table>

 <div id="cab_cinda">UNIVERSIDAD DE DESTINO</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Nombre</th>
            <th colspan="80" class="desc">Universidad Austral de Chile</th>
          </tr>
          <tr>
            <th colspan="20" class="no">País</th>
            <th colspan="80" class="desc">Chile</th>
          </tr>
        </tbody>
      </table>

 <div id="cab_cinda">COORDINADOR INSTITUCIONAL (ORIGEN)</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Nombre</th>
            <th colspan="80" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->departamentosR->first()->nombre_encargado}}</th>
          </tr>
          <tr>
            <th colspan="15" class="no">Tel/Fax</th>
            <th colspan="25" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->departamentosR->first()->telefono}}</th>
            <th colspan="15" class="no">E-mail</th>
            <th colspan="45" class="desc">{{$p->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->departamentosR->first()->email}}</th>
          </tr>
        </tbody>
      </table>

 <div id="cab_cinda">RESPONSABLE ACADEMICO (ORIGEN)</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Nombre</th>
            <th colspan="80" class="desc">{{$p->pregradosR->preNoUachsR->cindaR->nombre_responsable_academico}}</th>
          </tr>
          <tr>
            <th colspan="15" class="no">Tel/Fax</th>
            <th colspan="25" class="desc">{{$p->pregradosR->preNoUachsR->cindaR->telefono_responsable_academico}}</th>
            <th colspan="15" class="no">E-mail</th>
            <th colspan="45" class="desc">{{$p->pregradosR->preNoUachsR->cindaR->email_responsable_academico}}</th>
          </tr>
        </tbody>
      </table>

            <div id="cab_cinda">Fecha de emision: {{ $date }}</div>
</body>
<div class="footer">
    Page <span class="pagenum"></span>
  </div>
</html>