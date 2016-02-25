{!! Form::open(['url'=>['documentos-identidad/store-and-update'], 'id'=>'form-save-doc-identidad']) !!}
<div id="msg-modal"></div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                {!!  Form::label('tipo', 'Tipo de documento ')!!}
                {!!  Form::select('tipo', [null=>'Seleccione documento','ci'=>'Cédula nacional de identidad','p'=>'Pasaporte'],null,array('class' => 'form-control'))!!}
            </div>
        </div>
        <div class="col-xs-6">
            {!!  Form::label('numero', 'N° Documento');!!}
            <div class="input-group">
            {!! Form::text('numero',null,array('class' => 'form-control','placeholder'=>'Ej: 4450398-9'));!!}
              <span class="input-group-btn">
                <a href="#!" class="btn btn-default" id='add_doc_identidad_by_postulante' type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
              </span>
            </div>


        </div>

    </div>
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
{!!Form::hidden('getUrlDocumentoDestroy', url('documentos-identidad/destroy'),array('id'=>'getUrlDocumentoDestroy'));!!}

{!! Form::close()!!}
<div class="row">
    <div class="col-lg-12">
        <table id="tableDocumentoIdentidad" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                        <th>tipo</th>
                        <th>Número</th>
                        <th>Acción</th>
                </tr>
            </thead>
 
        </table>
    </div>
</div>
