<div id="top">
    <div id="menu_1">
        <a href="/inicio-uach/contacto">Contacto</a>&nbsp;| 
        <a href="/inicio-uach/mapa">Mapa del Sitio</a> |&nbsp;
        <a href="http://intranet.uach.cl">Intranet</a>
        <li class="dropdown lang">
   				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         			<span class="flag {{session('lang')}}">  </span>
                 	<b class="caret"></b>
       			</a>
          		<ul class="dropdown-menu menu-lang">
          			<li>
          				<a href="#" hreflang="fr" id="changeLang" data-lang="{{session('lang') =='es'? 'en':'es'}}"><span class="flag {{session('lang') =='es'? 'en':'es'}}"></span></a>
          			</li>
      			</ul>
    	</li>

    </div>

</div>

<div id="barra_top">
</div>

<div id="banner_top">
    {!! Html::image('/plugins/uach/img/header.jpg') !!}
</div> 