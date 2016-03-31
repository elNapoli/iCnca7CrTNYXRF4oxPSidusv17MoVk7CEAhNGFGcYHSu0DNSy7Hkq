@extends('intranet.app')



@section('content')
{!! Form::open(['url'=>'testimonios/debug', 'method'=>'POST','id'=>'form-save'])!!}


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Formulario con ckeditor</div>
 
                    <div class="panel-body">
        
                            <textarea class="ckeditor"  name="editor1" id="editor1" rows="10" cols="80">
                                Este es el textarea que es modificado por la clase ckeditor
                            </textarea>
                   
                    </div>
                </div>
            </div>
        </div>

    <button type="submit"> ajdoasdf</button>
{!!Form::close()!!}

@endsection



@section('scripts')

<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
   

@endsection








