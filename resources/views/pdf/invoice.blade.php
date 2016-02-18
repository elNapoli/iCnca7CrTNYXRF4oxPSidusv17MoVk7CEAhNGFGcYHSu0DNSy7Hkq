<<<<<<< HEAD
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



=======
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<title></title>


<style>
  body {
    font-family: sans-serif;
    font-size: 11px;
  }
  div.transformed {
    border: 1px solid red;
    -webkit-transform-origin: 50% 50%;
    -moz-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
  }
  div.transformed:after {
    content: attr(style);
  }
  
  div.grid {
    border: 1px dotted grey;
    margin: 0;
    padding: 1em;
    margin-bottom: -1px;
  }
</style>

<!--[if IE]>
<script type="text/javascript" src="../cssSandpaper/js/EventHelpers.js"></script>
<script type="text/javascript" src="../cssSandpaper/js/cssQuery-p.js"></script>
<script type="text/javascript" src="../cssSandpaper/js/jcoglan.com/sylvester.js"></script>
<script type="text/javascript" src="../cssSandpaper/js/cssSandpaper.js"></script>

<script type="text/javascript">
  if (!document.documentMode || document.documentMode < 9)
  
  window.onload = function(){
    var nodes = document.querySelectorAll("*[style]");
    
    for (var i = 0; i < nodes.length; i++) {
      var style = nodes[i].getAttribute("style");
      var trans = /-ms-transform\s*:\s*([^;]+)/i.exec(style);
      
      try {
        if (trans && trans[1] !== "none") {
          cssSandpaper.setTransform(nodes[i], trans[1]);
        }
      } catch(e) {}
    }
  }
</script>
<![endif]-->

</head>
<body>

<h3>none</h3>
<div class="grid"><div class="transformed" style="-webkit-transform: none; -moz-transform: none; -ms-transform: none;">&nbsp; </div></div>

<h3>rotate</h3>
<div class="grid"><div class="transformed" style="-webkit-transform: rotate(0.1rad); -moz-transform: rotate(0.1rad); -ms-transform: rotate(0.1rad);">&nbsp; </div></div>

<h3>scale</h3>
<div class="grid"><div class="transformed" style="-webkit-transform: scale(0.5, 1.5); -moz-transform: scale(0.5, 1.5); -ms-transform: scale(0.5, 1.5);">&nbsp; </div></div>
<div class="grid"><div class="transformed" style="-webkit-transform: scale(0.5); -moz-transform: scale(0.5); -ms-transform: scale(0.5);">&nbsp; </div></div>
<div class="grid"><div class="transformed" style="-webkit-transform: scaleX(0.5); -moz-transform: scaleX(0.5); -ms-transform: scaleX(0.5);">&nbsp; </div></div>
<div class="grid"><div class="transformed" style="-webkit-transform: scaleY(0.5); -moz-transform: scaleY(0.5); -ms-transform: scaleY(0.5);">&nbsp; </div></div>

<h3>translate</h3>
<div class="grid"><div class="transformed" style="-webkit-transform: translate(10px, 10px); -moz-transform: translate(10px, 10px); -ms-transform: translate(10px, 10px);">&nbsp; </div></div>
<div class="grid"><div class="transformed" style="-webkit-transform: translate(20px); -moz-transform: translate(20px); -ms-transform: translate(20px);">&nbsp; </div></div>
<div class="grid"><div class="transformed" style="-webkit-transform: translateX(20%); -moz-transform: translateX(20%); -ms-transform: translateX(20%);">&nbsp; </div></div>
<div class="grid"><div class="transformed" style="-webkit-transform: translateY(30%); -moz-transform: translateY(30%); -ms-transform: translateY(30%);">&nbsp; </div></div>

<h3>skew</h3>
<div class="grid"><div class="transformed" style="-webkit-transform: skew(30deg, -4deg); -moz-transform: skew(30deg, -4deg); -ms-transform: skew(30deg, -4deg);">&nbsp; </div></div>
<div class="grid"><div class="transformed" style="-webkit-transform: skew(-4deg); -moz-transform: skew(-4deg); -ms-transform: skew(-4deg);">&nbsp; </div></div>
<div class="grid"><div class="transformed" style="-webkit-transform: skewX(20deg); -moz-transform: skewX(20deg); -ms-transform: skewX(20deg);">&nbsp; </div></div>
<div class="grid"><div class="transformed" style="-webkit-transform: skewY(-4deg); -moz-transform: skewY(-4deg); -ms-transform: skewY(-4deg);">&nbsp; </div></div>

<h3>mixed</h3>
<div class="grid"><div class="transformed" style="-webkit-transform: rotate(10deg) scale(0.5, 1.5); -moz-transform: rotate(10deg) scale(0.5, 1.5); -ms-transform: rotate(10deg) scale(0.5, 1.5);">&nbsp; </div></div>

</body>
</html>
>>>>>>> b52faf2a4842be5d29a865d32500989a213df9cc
