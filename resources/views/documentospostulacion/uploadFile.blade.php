@extends('intranet.app')

@section('Dashboard') Departamentos @endsection

@section('content')
<input id="input-706" name="documentosAdjuntos[]" type="file" multiple=true class="file-loading">
 
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}



@endsection
@section('styles')

    {!! Html::Style('plugins/bootstrap-fileinput/css/fileinput.css')!!}

@endsection


@section('scripts')

    {!! Html::Script('plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js')!!}
    {!! Html::Script('plugins/bootstrap-fileinput/js/fileinput.js')!!}
    {!! Html::Script('plugins/bootstrap-fileinput/js/fileinput_locale_es.js')!!}


  <script type="text/javascript">


    $(document).on('ready',function(){
 
// custom footer template for the scenario
// the custom tags are in braces
var footerTemplate = '<div class="file-thumbnail-footer">\n' +
'   <div style="margin:5px 0">\n' +
'       <input class="kv-input kv-new form-control input-sm {TAG_CSS_NEW}" value="{caption}" placeholder="Enter caption...">\n' +
'       <input class="kv-input kv-init form-control input-sm {TAG_CSS_INIT}" value="{TAG_VALUE}" placeholder="Enter caption...">\n' +
'   </div>\n' +
'   {actions}\n' +
'</div>';
 
$('#input-706').fileinput({
    uploadUrl: ' storage-files',
    uploadAsync: false,
    maxFileCount: 5,
     language: 'es',
    allowedFileExtensions:['pdf','jpg','png'],
    overwriteInitial: false,
    layoutTemplates: {footer: footerTemplate},
    previewThumbTags: {
        '{TAG_VALUE}': '',        // no value
        '{TAG_CSS_NEW}': '',      // new thumbnail input
        '{TAG_CSS_INIT}': 'hide'  // hide the initial input
    },
    initialPreview: [
        "<img style='height:160px' src='http://loremflickr.com/200/150/city?random=1'>",
        "<img style='height:160px' src='http://loremflickr.com/200/150/city?random=2'>",
    ],
    initialPreviewConfig: [
        {caption: "City-1.jpg", width: "120px", url: "/site/file-delete", key: 1},
        {caption: "City-2.jpg", width: "120px", url: "/site/file-delete", key: 2}, 
    ],
    initialPreviewThumbTags: [
        {'{TAG_VALUE}': 'City-1.jpg', '{TAG_CSS_NEW}': 'hide', '{TAG_CSS_INIT}': ''},
        {
            '{TAG_VALUE}': function() { // callback example
                return 'City-2.jpg';
            },
            '{TAG_CSS_NEW}': 'hide',
            '{TAG_CSS_INIT}': ''
        }
    ],
    //uploadExtraData:{_token:$('#_token').val()}
    uploadExtraData: function() {  // callback example
        var out = {}, key, i = 0; j = 0;
        $('.kv-input:visible').each(function() {
            $el = $(this);
            if($el.hasClass('kv-new')){

                key  ='new_' + j;
                j++;
            }
            else{
                key  ='init_' + i;
                i++;

            }
            //key = $el.hasClass('kv-new') ? 'new_' + j : 'init_' + i;
            out[key] = $el.val();
        });
        console.log(out);
        out['_token'] = $('#_token').val();
        return out;
    }

    });
    });
  </script>
@endsection