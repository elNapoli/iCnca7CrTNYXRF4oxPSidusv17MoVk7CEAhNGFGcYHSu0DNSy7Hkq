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
    {!! Form::open(['url'=>'testimonios/debug', 'method'=>'POST','id'=>'form-change-password'])!!}


    <textarea id="edit" name="content"></textarea>



<button type="submit"> hola</button>
                        {!! Form::close()!!}


@endsection


@section('scripts')


    {!! Html::Script('plugins/froala/js/froala_editor.min.js')!!}

  <!-- Include Code Mirror. -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>




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

        imageUploadURL: 'upload-image/"',
        //imageDefaultDisplay: 'inline',
        imageManagerLoadURL: 'http://example.com/load_images',
        imageManagerLoadMethod: 'POST',
        imageUploadParams: {
          _token: '{{ csrf_token() }}'
        },

      })


    
  });
 </script>

@endsection








