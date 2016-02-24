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
  <div style="left; width: 55%; background: #E66F00 no-repeat margin-right: 200px; left: 34.4607px; font-size: 18.2353px; color: #fff; font-family: sans-courier; transform: scaleX(0.983209);" data-canvas-width="131.75000000000003">Universidad Austral de Chile
    <br>Dirección de Estudios de Pregrado<br>Unidad de Movilidad Estudiantil<br>Vicerrectoria Academica</div>
    <br>
    <br>
    <hr style="color: #E66F00;">
    <div id="cab_l">CONFIRMACION DE LLEGADA</div>
  <table border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <th colspan="14" class="no">Institucion</th>
              <th colspan="48" class="desc"></th>
              <th colspan="14" class="no">Departamento</th>
              <th colspan="24" class="desc"></th>
            </tr>
            <tr>
              <th colspan="20" class="no">Nombre encargado</th>
              <th colspan="30" class="desc"></th>
              <th colspan="20" class="no">Teléfono</th>
              <th colspan="30" class="desc"></th>
            </tr>
            <tr>
              <th colspan="14" class="no">E-mail</th>
              <th colspan="86" class="desc"></th>
            </tr>
          </tbody>
        </table>

    <div id="cab_l">POSTULANTE</div>
  <table border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <th colspan="20" class="no">Nombre completo</th>
              <th colspan="80" class="desc"></th>
            </tr>
          </tbody>
        </table>

    <div id="cab_l">ASIGNATURAS EN UNIVERSIDAD DE DESTINO</div>
  <table border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <th colspan="100" class="desc"><br><br>duda acá<br><br><br></th>
            </tr>
          </tbody>
        </table>

    <div id="cab_l">ARRIBO Y REGISTRO</div>
  <table border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <th colspan="40" class="no">Fecha de presentacion a la institucion</th>
              <th colspan="60" class="desc"></th>
            </tr>
            <tr>
              <th colspan="40" class="no">Fecha de inicio de cursos</th>
              <th colspan="60" class="desc"></th>
            </tr>
            <tr>
              <th colspan="40" class="no">Fecha de termino de cursos</th>
              <th colspan="60" class="desc"></th>
            </tr>
         <tr>
             <th colspan="20" class="no">Firma y timbre Facultad</th>
             <th colspan="30" class="desc">
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
              </th>
             <th colspan="20" class="no">Firma y timbre Oficina de intercambio</th>
             <th colspan="30" class="desc">
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
              </th>
          </tr> 
          </tbody>
        </table>

      <div id="cab_l">Fecha de emision: {{ $date }}</div>
</body>
<div class="footer">
    Page <span class="pagenum"></span>
  </div>
</html>