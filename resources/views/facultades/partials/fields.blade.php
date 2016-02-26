<div class="row">
    <div class="col-md-6">
        <div class="form-group">



            <div class="form-group">
                {!!  Form::label('universidad', ' Universidad ')!!}
                {!!  Form::select('universidad', [null=>'Seleccione una Universidad']+$universidades,null,array('class' => 'continente form-control'))!!}

            </div>


            <div class="form-group">
                {!!  Form::label('campus_sede', ' Campus o Sede')!!}
                {!!  Form::select('campus_sede', [null=>'Seleccione un campus'],null,array('class' => 'continente form-control'))!!}
            </div>



        </div> 
    </div>

    <div class="col-md-6">
        <div class="form-group">

            <div class="form-group">
                {!!  Form::label('nombre', ' Nombre facultad ');!!}
                {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Facultad de ingenieria'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('telefono', ' Telefono ');!!}
                {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej: +5691234567'));!!}
            </div>
                


        </div>
    </div>

</div>