{!! Form::model($declaracion, ['url'=>['declaracion/update'], 'method'=>'put','id'=>'form-postulacion-active']) !!}


@include('postulacion.declaracion.fields')

{!!Form::hidden('postulante',null,array('id'=>'postulante'));!!}


{!!Form::close()!!}
