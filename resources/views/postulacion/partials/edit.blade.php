{!! Form::model($postulante, ['url'=>['postulacion/update'], 'method'=>'put','id'=>'form-postulacion-active']) !!}


@include('postulacion.partials.formulario_items.datos_personales')



{!!Form::close()!!}
