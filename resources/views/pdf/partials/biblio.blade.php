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
  <div style="left; width: 55%; background: #616214 no-repeat margin-right: 200px; left: 34.4607px; font-size: 18.2353px; color: #fff; font-family: sans-courier; transform: scaleX(0.983209);" data-canvas-width="131.75000000000003">Universidad Austral de Chile
    <br>Dirección de Estudios de Pregrado<br>Unidad de Movilidad Estudiantil<br>Vicerrectoria Academica</div>
    <br>
    <br>
    <hr style="color: #616214;">

    <div id="cab_biblio">DOCUMENTO FINAL DE BIBLIOTECA</div>
    <div id="stmnt_h">
      <p>  El/la estudiante del Programa Especial de Pregrado de Intercambio de la Universidad Austral de 
          Chile, Sr./Srta. <strong>[VARIABLE]</strong>, RUT <strong>[VARIABLE]</strong> se ha presentado en la Biblioteca Central y se encuentra sin ningún tipo de deudas en Biblioteca.</p>

      <p> Cabe destacar que al estudiante mencionado se le 
          desactivará
          el acceso a biblioteca a partir del día 
          de hoy en que ha presentado este documento para la firma
          . </p>
          <br>
          <br>
    </div>
    <div id="cab_biblio">RECORDATORIO</div>
          <div id="stmnt_h">
      <p>  <strong>Estimado/a estudiante</strong>: Este documento debe ser presentado en la oficina de Movilidad Estudiantil al momento de terminar tu intercambio académico en nuestra universidad. El documento debe ser firmado y timbrado por el encargado de Biblioteca. Este documento sólo será firmado en caso de NO tener deudas (NO deber la credencial de cortesía (Celeste), no deber libros, no registrar deudas por atrasos) en biblioteca  Sin la entrega de este documento no se hará entrega del certificado de notas final de la Universidad Austral de Chile.</p>
    </div>
    <div id="cab_biblio">ENCARGADO BIBLIOTECA CENTRAL UACH</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="10" class="no">Firma</th>
            <th colspan="40" class="desc"></th>
            <th colspan="16" class="no"><br><br>Timbre<br><br>&nbsp</th>
            <th colspan="35" class="desc"></th>
          </tr>
        </tbody>
      </table>

<div id="cab_biblio">Lugar: Valdivia - Fecha de emision: {{ $date }} </div>
</body>
<div class="footer">
    Page <span class="pagenum"></span>
  </div>
</html>