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
  <div style="left; width: 55%; background: #642173 no-repeat margin-right: 200px; left: 34.4607px; font-size: 18.2353px; color: #fff; font-family: sans-courier; transform: scaleX(0.983209);" data-canvas-width="131.75000000000003">Universidad Austral de Chile
    <br>Dirección de Estudios de Pregrado<br>Unidad de Movilidad Estudiantil<br>Vicerrectoria Academica</div>
    <br>
    <br>
    <hr style="color: #642173;">
    <div id="cab_c">CONTACTO EN EL EXTRANJERO</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="20" class="no">Nombre Estudiante</th>
            <th colspan="80" class="desc">{{$p->nombre.' '.$p->apellido_paterno.' '.$p->apellido_materno}}</th>
          </tr>
          <tr>
            <th colspan="10" class="no">Pasaporte</th>
            <th colspan="24" class="desc">
              @foreach($p->documentoIdentidadR as $item)
                @if($item->tipo == 'p')
                  {{$item->numero}}
                @endif
              @endforeach
            </th>
            <th colspan="14" class="no">Dirección</th>
            <th colspan="52" class="desc">{{$p->pregradosR->preUachsR->preURespnsablesR->direccion}}</th>
          </tr>
          <tr>
            <th colspan="10" class="no">Ciudad</th>
            <th colspan="40" class="desc"></th>
            <th colspan="10" class="no">País</th>
            <th colspan="40" class="desc"></th>
          </tr>
          <tr>
            <th colspan="10" class="no">Teléfono</th>
            <th colspan="40" class="desc"></th>
            <th colspan="10" class="no">Celular</th>
            <th colspan="40" class="desc"></th>
          </tr>
          <tr>
            <th colspan="30" class="no">Contacto de algún conocido en el extranjero para casos de emergencia</th>
            <th colspan="70" class="desc"><br><br><br><br></th>
          </tr>
          <tr>
            <th colspan="30" class="no">Nombre seguro internacional</th>
            <th colspan="70" class="desc"></th>
          </tr>
          <tr>
            <th colspan="30" class="no">Número seguro internacional</th>
            <th colspan="70" class="desc"></th>
          </tr>
          <tr>
            <th colspan="30" class="no">Validez exacta del seguro</th>
            <th colspan="70" class="desc"></th>
          </tr>
          <tr>
            <th colspan="30" class="no">Nombre Hospital mas cercano</th>
            <th colspan="70" class="desc"></th>
          </tr>
          <tr>
            <th colspan="30" class="no">Dirección Hospital mas cercano</th>
            <th colspan="70" class="desc"></th>
          </tr>
        </tbody>
      </table>
      <div id="cab_c">CONTACTO EN CHILE</div>
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="30" class="no">Nombre</th>
            <th colspan="70" class="desc"></th>
          </tr>
          <tr>
            <th colspan="15" class="no">Parentesco</th>
            <th colspan="35" class="desc"></th>
            <th colspan="15" class="no">Telefono</th>
            <th colspan="35" class="desc"></th>
          </tr>
        </tbody>
      </table>
            <div id="cab_c">Fecha de emision: {{ $date }}</div>
</body>
<div class="footer">
    Page <span class="pagenum"></span>
  </div>
</html>