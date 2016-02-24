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
            <th colspan="80" class="desc"></th>
          </tr>
          <tr>
            <th colspan="24" class="no">Documento nacional</th>
            <th colspan="30" class="desc"></th>
            <th colspan="16" class="no">Pasaporte</th>
            <th colspan="30" class="desc"></th>
          </tr>
          <tr>
            <th colspan="16" class="no">Nacionalidad</th>
            <th colspan="30" class="desc"></th>
            <th colspan="22" class="no">Fecha de nacimiento</th>
            <th colspan="16" class="desc"></th>
            <th colspan="8" class="no">Sexo</th>
            <th colspan="8" class="desc"></th>
          </tr>
          <tr>
            <th colspan="20" class="no">Dirección</th>
            <th colspan="80" class="desc"></th>
          </tr>
          <tr>
            <th colspan="15" class="no">Teléfono</th>
            <th colspan="25" class="desc"></th>
            <th colspan="15" class="no">E-mail</th>
            <th colspan="45" class="desc"></th>
          </tr>
          <tr>
            <th colspan="25" class="no">Universidad de origen</th>
            <th colspan="75" class="desc"></th>
          </tr>
          <tr>
            <th colspan="15" class="no">País</th>
            <th colspan="30" class="desc"></th>
            <th colspan="15" class="no">Facultad</th>
            <th colspan="40" class="desc"></th>
          </tr>
          <tr>
            <th colspan="20" class="no">Especialidad</th>
            <th colspan="80" class="desc"></th>
          </tr>
          <tr>
            <th colspan="25" class="no">Código universitario</th>
            <th colspan="50" class="desc"></th>
            <th colspan="15" class="no">Años cursados</th>
            <th colspan="10" class="desc"></th>
          </tr>
        </tbody>
      </table>

 <div id="cab_cinda">UNIVERSIDAD DE DESTINO</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Nombre</th>
            <th colspan="80" class="desc"></th>
          </tr>
          <tr>
            <th colspan="20" class="no">País</th>
            <th colspan="80" class="desc"></th>
          </tr>
        </tbody>
      </table>

 <div id="cab_cinda">COORDINADOR INSTITUCIONAL</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Nombre</th>
            <th colspan="80" class="desc"></th>
          </tr>
          <tr>
            <th colspan="15" class="no">Tel/Fax</th>
            <th colspan="25" class="desc"></th>
            <th colspan="15" class="no">E-mail</th>
            <th colspan="45" class="desc"></th>
          </tr>
        </tbody>
      </table>

 <div id="cab_cinda">RESPONSABLE ACADEMICO</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Nombre</th>
            <th colspan="80" class="desc"></th>
          </tr>
          <tr>
            <th colspan="15" class="no">Tel/Fax</th>
            <th colspan="25" class="desc"></th>
            <th colspan="15" class="no">E-mail</th>
            <th colspan="45" class="desc"></th>
          </tr>
        </tbody>
      </table>

            <div id="cab_cinda">Fecha de emision: {{ $date }}</div>
</body>
<div class="footer">
    Page <span class="pagenum"></span>
  </div>
</html>