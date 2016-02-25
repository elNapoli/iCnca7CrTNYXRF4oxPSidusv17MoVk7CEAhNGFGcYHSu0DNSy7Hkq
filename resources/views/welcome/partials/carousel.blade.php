<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
  	<ol class="carousel-indicators">
   		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
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

	    <div class="item">
            {!! Html::image('/img/img8.jpg','asdfasdf',array('class'=>'imagenCarrusel')) !!}
	      
	      	<div class="carousel-caption">
				<h3>Foto 2</h3>
		    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis mollitia explicabo minima obcaecati ut similique, commodi aspernatur rerum quisquam! Ipsa voluptates quo temporibus quod quaerat, repellendus, aspernatur odit. Recusandae, voluptatibus.</p>
	      	</div>
	    </div>



	    <div class="item">
            {!! Html::image('/img/img10.jpg','asdfasdf',array('class'=>'imagenCarrusel')) !!}
	      
	      	<div class="carousel-caption">
				<h3>Foto 3</h3>
		    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis mollitia explicabo minima obcaecati ut similique, commodi aspernatur rerum quisquam! Ipsa voluptates quo temporibus quod quaerat, repellendus, aspernatur odit. Recusandae, voluptatibus.</p>
	      	</div>
	    </div>

	    <div class="item">
            {!! Html::image('/img/img11.jpg','asdfasdf',array('class'=>'imagenCarrusel')) !!}
	      
	      	<div class="carousel-caption">
				<h3>Foto 4</h3>
		    	<p>Descripción 4</p>
	      	</div>
	    </div>

	    <div class="item">
            {!! Html::image('/img/img12.jpg','asdfasdf',array('class'=>'imagenCarrusel')) !!}
	      
	      	<div class="carousel-caption">
				<h3>Foto 5</h3>
		    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis mollitia explicabo minima obcaecati ut similique, commodi aspernatur rerum quisquam! Ipsa voluptates quo temporibus quod quaerat, repellendus, aspernatur odit. Recusandae, voluptatibus.</p>
	      	</div>
	    </div>

	   
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