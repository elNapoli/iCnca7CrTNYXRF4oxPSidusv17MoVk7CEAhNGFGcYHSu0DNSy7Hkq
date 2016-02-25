@extends('layout.unregister.app_un')


		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 40px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>


@section('content')
<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-1" ></div>
				<div class="title" align=middle>
				<img src="http://i2.kym-cdn.com/photos/images/original/000/800/053/6eb.png">
					Genial! has confirmado tu correo, ya puedes ingresar al portal
					<a href="/auth/login">Click aca para Ingresar</a></li>
					

				</div>
			</div>
@endsection