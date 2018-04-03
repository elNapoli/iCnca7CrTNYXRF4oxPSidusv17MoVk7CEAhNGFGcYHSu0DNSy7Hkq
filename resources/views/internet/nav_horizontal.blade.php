<style type="text/css">

.log a{
    padding: 0px 0px 0px 15px;
    font-size: 1.4em;
    position: absolute;
    right: 60px;
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
            <a href="{{url('/')}}"   >{{trans('welcome.home')}} </a>
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

        </li>
        
        <li class="nivel1">
            <a href="{{url('internet/mision')}}" >{{trans('welcome.aboutUs')}} </a>       
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

              
        </li>

        <li class="nivel1">
            <a href="#!" >{{trans('welcome.students')}}</a>       
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

                <ul>
                    <li><a href="{{url('internet/entrantes')}}">{{trans('welcome.incoming')}}</a></li>
                    <li><a href="{{url('internet/salientes')}}" >{{trans('welcome.salient')}}</a></li>
                    <li><a href="{{url('internet/testimonios')}}"   >{{trans('welcome.testimonials')}}</a></li>

              </ul>


        </li>



        <li class="nivel1">
            <a href="{{url('internet/servicios')}}"   >{{trans('welcome.aditionalService')}}</a>
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}
        </li>
        
        <li class="nivel1">
            <a href="{{url('internet/noticias')}}"   >{{trans('welcome.news')}} </a>
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

        </li>

        <li class="nivel1">
            <a href="{{url('internet/galeria')}}"   >{{trans('welcome.galery')}} </a>
            {!! HTML::image('/plugins/uach/img/pix_menu3.jpg','',array('class'=>'pix_menu3')) !!}

        </li>






    </ul>
        <div class="log">
            <a href="{{url('internet/select-login')}}"  class="btn btn-default btn-ms active " role="button"> {{trans('welcome.signIn')}}    <i class='fa fa-user'></i> </a>
            </div>
</div> 