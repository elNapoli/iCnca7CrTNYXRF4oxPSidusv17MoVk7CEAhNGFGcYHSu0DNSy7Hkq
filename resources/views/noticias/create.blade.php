@extends('intranet.app')

@section('Dashboard') Beneficios @endsection

@section('content')
<div>
{!! Form::open(['url'=>'noticias/store', 'method'=>'POST','class'=>'form-horizontal style-form'])!!}
</div>



<div class="panel panel-default">
                      <div class="message"></div>
	<div class="panel-body">

		@include('noticias.partials.fields')


</div>
</div>

@endsection

@section('styles')
<!-- some CSS styling changes and overrides -->
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

<style>
label {
  background-color: #428bca;
  color: white;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: xx-small;
}


.panel-body{
	background-image:url("http://bgfons.com/upload/newspaper_texture2847.jpg");
}

</style>
  
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


$('#cuerpo_noticia').froalaEditor({

        fullPage: 'true',
        language: 'es',
        imageDefaultDisplay: 'inline',

        imageManagerDeleteURL: 'destroy-img',
        imageManagerLoadURL: 'img',


        imageUploadURL: 'upload-image/"',
        imageUploadParams: {
          _token: '{{ csrf_token() }}'
        },

      })

    })
    </script>

@endsection