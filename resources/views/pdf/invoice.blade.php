<!DOCTYPE html>
<style type="text/css">
#fecha{
	font:serif;
	text-align: right;
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
</style>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="./style.css" type="text/css" media="all">
</head>
<body>

  <img width="100" style="float: left; padding: 0.5em;" src="https://raw.githubusercontent.com/elNapoli/MonitoreoCurricular/Inicio_Validaciones/Tesis/tesis_documento/images/portada/escudo.png">

  <br>
  <div style="left; width: 55%; background: #1A8202 no-repeat margin-right: 200px; left: 34.4607px; font-size: 18.2353px; color: #fff; font-family: sans-courier; transform: scaleX(0.983209);" data-canvas-width="131.75000000000003">Universidad Austral de Chile
    <br>Dirección de Estudios de Pregrado<br>Unidad de Movilidad Estudiantil<br>Vicerrectoria Academica</div>
    <br>

    <hr style="color: green;">

    <div id="cab">1 - DATOS PERSONALES</div>
    	<div class="datos">

    	<table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="18" class="no">Apellido paterno</th>
            <th colspan="17" class="desc">Apellido1</th>
            <th colspan="18" class="no">Aepllido materno</th>
            <th colspan="17" class="desc">Apellido2</th>
            <th colspan="10" class="no">Nombre</th>
            <th colspan="20" class="desc">nombre1</th>
          </tr>
          <tr>
            <th colspan="22" class="no">Documento Nacional</th>
            <th colspan="22" class="desc">11.111.111-1</th>
            <th colspan="22" class="no">Fecha de Nacimiento</th>
            <th colspan="20" class="desc">{{$date}}</th>
            <th colspan="8" class="no">Edad</th>
            <th colspan="6" class="desc">20</th>
          </tr>
          <tr>
            <th colspan="17" class="no">Direccion actual</th>
            <th colspan="45" class="desc">11.111.111-1</th>
            <th colspan="15" class="no">Ciudad</th>
            <th colspan="23" class="desc">$valor</th>
          </tr>
           <tr>
            <th colspan="17" class="no">Direccion origen</th>
            <th colspan="45" class="desc">11.111.111-1</th>
            <th colspan="15" class="no">Ciudad</th>
            <th colspan="23" class="desc">$valor</th>
          </tr>
          <tr>
            <th colspan="20" class="no">E-mail personal</th>
            <th colspan="30" class="desc">email@"gmail.com</th>
            <th colspan="20" class="no">E-mail institucional</th>
            <th colspan="30" class="desc">email@"uach.cl</th>
          </tr>
          <tr>
            <th colspan="20" class="no">Telefono casa</th>
            <th colspan="30" class="desc">123123123</th>
            <th colspan="20" class="no">Telefono movil</th>
            <th colspan="30" class="desc">1231231231</th>
          </tr> 
          <tr>
            <th colspan="20" class="no">Enfermedades</th>
            <th colspan="45" class="desc">1231231231</th>
            <th colspan="20" class="no">Grupo sanguineo</th>
            <th colspan="15" class="desc">VIH+</th>
          </tr>            
        </tbody>
      </table>
    	</div>
    <div id="cab">1.1 - CONTACTO EN CASO DE EMERGENCIA</div>
<table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="30" class="no">Nombre y parentezco</th>
            <th colspan="70" class="desc">1231231231</th>
          </tr>
          <tr>
            <th colspan="20" class="no">Direccion</th>
            <th colspan="80" class="desc">VIH+</th>
          </tr>              
          <tr>
            <th colspan="15" class="no">E-mail</th>
            <th colspan="35" class="desc">1231231231</th>
            <th colspan="20" class="no">Telefono</th>
            <th colspan="30" class="desc">VIH+</th>
          </tr>
        </tbody>
      </table>
    <div id="cab">2 - ESTUDIOS</div>
<table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="10" class="no">Carrera</th>
            <th colspan="90" class="desc">1231231231</th>
          </tr>
          <tr>
            <th colspan="20" class="no">Ranking</th>
            <th colspan="45" class="desc">bla bla bla...</th>
          	<th colspan="15" class="no">Año ingreso</th>
            <th colspan="20" class="desc">2014</th>
          </tr>
          <tr>
            <th colspan="25" class="no">Director/a de Carrera</th>
            <th colspan="75" class="desc">Director asdasdasdasd+</th>
          </tr>              
          <tr>
            <th colspan="20" class="no">Becas y beneficios vigentes</th>
            <th colspan="80" class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</th>
          </tr>
        </tbody>
      </table>
    <div id="cab">3 - INFORMACION INTERCAMBIO ESTUDIANTIL</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Semestre I</th>
            <th colspan="30" class="desc"></th>
            <th colspan="20" class="no">Semestre II</th>
            <th colspan="30" class="desc"></th>
          </tr>            
        </tbody>
      </table>
    <div id="cab">3.1 - OTRO PERIODO DE INTERCAMBIO</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Desde</th>
            <th colspan="30" class="desc"></th>
            <th colspan="20" class="no">Hasta</th>
            <th colspan="30" class="desc"></th>
          </tr>            
        </tbody>
      </table>      
    <div id="cab">4 - CONVENIO</div>
          <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="25" class="no">Universidad Extranjera</th>
            <th colspan="75" class="desc"></th>
          </tr> 
         <tr>
            <th colspan="25" class="no">Carrera</th>
            <th colspan="75" class="desc"></th>
          </tr> 
          <tr>
            <th colspan="20" class="no">Financiamiento</th>
            <th colspan="40" class="desc"></th>
            <th colspan="20" class="no">Convenio</th>
            <th colspan="20" class="desc"></th>            
          </tr>             
        </tbody>
      </table>  
    <div id="fecha">
        <p class="name"> Fecha: {{ $date }}</p>
	</div>
</body>
</html>



