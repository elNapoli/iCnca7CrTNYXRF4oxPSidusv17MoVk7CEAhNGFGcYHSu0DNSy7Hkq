<!DOCTYPE html>
<style type="text/css">
.text-danger{
  color:red;
}
#cab{
	background-color: #1A8202;
	text-align: center;
	color: #fff;
  border-top: 1px solid #000000;
  border-bottom: 1px solid #000000;
  border-left: 1px solid #000000;
  border-right: 1px solid #000000;
}
#decl{
  page-break-before: always;
  font:helvetica;
  background-color: #FFFFFF;
  text-align: left;
  color: #000;
  border-top: 1px solid #000000;
  border-bottom: 1px solid #000000;
  border-left: 1px solid #000000;
  border-right: 1px solid #000000;
}
#tipos{
} 

#tipos .t1{
  border: 1px solid #000000;
}
#tipos .t2{
  background-color: white;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #ffffff;

}

table {
  width: 100%;
  table-layout: fixed;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 0px;
}

table th,
table td {
  padding: 4px;
  background: #EEEEEE;
  text-align: center;
  border-top: 1px solid #000000;
  border-bottom: 1px solid #000000;
  border-left: 1px solid #000000;
  border-right: 1px solid #000000;
}

table th {      
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #000000;
  font-size: 1em;
  background: #E9E9E9;
}

table .desc {
  text-align: center;
  background: #FFFFFF;
}

table .unit {
  background: #FFFFFF;
}

table .qty {
}

table .total {
  background: #57B223;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1em;
}
.header,
.footer {
    width: 100%;
    text-align: center;
    position: fixed;
}
.footer {
    bottom: 0px;
}
.pagenum:after {
    content: counter(page);
}
</style>

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
