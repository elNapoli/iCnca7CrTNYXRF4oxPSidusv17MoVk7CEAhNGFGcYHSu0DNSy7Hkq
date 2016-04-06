@extends('intranet.app')
    


    @section('scripts')
  <script type="text/javascript">
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Bienvenido {{Auth::user()->name}}',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: ' {{Auth::user()->avatar}}',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 7000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
  </script>

  @endsection