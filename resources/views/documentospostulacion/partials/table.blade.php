<table id="tableDocumentos" class="display compact" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nombre</th>              
                <th>Previsualizar</th>
                <th>Descargar</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Previsualizar</th>
                <th>Descargar</th>
            </tr>
        </tfoot>
        <tbody>
          @if($procedencia == 'NO UACH')
                <tr>
                  <td><strong>FORMULARIO DE POSTULACION</strong></td>
                  <td align="center"><a href="{{ url('pdf/invoice')}}"><img width="40" src="http://icons.iconarchive.com/icons/icons8/windows-8/128/Files-View-File-icon.png"></a></td>
                  <td align="center"><a href="{{ url('pdf/invoice-download')}}"><img width="40" src="http://www.nic.seek/img/doc-dl.png"></a></td>
                </tr>
                <tr>
                  <td><strong>CINDA</strong></td>
                  <td align="center"><a href="{{ url('pdf/cinda')}}"><img width="40" src="http://icons.iconarchive.com/icons/icons8/windows-8/128/Files-View-File-icon.png"></a></td>
                  <td align="center"><a href="{{ url('pdf/cinda-download')}}"><img width="40" src="http://www.nic.seek/img/doc-dl.png"></a></td>
                </tr>
                <tr>
                  <td><strong>BIBLIOTECA</strong></td>
                  <td align="center"><a href="{{ url('pdf/biblio')}}"><img width="40" src="http://icons.iconarchive.com/icons/icons8/windows-8/128/Files-View-File-icon.png"></a></td>
                  <td align="center"><a href="{{ url('pdf/biblio-download')}}"><img width="40" src="http://www.nic.seek/img/doc-dl.png"></a></td>
                </tr>
          @elseif($procedencia == 'UACH')
               <tr>
                  <td><strong>FORMULARIO DE POSTULACION</strong></td>
                  <td align="center"><a href="{{ url('pdf/invoice')}}"><img width="40" src="http://icons.iconarchive.com/icons/icons8/windows-8/128/Files-View-File-icon.png"></a></td>
                  <td align="center"><a href="{{ url('pdf/invoice-download')}}"><img width="40" src="http://www.nic.seek/img/doc-dl.png"></a></td>
                </tr>
                <tr>
                  <td><strong>HOMOLOGACION DE ASIGNATURAS</strong></td>
                  <td align="center"><a href="{{ url('pdf/homologacion')}}"><img width="40" src="http://icons.iconarchive.com/icons/icons8/windows-8/128/Files-View-File-icon.png"></a></td>
                  <td align="center"><a href="{{ url('pdf/homologacion-download')}}"><img width="40" src="http://www.nic.seek/img/doc-dl.png"></a></td>
                </tr>
                <tr>
                  <td><strong>DOCUMENTO ASISTENTE SOCIAL (BENEFICIOS)</strong></td>
                  <td align="center"><a href="{{ url('pdf/asistente')}}"><img width="40" src="http://icons.iconarchive.com/icons/icons8/windows-8/128/Files-View-File-icon.png"></a></td>
                  <td align="center"><a href="{{ url('pdf/asistente-download')}}"><img width="40" src="http://www.nic.seek/img/doc-dl.png"></a></td>
                </tr>
                <tr>
                  <td><strong>CONFIRMACION DE LLEGADA</strong></td>
                  <td align="center"><a href="{{ url('pdf/llegada')}}"><img width="40" src="http://icons.iconarchive.com/icons/icons8/windows-8/128/Files-View-File-icon.png"></a></td>
                  <td align="center"><a href="{{ url('pdf/llegada-download')}}"><img width="40" src="http://www.nic.seek/img/doc-dl.png"></a></td>
                </tr>
                <tr>
                  <td><strong>DATOS DE COONTACTO</strong></td>
                  <td align="center"><a href="{{ url('pdf/contacto')}}"><img width="40" src="http://icons.iconarchive.com/icons/icons8/windows-8/128/Files-View-File-icon.png"></a></td>
                  <td align="center"><a href="{{ url('pdf/contacto-download')}}"><img width="40" src="http://www.nic.seek/img/doc-dl.png"></a></td>
                </tr>
          @endif
       </tbody>
    </table>