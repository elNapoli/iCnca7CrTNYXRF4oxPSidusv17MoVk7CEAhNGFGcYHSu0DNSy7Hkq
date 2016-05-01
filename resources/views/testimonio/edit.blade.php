@extends('intranet.app')

@section('styles')
    {!! Html::Style('plugins/froala/css/froala_editor.min.css')!!}
    {!! Html::Style('plugins/froala/css/froala_style.min.css')!!}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    
    {!! Html::Style('plugins/froala/css/plugins/char_counter.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/code_view.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/colors.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/emoticons.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/file.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/fullscreen.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/image.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/image_manager.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/line_breaker.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/quick_insert.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/table.css')!!}
    {!! Html::Style('plugins/froala/css/plugins/video.css')!!}

@endsection

@section('content')

<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Escriba su testimonio</h4>
            {!! Form::open(['url'=> array('testimonios/update',$id), 'method'=>'get','class'=>'form-horizontal style-form'])!!}
              <div class="form-group">
                <div class="col-lg-12">
                    
                    <textarea id="edit" name="cuerpo">
               {!!

                                   ( html_entity_decode($editor))
                                !!}
                    </textarea>
                </div>
                  
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                    
                    <button type="submit" class="btn-primary btn"> Guardar testimonio</button>
                </div>
                  
              </div>
            
            {!! Form::close()!!}
      </div>
    </div><!-- col-lg-12-->         
</div><!-- /row -->



@endsection


@section('scripts')


    {!! Html::Script('plugins/froala/js/froala_editor.min.js')!!}


    {!! Html::Script('plugins/froala/js/plugins/align.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/char_counter.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/code_beautifier.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/code_view.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/colors.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/emoticons.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/entities.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/file.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/font_family.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/font_size.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/fullscreen.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/image.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/image_manager.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/inline_style.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/line_breaker.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/link.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/lists.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/paragraph_format.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/paragraph_style.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/quick_insert.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/quote.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/table.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/save.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/url.min.js')!!}
    {!! Html::Script('plugins/froala/js/plugins/video.min.js')!!}
     <!-- Initialize the editor. -->


   <script>
  $(document).on('ready',function(){

$('#edit').froalaEditor({

        language: 'es',
        imageDefaultDisplay: 'inline',

        imageManagerDeleteURL: 'destroy-img',
        imageManagerLoadURL: 'img',


        imageUploadURL: 'upload-image/"',
        imageUploadParams: {
          _token: '{{ csrf_token() }}'
        },

      })


    
  });
 </script>

@endsection








