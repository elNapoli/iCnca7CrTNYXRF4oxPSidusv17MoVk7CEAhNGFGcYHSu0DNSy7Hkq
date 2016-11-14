@extends('internet.app')


@section('content')

<style type="text/css">
 
.hovereffect {
	height: 200px;
	width: 300px;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
}

.hovereffect .overlay {
	height: 200px;
	width: 300px;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
}

.hovereffect:hover img {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feColorMatrix type="matrix" color-interpolation-filters="sRGB" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" /><feGaussianBlur stdDeviation="3" /></filter></svg>#filter');
  filter: grayscale(1) blur(3px);
  -webkit-filter: grayscale(1) blur(3px);
  -webkit-transform: scale(1.2);
  -ms-transform: scale(1.2);
  transform: scale(1.2);
}

.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 17px;
  padding: 10px;
  background: rgba(0, 0, 0, 0.6);
}

.hovereffect a.info {
  display: inline-block;
  text-decoration: none;
  padding: 7px 14px;
  border: 1px solid #fff;
  margin: 50px 0 0 0;
  background: rgba(0, 0, 0, 0.6);
}

.hovereffect a.info:hover {
  box-shadow: 0 0 5px #fff;
}

.hovereffect a.info, .hovereffect h2 {
  -webkit-transform: scale(0.7);
  -ms-transform: scale(0.7);
  transform: scale(0.7);
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
  opacity: 0;
  filter: alpha(opacity=0);
  color: #fff;
  text-transform: uppercase;
}

.hovereffect:hover a.info, .hovereffect:hover h2 {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.img-responsive{
	height: 200px;
	width: 300px;
}

</style>

<div class="col-lg-6">
    <div class="hovereffect">
        <img class="img-responsive" src="http://www.acd.ae/wp-content/uploads/2015/05/students.png" alt="">
        <div class="overlay">
           <h2>Postulante</h2>
           <a class="info" href="{{url('auth/login')}}">Ingresa aquí</a>
        </div>
</div>
</div>

<div class="col-lg-6">
    <div class="hovereffect">
        <img class="img-responsive" src="http://www.chaudharyfincap.com/images/login-admin.png" alt="">
        <div class="overlay">
           <h2>Administrador</h2>
           <a class="info" href="{{url('auth/login')}}">Ingresa aquí</a>
        </div>
</div>
</div>



@endsection

