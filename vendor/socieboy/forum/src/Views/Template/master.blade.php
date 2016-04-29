@extends($template)
@section($content)



<!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                        <div class="col-lg-3">
                            @include('Forum::Conversations.create')
                        </div>
                        <div class="col-lg-9">
                            
                            <h4 class="mb">@include('Forum::Partials.top-bar')</h4>
                        </div>
                      <div class="form-horizontal style-form">
                          @yield('forum-content')
                                                 
                      </div>
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->



<div class="modal fade" id="create-topic-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Crear categoría</h4>
            </div>

            <form action="{{ route('forum.store-topic') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nombre">Nombre de la categoría</label>
                        <input type="text" name="nombre" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="color" name="color" class="form-control"/>
                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        {{ trans('Forum::messages.cancel') }}
                    </button>

                    <button type="submit"  class="btn btn-success">
                        Crear categoría
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
   

@stop
