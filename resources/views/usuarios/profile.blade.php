@extends('intranet.app')

@section('content')

   
    <!-- the avatar markup -->

    <!-- your server code `avatar_upload.php` will receive `$_FILES['avatar']` on form submission -->
     
    <!-- the fileinput plugin initialization -->
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Datos personales</h4>
      
                        {!! Form::model($usuario,['url'=>['update-profile'], 'method'=>'post','class'=>'text-center form-horizontal style-form','enctype'=>'multipart/form-data']) !!}

                          <div class="kv-avatar center-block" style="width:200px; margin-bottom:50px;">
                              <input id="avatar"  name="avatar" type="file" class="file-loading">
                          </div>
                      <div id="kv-avatar-errors" class="center-block" style="display:none"></div>
                            {!!Form::hidden('delImgProfile','false',array('id'=>'delImgProfile'));!!}

                          @include('usuarios.partials.fields')
                        {!! Form::close()!!}
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->

@endsection

@section('styles')
<!-- some CSS styling changes and overrides -->
    {!! Html::Style('plugins/bootstrap-fileinput/css/fileinput.css')!!}

<style>
.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}
</style>
  
@endsection

@section('scripts')

{!! Html::Script('plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js')!!}
    {!! Html::Script('plugins/bootstrap-fileinput/js/fileinput.js')!!}
    {!! Html::Script('plugins/bootstrap-fileinput/js/fileinput_locale_es.js')!!}
    <script>
    $(document).on('ready',function(){

   

        $("#avatar").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showRemove: true,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            language:'es',
            initialPreview:'<img src="{{Auth::user()->avatar}}" alt="Your Avatar" style="width:160px">',
            elErrorContainer: '#kv-avatar-errors',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="avatar.jpg" alt="Your Avatar" style="width:160px">',
            layoutTemplates: {main2: '{preview}  {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"],

        });

        $('.fileinput-remove').on('click',function(){

            $('#delImgProfile').val('true');
        })
    })
    </script>

@endsection
