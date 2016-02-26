@extends('internet.app')

@section('content')
<div class="row">
    <div class="col-lg-12">


    <div class="reset-form">
        <h1>Cambiar contraseña</h1>
        <div class="message"></div>

        						@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
        <HR width="100%" align="center ">

					<form class="form-horizontal" role="form" method="POST" action="/password/reset">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group ">
            {!! Form::text('email',null,array('class' => 'form-control','id'=>'email','placeholder'=>'E-mail'));!!}

            <i class="glyphicon glyphicon-user"></i>
        </div>
        
        <div class="form-group log-status">
            {!! Form::password('password',array('class' => 'form-control','id'=>'password','placeholder'=>'Contraseña'));!!}

            <i class="glyphicon glyphicon-lock"></i>
        </div>
          
        <div class="form-group log-status">
            {!! Form::password('password_confirmation',array('class' => 'form-control','id'=>'password_confirmation','placeholder'=>'Confirmar Contraseña'));!!}

            <i class="glyphicon glyphicon-lock"></i>
        </div>



						<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">
									Reset Password
								</button>

						</div>



    </div>
    </div>
</div>


@endsection


@section('styles')
    {!! Html::Style('css/style_form_login.css')!!}

@endsection