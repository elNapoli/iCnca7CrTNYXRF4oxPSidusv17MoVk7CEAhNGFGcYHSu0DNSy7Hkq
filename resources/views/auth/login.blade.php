@extends('layout.unregister.app_un')

@section('content')

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                    	@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form role="form" method="POST" action="/auth/login">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                       		
                            <fieldset>
                                <div class="form-group">
                                	<input type="email" placeholder="E-mail" class="form-control" name="email" autofocus value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
									<input type="password" placeholder="Password" class="form-control" name="password" value="">

                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recordar datos
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">
									Ingresar
								</button>
								<a href="/password/email">Olvidaste tu contraseña?</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>



					


			

@endsection
