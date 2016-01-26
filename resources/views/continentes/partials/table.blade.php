<table id="tableContinente" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                 <th>#</th>
                <th>Position</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Position</th>
            </tr>
        </tfoot>
        <tbody>
	@foreach($continentes as  $item)
	<tr data-id="{{ $item->id }}">

		<td><a href="{{ route('continentes.edit', $item->id)}}">{{$item->id}}</a></td>
		<td>{{$item->nombre}}</td>

	</tr>
	@endforeach	
       </tbody>
    </table>

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#tableContinente').DataTable( {
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        }
		    } );
		} );

	</script>
@endsection