@extends('intranet.app')



@section('content')

<div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">

            {!!

                html_entity_decode($editor)
            !!}
      </div>
    </div><!-- col-lg-12-->         
</div><!-- /row -->

@endsection

@section('scripts')

<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

@endsection


