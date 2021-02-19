@include('blogtemplate/header')
@include('blogtemplate/navbar')
<div class="content">
    <div class="wrapper">
        <div class="breaking-news">
            <span class="the-title">Breaking News</span>
            <ul>
                @foreach ($breaking_new as $item)
            <li><a href='{{ route('detail', $item->slug) }}'>{{ $item->judul}}</a></li>
                @endforeach
            </ul>
        </div>
        <center>
        </center>

            @yield('content')

        </div>
    </div>
@include('blogtemplate/footer')