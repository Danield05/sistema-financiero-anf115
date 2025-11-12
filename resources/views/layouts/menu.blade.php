
<style>
    a.nav-link{
        margin-top: 16px;
    }
    .ag-courses-item_link:hover .esfera {
    -webkit-transform: scale(10);
    -ms-transform: scale(10);
    transform: scale(10);
  }
    .esfera {
    height: 128px;
    width: 128px;
    background-color: #EC0000;

    z-index: 1;
    position: absolute;
    top: -75px;
    right: 180px;

    border-radius: 50%;

    -webkit-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
   }


</style>

<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">

    @if (Route::has('login'))
    @auth
    <a href="{{ url('/home') }}" class="ag-courses-item_link nav-link" style="border-radius:20px" title="Ir a la página de inicio">
                 <div class="esfera"></div>
                 <div class="ag-courses-item_title" style="font-size:15px">
                     <i class=" fas fa-home"  ></i>
                     <span>Inicio</span>
                 </div>
             </a>


       <a  href="{{ route('catalogo.index') }}" class="ag-courses-item_link nav-link"style="border-radius:20px" title="Gestionar el catálogo de cuentas contables">
            <div class="esfera"></div>
            <div class="ag-courses-item_title" style="font-size:15px">
                <i class="fas fa-stream" ></i>
                <span>Catalago de Cuentas</span>
            </div>
        </a>
        
        <a  href="{{ route('periodo.index') }}" class="ag-courses-item_link nav-link" style="border-radius:20px" title="Administrar los períodos contables">
            <div class="esfera"></div>
            <div class="ag-courses-item_title" style="font-size:15px">
                <i class="fas fa-folder-open"  ></i>
                <span>Periodos</span>
            </div>
        </a>

        <a  href="{{ route('horizontal.index') }}" class="ag-courses-item_link nav-link" style="border-radius:20px" title="Realizar análisis financiero horizontal y vertical">
            <div class="esfera"></div>
            <div class="ag-courses-item_title" style="font-size:15px">
                <i class="fas fa-search-dollar" ></i>
                <span>Análisis</span>
            </div>
        </a>

        <a  href="{{ route('ratios.index') }}" class="ag-courses-item_link nav-link" style="border-radius:20px" title="Calcular y analizar ratios financieros">
            <div class="esfera"></div>
            <div class="ag-courses-item_title" style="font-size:15px">
                <i class="fas fa-chart-bar"  ></i>
                <span>Ratios</span>
            </div>
        </a>

        {{-- ! Fase de prueba
            <a  href="{{ route('sector.index') }}" class="ag-courses-item_link nav-link"style="border-radius:20px" >
            <div class="esfera"></div>
            <div class="ag-courses-item_title" style="font-size:15px">
                <i class="fas fa-tags"  ></i>
                <span>Sectores</span>
            </div>
        </a>
        --}}

        @can('ver-empresa')
        {{-- ! Fase de prueba
            <a  href=" {{route('empresa.index')}} " class="ag-courses-item_link nav-link" style="border-radius:20px">
            <div class="esfera"></div>
            <div class="ag-courses-item_title" style="font-size:15px">
                <i class=" fas fa-building"  ></i>
                <span>Empresa</span>
            </div>
        </a>
        --}}
        @endcan

        @can('ver-usuario')
        <a  href=" {{route('usuarios.index')}}" class="ag-courses-item_link nav-link" style="border-radius:20px" title="Administrar usuarios del sistema">
            <div class="esfera"></div>
            <div class="ag-courses-item_title" style="font-size:15px">
                <i class=" fas fa-user" ></i>
                <span>Usuarios</span>
            </div>
        </a>
        @endcan
        @can('ver-rol')
        <a  href=" {{route('roles.index')}} " class="ag-courses-item_link nav-link" style="border-radius:20px" title="Gestionar roles y permisos">
            <div class="esfera"></div>
            <div class="ag-courses-item_title" style="font-size:15px">
                <i class="fas fa-globe"  ></i>
                <span>Roles</span>
            </div>
        </a>
        @endcan
    @else
    <a  href="{{ route('login') }}" class="ag-courses-item_link nav-link" style="border-radius:20px">
            <div class="esfera"></div>
            <div class="ag-courses-item_title" style="font-size:15px">
                <i class=" fas fa-user" ></i>
                <span>Ingresar</span>
            </div>
        </a>

        @if (Route::has('register'))
        <a  href="{{ route('register') }}" class="ag-courses-item_link nav-link" style="border-radius:20px">
                <div class="esfera"></div>
                <div class="ag-courses-item_title" style="font-size:15px">
                    <i class=" fas fa-building"  ></i>
                    <span>Registrarse</span>
                </div>
            </a>
        @endif
    @endauth
    @endif
</li>
