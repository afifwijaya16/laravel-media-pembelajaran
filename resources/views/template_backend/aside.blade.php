 <!-- Main Sidebar Container -->
 <aside class="main-sidebar elevation-4 sidebar-light-warning">
     <!-- Brand Logo -->
    @if(Auth::guard('admin')->check())
        <a href="{{ route('admin.home') }}" class="brand-link navbar-danger">
            <img src="{{ asset('asset/dist/img/AdminLTELogo.png')}}" alt="Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-dark">Media Pembelajaran</span>
        </a> 
    @elseif(Auth::guard('web')->check())
        <a href="{{ route('home') }}" class="brand-link navbar-danger">
            <img src="{{ asset('asset/dist/img/AdminLTELogo.png')}}" alt="Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-dark">Media Pembelajaran</span>
        </a>
    @endif
     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                @if(Auth::guard('admin')->check())
                    @include('template_backend/sidebaradmin')
                @elseif(Auth::guard('web')->check())
                    @include('template_backend/sidebaruser')
                @else 
                <p class="text-success">
                    You Must Login
                </p>
                @endif
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
