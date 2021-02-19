<div class="main-sidebar right hidden-xs">
    <div class='ideaboxWeather' id='example1'>
        <h1>Loading....</h1>
    </div>
    <hr>

    <div class="widget">
        <h3>Berita Populer</h3>
        <div class="widget-articles">
            <ul>
                <li>
                    @foreach ($berita_populer as $item)
                <li>
                    <div class='article-photo'><a href='#' class='hover-effect'><img
                                style='width:59px; height:42px;' src='{{ asset($item->gambar)}}' alt='' /></a></div>
                    <div class='article-content'>
                        <h4><a href='#'>{{ $item->judul}}</a></h4>
                        <span class='meta'>
                            <a href='#'><span
                                    class='icon-text'>&#128340;</span>{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                            </a>
                        </span>
                    </div>
                </li>
                @endforeach
                </li>
            </ul>
        </div>
    </div>

    <div class="widget">
        <h3>Kategory Berita</h3>
        <div class="tag-cloud">
            @foreach ($category_widget as $item)
            <a href='{{ route('list.category', $item->slug )}}' class='badge'>{{ $item->category }}</a>
            @endforeach
        </div>
    </div>
    
</div>