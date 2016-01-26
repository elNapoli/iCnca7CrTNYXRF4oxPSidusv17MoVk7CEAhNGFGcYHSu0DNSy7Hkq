

@section('styles')
    {!! Html::Style('plugins/dataTables/css/row_details.css')!!}

@endsection
{!!Form::hidden('getUrl', url('universidades/universidad-campus'),array('id'=>'getUrl'));!!}
<table id="tableUniversidad" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>id</th>
                <th>nombre</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>id</th>
                <th>Nombre de la universidad</th>
            </tr>
        </tfoot>
    </table>

@section('scripts')
<script type="text/javascript">

 
$(document).ready(function() {


    crearTablaUniversidad('#tableUniversidad',$('#getUrl').val());


} );
</script>
@endsection