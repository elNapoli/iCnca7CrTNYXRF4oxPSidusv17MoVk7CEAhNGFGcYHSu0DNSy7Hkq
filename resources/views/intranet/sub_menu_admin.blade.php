
          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class="fa fa-desktop"></i>
                  <span>Panel de control</span>
              </a>
              <ul class="sub">
                  <!--<li><a  href="{{url('continentes/')}}">Continentes</a></li> se elimina crud por ser una tabla integra del proyecto. se entrega con valores y no se permite modificacion alguna -->
                    <li>
                        <a href="{{ url('paises/') }}">Paises</a>
                    </li>
                    <li>
                        <a href="{{ url('ciudades/') }}">Ciudades</a>
                    </li>
                    <li>
                        <a href="{{ url('universidades/') }}">Universidades</a>
                    </li>

                    <li>
                        <a href="{{ url('departamentos/') }}">Departamentos</a>
                    </li>

                    <li>
                        <a href="{{ url('asistentes/') }}">Asistentes</a>
                    </li>

                    <li>
                        <a href="{{ url('beneficios/') }}">Beneficios universitarios</a>
                    </li>

                    <li>
                        <a href="{{ url('facultades/') }}">Facultades</a>
                    </li>
                    <li>
                        <a href="{{ url('carreras/') }}">Carreras</a>
                    </li>

                    <li>
                        <a href="{{ url('asignaturas/') }}">Asignaturas</a>
                    </li>
                    <li>
                        <a href="{{ url('admin') }}">Usuarios</a>
                    </li>
                  
              </ul>
          </li>

          <li class="menu">
              <a href="{{ url('postulacion/view-admin') }}" >
                  <i class="fa fa-wechat  "></i>
                  <span>Postulantes</span>
              </a>
              
          </li>
          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class="fa fa-book"></i>
                  <span>Documentos</span>
              </a>
              <ul class="sub">
                  <li><a  href="#">item 1</a></li>
                  <li><a  href="#">item 2</a></li>
              </ul>
          </li>
          <li class="menu">
              <a href="{{ url('forum') }}" >
                  <i class="fa fa-wechat  "></i>
                  <span>Foros</span>
              </a>
              
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

          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class=" fa fa-bar-chart-o"></i>
                  <span>Estadísticas</span>
              </a>
              <ul class="sub">
                  <li><a  href="morris.html">Morris</a></li>
                  <li><a  href="chartjs.html">Chartjs</a></li>
              </ul>
          </li>

      </ul>
      <!-- sidebar menu end-->