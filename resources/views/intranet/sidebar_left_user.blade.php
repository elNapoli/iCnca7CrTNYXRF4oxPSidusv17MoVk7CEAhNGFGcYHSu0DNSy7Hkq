<aside>
  <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
      
          <p class="centered"><a href="profile.html"><img src="{{url('plugins/theme_intranet/img/ui-sam.jpg')}}" class="img-circle" width="60"></a></p>
          <h5 class="centered">{{Auth::user()->name.' '.Auth::user()->apellido_paterno}}</h5>
            
          <li class="mt">
              <a class="active" href="{{ url('/') }}">
                  <i class="fa fa-dashboard"></i>
                  <span>Dashboard</span>
              </a>
          </li>

          <li class="mt">
              <a href="{{ url('postulacion') }}">
                  <i class="fa fa-bookmark "></i>
                  <span>Realizar postulación</span>
              </a>
          </li>
          
          <li class="sub-menu">
              <a href="javascript:;" id="formularios_anexos" >
                  <i class="fa fa-list-alt "></i>
                  <span>Formularios anexos</span>
              </a>
              <ul class="sub" id='ul_form_anexos'>
                <div id="menus_pre_uach" style='display:none'>
                  
                  <li><a  href="{{url('homologacion')}}">Homologación de cursos</a></li>
                  <li><a  href="{{url('representante-uach')}}">Responsables en Chile</a></li>
                  <li><a  href="{{url('confirmacion-llegada')}}">Confirmación de llegada</a></li>
                  <li><a  href="{{url('contacto-en-extranjero')}}" id='link_contacto_extranjero'>Contacto en el extranjero</a></li>

                </div>
                <div id="menus_pre_no_uach" style='display:none'>
                  
                  <li><a  href="{{url('cursos-no-uach')}}">Solicitud de cursos</a></li>
                  <li><a  href="{{url('inscripcion-cursos')}}">Inscripción de cursos</a></li>

                </div>
                  
              </ul>
          </li>


          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class="fa fa-book"></i>
                  <span>Documentos</span>
              </a>
              <ul class="sub">
                  <li><a  href="{{url('docs')}}">Formularios</a></li>
                  <li><a  href="{{url('docs/upload')}}">Subir documentos</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class="fa fa-wechat  "></i>
                  <span>Foros</span>
              </a>
              <ul class="sub">
                  <li><a  href="#">Form item1</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class=" fa fa-briefcase "></i>
                  <span>Anexos</span>
              </a>
              <ul class="sub">
                  <li><a  href="morris.html">item 1</a></li>
                  <li><a  href="chartjs.html">item 2</a></li>
              </ul>
          </li>


      </ul>
      <!-- sidebar menu end-->
  </div>
</aside>