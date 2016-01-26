

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
function format ( d ) {

    var finaln = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr><th>Nombre campus</th><th>Teléfono</th><th>fax</th><th>Sitio web</th><th>Ciudad</th></tr>';
       (d.campus_sedes).forEach(function(entry) {

        finaln =   finaln+
        '<tr>'+
            '<td>'+entry.nombre+'</td>'+
            '<td>'+entry.telefono+'</td>'+
            '<td>'+entry.fax+'</td>'+
            '<td><a href="'+entry.sitio_web+'">'+entry.sitio_web+'</a></td>'+
            '<td> <a href="/ciudades/edit/'+entry.ciudad.id+'">'+entry.ciudad.nombre+'</a></td>'+
        '</tr>';
});
      finaln = finaln+'</table>';
  //      console.log(entry.id);

    return finaln;
}
 
$(document).ready(function() {
    var dt = $('#tableUniversidad').DataTable( {


        "ajax": $('#getUrl').val(),

        "columns": [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": ""
            },
            { "data": "id",
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html("<a href='universidades/edit/"+oData.id+"'>"+oData.id+"</a>");
                }
            },
            { "data": "nombre" }
        ],
        "order": [[1, 'asc']]
    } );
 
    // Array to track the ids of the details displayed rows
    var detailRows = [];

    $('#tableUniversidad tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );

        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
              

            row.child( format( row.data() ) ).show();
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
} );
</script>
@endsection