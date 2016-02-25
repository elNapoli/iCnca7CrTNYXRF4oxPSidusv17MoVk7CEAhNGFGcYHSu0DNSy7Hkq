<!DOCTYPE html>
@include('pdf.partials.style')

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="./style.css" type="text/css" media="all">
</head>
<body>

  <img width="100" style="float: left; padding: 0.5em;" src="https://raw.githubusercontent.com/elNapoli/MonitoreoCurricular/Inicio_Validaciones/Tesis/tesis_documento/images/portada/escudo.png">

  <img height="110" width="100" padding: 0.5em; style="float: right; padding-right: 1.5em;" src="https://ww4.aievolution.com/nca1501/files/images/My%20Profile.png">

  <br>
  <div style="left; width: 55%; background: #1A8202 no-repeat margin-right: 200px; left: 34.4607px; font-size: 18.2353px; color: #fff; font-family: sans-courier; transform: scaleX(0.983209);" data-canvas-width="131.75000000000003">Universidad Austral de Chile
    <br>Dirección de Estudios de Pregrado<br>Unidad de Movilidad Estudiantil<br>Vicerrectoria Academica</div>
    <br>
    <br>
      <table id="tipos" border="1" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="25" class="t1">Tipo de estudio: {{$p->tipo_estudio}}</th>
            <th colspan="48" class="t2"></th>
            @if($p->pregradosR->procedencia == 'NO UACH')
              <th colspan="27" class="t1">Procedencia: Externo </th>
            @else
            <th colspan="27" class="t1">Procedencia: {{$p->pregradosR->procedencia}} </th>
            @endif
          </tr>
        </tbody>
      </table>

    <hr style="color: green;">

    @if($p->pregradosR->procedencia == 'UACH')
      @include('pdf.partials.preuachpost')
    @elseif($p->pregradosR->procedencia == 'NO UACH')
      @include('pdf.partials.prenouachpost')
    @endif

</body>
<div class="footer">
    Page <span class="pagenum"></span>
  </div>
</html>
