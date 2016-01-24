{!! Form::model(Request::all(),['route'=>'admin.usuarios.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}
  <div class="form-group">
	    {!! Form::text('name',null,array('class' => 'form-control','placeholder'=>'Search'));!!}

  </div>
  <button type="submit" class="btn btn-default">Buscar</button>
{!!Form::close()!!}