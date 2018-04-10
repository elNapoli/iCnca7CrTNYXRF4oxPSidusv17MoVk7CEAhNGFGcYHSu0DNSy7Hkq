
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


          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class=" fa fa-briefcase "></i>
                  <span>Postulantes</span>
              </a>
              <ul class="sub">
                  <li><a  href="{{ url('postulacion/view-admin') }}">Buscar postulante</a></li>
                  <li><a  href="{{ url('postulacion/nomina') }}">Generar nómina</a></li>
                  <li><a  href="{{ url('testimonios/validacion') }}">Validar testimonios</a></li>
              </ul>
          </li>

          <li class="menu">
              <a href="{{ url('alojamientos/') }}" >
                  <i class="fa fa-home fa-fw"></i>
                  <span>Alojamientos</span>
              </a>
              
          </li>

          <li class="menu">
              <a href="{{ url('noticias/') }}" >
                  <i class="fa fa-list-alt"></i>
                  <span>Noticias</span>
              </a>
          </li>
          <li class="menu">
              <a href="{{ url('forum') }}" >
                  <i class="fa fa-wechat  "></i>
                  <span>Foros</span>
              </a>
              
          </li>


          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class=" ffa fa-bar-chart-o"></i>
                  <span>Estadisticas</span>
              </a>
              <ul class="sub">
                  <li><a  href="{{ url('estadisticas/post-by-geo') }}">Postulantes por geografia</a></li>
                  <li><a  href="{{ url('estadisticas/post-by-study') }}">Postulantes por estudios</a></li>
                  <li><a  href="{{ url('estadisticas/universidades') }}">Universidades</a></li>
                  <li><a  href="{{ url('estadisticas/generar-excel') }}">Generar reporte estadístico</a></li>
              </ul>
          </li>
      </ul>
      <!-- sidebar menu end-->