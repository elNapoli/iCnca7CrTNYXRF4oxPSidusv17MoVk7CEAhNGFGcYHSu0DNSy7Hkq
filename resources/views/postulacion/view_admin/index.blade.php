@extends('intranet.app')



@section('content')

                          
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <div class="row">
                          <div class="col-lg-6">
                              
                              <h4 class="mb"><i class="fa fa-angle-right"></i> Buscar por RUT</h4>

                                  <form class="form-horizontal style-form" method="get">

                                    <div class="form-group">

                                          <div class="col-lg-6">
                                              <input type="text" class="form-control">
                                          </div>
                                          <div class="col-lg-6">
                                            <a href="#" class="btn btn-default">Buscar postulante</a>

                                        </div>
                                      </div> 

                                  </form>
                      
                          </div>
                          <div class="col-lg-offset-4 col-lg-1">
                            <img src="{{url(Auth::user()->avatar)}}" alt="">
                          </div>
                      </div>
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->


<!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Ficha del postulante</h4>
                      <form class="form-horizontal style-form" method="get">
                        <div class="row">
                            <div class="col-lg-8">
                                <div id="accordion">
                                  <h3>Datos personales</h3>
                                  <div>
                                    div 1
                                  </div>
                                  <h3>Estudios actuales</h3>
                                  <div>
                                    div2
                                  </div>
                                  <h3>Información de intercambio</h3>
                                  <div>
                                    div 3
                                  </div>
                                  <h3>Declaración</h3>
                                  <div>
                                   div 4
                                  </div>
                                </div>
                                </div>
                            <div class="col-lg-4">


                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h3 class="panel-title">Documentos adjuntos hasta el momento</h3>
                                  </div>
                                  <div class="panel-body">
                                    Contenido del panel
                                  </div>
                                </div>

                            </div>
                        </div>
             
                      </form>
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->





@endsection

@section('styles')
<!-- some CSS styling changes and overrides -->


@section('scripts')

    <script>
        $(document).on('ready',function(){


            $( "#accordion" ).accordion();


        })

    </script>

@endsection

