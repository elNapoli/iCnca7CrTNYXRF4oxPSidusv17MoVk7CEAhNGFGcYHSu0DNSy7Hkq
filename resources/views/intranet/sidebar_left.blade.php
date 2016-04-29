<aside>
  <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
      
          <p class="centered"><a href="{{url('profile')}}"><img src="{{url(Auth::user()->avatar)}}" class="img-circle" width="60"></a></p>
          <h5 class="centered">{{Auth::user()->name.' '.Auth::user()->apellido_paterno}}</h5>
            
          <li class="mt">
              <a class="active" href="{{ url('/') }}">
                  <i class="fa fa-dashboard"></i>
                  <span>Dashboard</span>
              </a>
          </li>

        @if(Auth::user()->tipo_usuario == 'administrador')
          @include('intranet.sub_menu_admin')
        @elseif(Auth::user()->tipo_usuario == 'usuario')
          @include('intranet.sub_menu_user')
        @endif
  </div>
</aside>