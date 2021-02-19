@include('template_backend/header')
@include('template_backend/navbar')
@include('template_backend/aside')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if(Auth::guard('admin')->check())
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        @endif
                        @if(Auth::guard('web')->check())
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        @endif
                        <li class="breadcrumb-item active">@yield('sub-breadcrumb')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
</div>

@include('template_backend/footer')
@include('template_backend/javascript')
