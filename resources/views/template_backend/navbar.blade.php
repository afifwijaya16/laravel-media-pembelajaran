<nav class="main-header navbar navbar-expand navbar-dark navbar-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            @if(Auth::guard('admin')->check())
            <a href="{{ route('admin.home') }}" class="nav-link">Home</a>
            @endif
            @if(Auth::guard('web')->check())
            <a href="{{ route('home') }}" class="nav-link">Home</a>
            @endif
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        @if(Auth::guard('admin')->check())
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{Auth::guard('admin')->user()->name}}
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item dropdown-footer" href="{{route('admin.perbaruipassword')}}"> Perbarui Password </a>
                <a class="dropdown-item dropdown-footer" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endif
        @if(Auth::guard('web')->check())
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{Auth::guard('web')->user()->name}}
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item dropdown-footer" href="{{route('user.perbaruipassword')}}"> Perbarui Password </a>
                <a class="dropdown-item dropdown-footer" href="{{ route('user.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

        </li>
        @endif
    </ul>
</nav>
<!-- /.navbar -->
