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
  <div style="left; width: 55%; background: #270F8E no-repeat margin-right: 200px; left: 34.4607px; font-size: 18.2353px; color: #fff; font-family: sans-courier; transform: scaleX(0.983209);" data-canvas-width="131.75000000000003">Universidad Austral de Chile
    <br>Dirección de Estudios de Pregrado<br>Unidad de Movilidad Estudiantil<br>Vicerrectoria Academica</div>
    <br>
    <br>
    <hr style="color: #270F8E;">
    <div id="cab_a">PROCEDIMIENTOS PARA MANTENCION DE BENEFICIOS<br>
Estudiantes UACh en pasantía o doble titulación fuera de Chile</div>
<div id="stmnt_h">
      <p>  Sr(a.) .................................................,  Asistente  Social  de  la  Dirección  de  Asuntos Estudiantiles deja constancia de haber atendido al(la) estudiante <strong>[VARIABLE]</strong> Rut: <strong>[VARIABLE]</strong> de la carrera <strong>[VARIABLE]</strong> de la Facultad de <strong>[VARIABLE]</strong>, quien realizará una pasantía en la Universidad <strong>[VARIABLE]</strong> por <strong>[VARIABLE]</strong> semestres(s) a partir de <strong>[VARIABLE]</strong> hasta <strong>[VARIABLE]</strong>, con la finalidad de informar procedimientos que debe realizar para mantener beneficios de arancel y mantención
	  tanto internos como Estatales</p>
  		</div>
  <div id="cab_a">BENEFICIOS QUE POSEE<br>
(arancel y mantención tanto internos como externos a la UACh)<br></div>
  	<div id="stmnt_h">
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		</div>
   
  <div id="cab_a">INDICACIONES AL(LA) ESTUDIANTE<br>
(Fecha  y  procedimiento 
de  matrícula  año  siguiente,  requisitos  de  renovación  de  todos  beneficios,  plazos, 
documentos, páginas que debe revisar periódicamente, otros)<br></div>
  	<div id="stmnt_h">
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		</div>
   <div id="cab_a">Fecha de emision: {{ $date }}</div>

  <div id="cab_a" style="page-break-before: always;">LEGALIDAD</div>
  	<div id="stmnt_h">
  		<p> &nbsp &nbsp &nbsp Para todos los efectos quien actuará como mi representante legal es: <strong>[VARIABLE]</strong>,  parentesco <strong>[VARIABLE]</strong> Teléfono fijo: <strong>[VARIABLE]</strong> Celular <strong>[VARIABLE]</strong>, e-mail: <strong>[VARIABLE]</strong>, a quien dejaré un poder notarial con fines generales, para que pueda gestionar trámites en mi nombre, dentro de lo que permite la Ley y las políticas públicas chilenas.</p>
  		<p> &nbsp &nbsp &nbsp En caso de no cumplir con las indicaciones mencionadas en este documento, la UACh no se hace responsable por la pérdida de sus beneficios. Con fecha ..... de ............... de 20.... ,el(la)  estudiante <strong>[VARIABLE]</strong> ha tomado conocimiento de los trámites a realizar durante su estadía en el extranjero para efectos de renovar beneficios de arancel y/o mantención institucionales y estatales, y se compromete a cumplirlos en su cabalidad o de asumir las consecuencias en caso de no realizar lo establecido. </p>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<p style="text-align:center"><strong style="border-top: solid;">Firma Estudiante</strong> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong style="border-top: solid;">Firma Tutor UACh</strong></p>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<p style="text-align:center"><strong style="border-top: solid;">Firma Asistente social</strong> &nbsp &nbsp </p>
  		<br>
  		</div>
   <div id="cab_a">Fecha de emision: {{ $date }}</div>
</body>
<div class="footer">
    Page <span class="pagenum"></span>
  </div>
</html>