<style type="text/css">

.log a{
    padding: 0px 0px 0px 15px;
    font-size: 1.4em;
    position: relative;
    left: 60px;
    bottom: 17px;
    font-family: sans-serif;
}

.log i{
    padding: 0px 10px 0px 15px;
    color: white;
}

.log .btn{
    background: grey;

}

#scroll #contenedor #menu_3 a {
    color: white;
    text-decoration: none;
}

    
</style>

<div id="menu_3">
    <ul>        
        <li class="nivel1">
            <a href="{{url('/')}}"   >Portada</a>
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

        </li>
        
        <li class="nivel1">
            <a href="#!" >¿Quiénes somos?</a>       
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

                <ul>
                    <li><a href="{{url('internet/mision')}}">Misión</a>
                    <li><a href="{{url('internet/vision')}}" >Visión</a>
                    </li>
                    <li><a href="{{url('internet/contacto')}}" >Contacto</a>
                    </li>

              </ul>

              
        </li>

        <li class="nivel1">
            <a href="#!" >Estudiantes</a>       
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

                <ul>
                    <li><a href="{{url('internet/mision')}}">Entrantes</a>
                    <li><a href="{{url('internet/vision')}}" >Salientes</a>
                    </li>
                    <li><a href="{{url('internet/testimonios')}}"   >Testimonios</a></li>

              </ul>


        </li>



        <li class="nivel1">
            <a href="{{url('internet/testimonios')}}"   >Servicios estudiantiles</a>
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

        </li>
        
        <li class="nivel1">
            <a href="{{url('internet/noticias')}}"   >Noticias</a>
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

        </li>

        <li class="nivel1">
            <a href="{{url('internet/galeria')}}"   >Galeria</a>
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

        </li>






    </ul>
        <div class="log">
            <a href="{{url('internet/select-login')}}"  class="btn btn-default btn-ms active " role="button"> Ingresar   <i class='fa fa-user'></i> </a>
            </div>
</div> 