
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  	<ol class="carousel-indicators">
   	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
@foreach($noticias as $index => $item)
	  <!-- Indicators -->
	    <li data-target="#carousel-example-generic" data-slide-to="{{$index+1}}"></li>
@endforeach
  	</ol>

					  <!-- Wrapper for slides -->
  	  	<div class="carousel-inner" role="listbox">
    	<div class="item active">
            {!! Html::image('/img/img7.jpg','',array('class'=>'imagenCarrusel')) !!}
      		<div class="carousel-caption">
			 	<h3>Foto 1</h3>
		    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis mollitia explicabo minima obcaecati ut similique, commodi aspernatur rerum quisquam! Ipsa voluptates quo temporibus quod quaerat, repellendus, aspernatur odit. Recusandae, voluptatibus.</p>
      		</div>
	    </div>
	    @foreach($noticias as $index => $item)
	    <div class="item">
            {!! Html::image($item->foto,'',array('class'=>'imagenCarrusel')) !!}
	      
	      	<div class="carousel-caption">
				<a href="internet/noticias-view/{{$item->id}}"><h3>{{$item->titulo}}</h3></a>
		    	<p>{{$item->resumen}}</p>
	      	</div>
	    </div>
	   	@endforeach
  	</div>

	  <!-- Controls -->
  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
  	</a>
  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
  </a>
</div>