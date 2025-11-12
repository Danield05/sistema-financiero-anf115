
@if (Route::has('login'))
@auth
<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars" style="color:#FFFFFF"></i></a></li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">

    @if(\Illuminate\Support\Facades\Auth::user())

        {{-- <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                Ratios
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Analisis</div>
                <a class="dropdown-item has-icon" href="{{route('ratios.index')}}">
                    <i class="fa fa-sync"></i>Ratios empresa
                </a>
                <a class="dropdown-item has-icon" href="">
                    <i class="fa fa-sync"></i>Comparacion de ratios
                </a>
            </div>
        </li> --}}

        {{-- <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                Analisis
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Analisis</div>
                <a class="dropdown-item has-icon" href="{{route('horizontal.index')}}">
                    <i class="fa fa-sync"></i>Analisis horizontal
                </a>
                <a class="dropdown-item has-icon" href="{{route('vertical.index')}}">
                    <i class="fa fa-sync"></i>Analisis vertical
                </a>
            </div>
        </li> --}}

        {{-- <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                Periodo
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Recursos</div>
                <a class="dropdown-item has-icon" href="{{ route('periodo.index') }}">
                    <i class="fa fa-stream"></i>Periodo</a>
            </div>
        </li> --}}
{{-- 
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                Catalogo
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Catalogo</div>
                <a class="dropdown-item has-icon" href="{{ route('catalogo.index') }}">
                    <i class="fa fa-stream"></i>Catalogo cuenta</a>
                <a class="dropdown-item has-icon" href=" {{route('vinculacion.index')}} ">
                    <i class="fa fa-sync"> </i>vinculacion
                </a>
            </div>
        </li> --}}

        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/logo4.png') }}"
                     class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                <div class="d-sm-none d-lg-inline-block">
                    Hola, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    Bienvenido, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                    <i class="fa fa-user"></i>Editar perfil</a>
                <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i
                            class="fa fa-lock"> </i>Cambiar contraseña</a>
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesion
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    @else
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{--                <img alt="image" src="#" class="rounded-circle mr-1">--}}
                <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ __('messages.common.login') }}
                    / {{ __('messages.common.register') }}</div>
                <a href="{{ route('login') }}" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item has-icon">
                    <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
                </a>
            </div>
        </li>
    @endif
</ul>
@else
<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>
@endauth
@endif
