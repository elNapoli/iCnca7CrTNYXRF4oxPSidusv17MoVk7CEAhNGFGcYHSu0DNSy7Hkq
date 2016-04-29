@extends('intranet.app')



@section('content')
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <div class="form-horizontal style-form" method="get">
                          <div class="form-group">
                            <div class="col-lg-12">
                                
                                {!!

                                    html_entity_decode($editor)
                                !!}
                            </div>
                          </div>
                          <div class="form-group">
                             <div class="col-lg-12">
                                 <a href="{{url('testimonios/edit')}}" class="btn-primary btn"> Editar</a>
                             </div>
                          </div>
                          
                      </div>
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->


@endsection



