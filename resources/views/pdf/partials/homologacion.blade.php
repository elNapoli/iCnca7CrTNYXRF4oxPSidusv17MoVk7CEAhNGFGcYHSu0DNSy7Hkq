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
            <th colspan="52" class="desc"></th>
            <th colspan="10" class="no">Rut</th>
            <th colspan="24" class="desc"></th>
          </tr>
          <tr>
            <th colspan="14" class="no">E-mail</th>
            <th colspan="52" class="desc"></th>
            <th colspan="10" class="no">Teléfono</th>
            <th colspan="24" class="desc"></th>
          </tr>
          <tr>
            <th colspan="14" class="no">Carrera</th>
            <th colspan="52" class="desc"></th>
            <th colspan="10" class="no">PGA</th>
            <th colspan="24" class="desc"></th>
          </tr>
          <tr>
            <th colspan="22" class="no">Institucion de destino</th>
            <th colspan="38" class="desc"></th>
            <th colspan="16" class="no">País de destino</th>
            <th colspan="24" class="desc"></th>
          </tr>
        </tbody>
      </table>
      <div id="stmnt_h">
      <p>  &nbsp &nbsp &nbsp  Sr/a. <strong>[VARIABLE]</strong> Director/a de la Escuela de <strong>[VARIABLE]</strong> de la facultad de <strong>[VARIABLE]</strong> certifica que el/la alumno/a <strong>[VARIABLE]</strong> realizará una pasantía en la Universidad <strong>[VARIABLE]</strong> por <strong>[VARIABLE]</strong> semestre(s) a partir de <strong>[VARIABLE]</strong> hasta <strong>[VARIABLE]</strong>.</p>

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
          <tr>
            <th colspan="7" class="desc">S1</th>
            <th colspan="7" class="desc">S2</th>
            <th colspan="8" class="desc">codigo</th>
            <th colspan="35" class="desc">ACA VA UN @FPOREACH</th>
            <th colspan="8" class="desc">codigo</th>
            <th colspan="35" class="desc">asignatura</th>
          </tr>
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