            
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Registro</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    {!!  Form::label('nombre', ' Nombre del campus ');!!}
                    {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Isla Teja'));!!}
                </div>  
                <div class="form-group">

                    {!!  Form::label('telefono', ' Ń° Telefónico ');!!}
                    {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej:+560632222222'));!!}
                </div>  
                <div class="form-group">

                    {!!  Form::label('fax', ' Nombre N° fax ');!!}
                    {!! Form::text('fax',null,array('class' => 'form-control','placeholder'=>'Ej: +560632222222'));!!}
                </div>  
                <div class="form-group">

                    {!!  Form::label('sitio_web', ' sitio web del campus ');!!}
                    {!! Form::text('sitio_web',null,array('class' => 'form-control','placeholder'=>'Ej: www.uach.cl'));!!}
                </div>  

                <div class="form-group">
                    {!!  Form::label('ciudad', ' Nombre de la ciudad ')!!}
                    {!!  Form::select('ciudad', [null=>'Seleccione ciudad'],null,array('class' => 'form-control putaputa'))!!}
                </div>

           
          

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>