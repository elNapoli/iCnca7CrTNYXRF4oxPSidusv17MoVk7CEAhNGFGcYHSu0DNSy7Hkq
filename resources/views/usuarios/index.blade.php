@extends('layout.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
						Usuarios
				</div>
				@include('partials.success')
				<div class="panel-body">

					@include('usuarios.partials.search')
					<a class="btn-info btn" href="{{ route('admin.usuarios.create')}}">crear Postulante</a>

					@include('usuarios.partials.table')
					{!! $users->appends(Request::only('name'))->render() !!}
				</div>

			</div>

		</div>
	</div>
</div>

{!! Form::open(['route'=>['admin.usuarios.destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}

@endsection

@section('scripts')
<script type="text/javascript">

	$(document).ready(function(){


		$('.btn-delete').click(function(e){

			e.preventDefault();
			var row   = $(this).parents('tr');
			var id    = row.data('id');
			var form  = $('#form-delete');
			var url   =  form.attr('action').replace(':USER_ID',id);
			var data  = form.serialize();

			
			$.post(url,data,function(result){

				alert(result.message);
				row.fadeOut();
			}).fail(function(){
				alert("el usuario no fue elminado");
				row.show();

			});
		});
	});
</script>

@endsection
