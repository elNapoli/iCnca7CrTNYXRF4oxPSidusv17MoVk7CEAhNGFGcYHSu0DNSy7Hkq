@section('styles')
    {!! Html::Style('plugins/dataTables/css/row_details.css')!!}

@endsection
{!!Form::hidden('getUrl', url('universidades/universidad-campus'),array('id'=>'getUrl'));!!}







<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            <table id="tableUniversidad" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>Nombre de la universidad</th>
                        <th>Acción</th>
                    </tr>
                </thead>

            </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
