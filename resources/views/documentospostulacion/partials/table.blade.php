
<div class="row mt">
    <div class="col-lg-8">
        <div class="content-panel">
          <table id="tableDocumentos" class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>Nombre</th>              
                          <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    @if($procedencia == 'NO UACH')
                          <tr>
                            <td><strong>FORMULARIO DE POSTULACION</strong></td>
                            <td align="center">
                                <a href="{{ url('pdf/invoice')}}" class="model-open-edit btn btn-warning btn-xs"><i class="fa  fa-search "></i></a><a href="{{ url('pdf/invoice-download')}}" class="model-open-edit btn btn-success btn-xs"><i class="fa  fa-download  "></i></a></td>
                          </tr>
                          <tr>
                            <td><strong>CINDA</strong></td>
                            <td align="center"><a href="{{ url('pdf/cinda')}}"class="model-open-edit btn btn-warning btn-xs"><i class="fa  fa-search "></i></a><a href="{{ url('pdf/cinda-download')}}" class="model-open-edit btn btn-success btn-xs"><i class="fa  fa-download  "></i></a></td>
                          </tr>


                          <tr>
                            <td><strong>BIBLIOTECA</strong></td>
                            <td align="center"><a href="{{ url('pdf/biblio')}}" class="model-open-edit btn btn-warning btn-xs"><i class="fa  fa-search "></i></a><a href="{{ url('pdf/biblio-download')}}" class="model-open-edit btn btn-success btn-xs"><i class="fa  fa-download  "></i></a></td>
                          </tr>
                    @elseif($procedencia == 'UACH')
                         <tr>
                            <td><strong>FORMULARIO DE POSTULACION</strong></td>
                            <td align="center"><a href="{{ url('pdf/invoice')}}" class="model-open-edit btn btn-warning btn-xs"><i class="fa  fa-search "></i></a><a href="{{ url('pdf/invoice-download')}}" class="model-open-edit btn btn-success btn-xs"><i class="fa  fa-download  "></i></a></td>
                          </tr>
                          <tr>
                            <td><strong>HOMOLOGACION DE ASIGNATURAS</strong></td>
                            <td align="center"><a href="{{ url('pdf/homologacion')}}" class="model-open-edit btn btn-warning btn-xs"><i class="fa  fa-search "></i></a><a href="{{ url('pdf/homologacion-download')}}" class="model-open-edit btn btn-success btn-xs"><i class="fa  fa-download  "></i></a></td>
                          </tr>
                          <tr>
                            <td><strong>DOCUMENTO ASISTENTE SOCIAL (BENEFICIOS)</strong></td>
                            <td align="center"><a href="{{ url('pdf/asistente')}}" class="model-open-edit btn btn-warning btn-xs"><i class="fa  fa-search "></i></a><a href="{{ url('pdf/asistente-download')}}" class="model-open-edit btn btn-success btn-xs"><i class="fa  fa-download  "></i></a></td>
                          </tr>
                          <tr>
                            <td><strong>CONFIRMACION DE LLEGADA</strong></td>
                            <td align="center"><a href="{{ url('pdf/llegada')}}" class="model-open-edit btn btn-warning btn-xs"><i class="fa  fa-search "></i></a><a href="{{ url('pdf/llegada-download')}}" class="model-open-edit btn btn-success btn-xs"><i class="fa  fa-download  "></i></a></td>
                          </tr>
                          <tr>
                            <td><strong>DATOS DE COONTACTO</strong></td>
                            <td align="center"><a href="{{ url('pdf/contacto')}}" class="model-open-edit btn btn-warning btn-xs"><i class="fa  fa-search "></i></a><a href="{{ url('pdf/contacto-download')}}" class="model-open-edit btn btn-success btn-xs"><i class="fa  fa-download  "></i></a></td>
                          </tr>
                    @endif
                 </tbody>
              </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->