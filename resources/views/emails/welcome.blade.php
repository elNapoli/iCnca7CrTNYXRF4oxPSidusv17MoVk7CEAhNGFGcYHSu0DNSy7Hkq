<h1>Hola, {{ $destinatario }}!</h1>
 
<p>Te damos la bienvenida al sistema de Movilidad Estudiantil UACH. Gracias por registrarte.</p>
<p></p>
<p>Porfavor sigue el siguiente enlace para completar tu proceso de registro.</p>
<p></p>
<p>{{ URL::to('usr/register/verify/' . $codigo) }}</p>
<p></p>
<p>Atte. La administracion.</p>
