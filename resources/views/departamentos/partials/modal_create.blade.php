<!-- Modal -->
<div class="modal fade" id="modal_crear_departamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Crear Departamento</h4>
            </div>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row" id="boyd-modal">
                                <div id="message-modal-create"></div>
                                {!! Form::open(['url'=>'departamentos/store/', 'method'=>'POST','id'=>'form-save-departamento'])!!}


                                    <div class='col-lg-12'>

    <div class="form-group">


            <div class="form-group">
                {!!  Form::label('pais', ' Pais ')!!}
                {!!  Form::select('pais', [null=>'Seleccione país']+$pais,null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('universidad', ' Universidad')!!}
                {!!  Form::select('universidad', [null=>'Seleccione universidad'],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('campus_sede', ' Campus o Sede')!!}
                {!!  Form::select('campus_sede', [null=>'Seleccione campus o sede'],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('tipo', ' Tipo de departamento ');!!}
                {!!  Form::select('tipo', [null=>'Seleccione tipo de departamento','Movilidad estudiantil'=>'Movilidad Estudiantil','Relaciones internacionales'=>'Relaciones Internacionales'],null,array('class' => 'form-control'))!!}
            </div>


            <div class="form-group">
                {!!  Form::label('sitio_web', ' Sitio web ');!!}
                {!! Form::text('sitio_web',null,array('class' => 'form-control','placeholder'=>'Ej: www.uach.cl'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('nombre_encargado', ' Nombre del encargado ');!!}
                {!! Form::text('nombre_encargado',null,array('class' => 'form-control','placeholder'=>'Ingrese el nombre del encargado'));!!}
            </div>
                
            <div class="form-group">
                {!!  Form::label('telefono', ' Telefono ');!!}
                {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej: +569123456789'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('email', ' E-mail ');!!}
                {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: direccion@uach.cl'));!!}
            </div>
{!!Form::hidden('id','',array('id'=>'id'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('getUrlUniversidadByPais', url('departamentos/universidad-by-pais'),array('id'=>'getUrlUniversidadByPais'));!!}
{!!Form::hidden('getUrlCampusSedeByuniversidad', url('departamentos/campus-sede-by-universidad'),array('id'=>'getUrlCampusSedeByuniversidad'));!!}
        </div>
        </div>
                                {!!Form::close()!!}


          
                                    
                             
                         
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" id="btnCreateDepartamento">Crear departamento</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

