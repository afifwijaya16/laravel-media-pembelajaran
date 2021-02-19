<div class="header">
    <div class='wrapper'>
        <div class='header-logo'><a href='#'><img style='max-height:50px'
                    src='{{ asset($profil->logo_kecamatan) }}' /></a>
        </div>
        <div class='header-menu'>
            {{-- <ul>
                <li><a href='http://localhost/swarakalibata_8/halaman/detail/tentang-kami-tunggul-news'>Tentang
                        Kami</a></li>
                <li><a href='http://localhost/swarakalibata_8/hubungi'>Hubungi Kami</a></li>
            </ul> --}}
            <ul>
                <li><strong>{{ ucwords(strtolower($profil->nama_kecamatan))  }}</strong></li>
            </ul>
            <ul>
                <li>{{ ucwords(strtolower($profil->alamat_kantor))  }}</li>
            </ul>
        </div>

        <div class='header-addons'>
            <span class='city'>Bandarlampung, <span id='jam'></span></span>
            <div class='header-search'>
                <form action="{{ route('list.search') }}" method="get">
                    <input type='text' placeholder='Pencarian...' name='search' class='search-input' required />
                </form>
            </div>
        </div>
    </div>

    <div class='main-menu sticky'>
        <div class='wrapper'>
            <ul class='the-menu'>
                <li><a href='{{ url('/')}}' style='font-size:20px;'><i class="fa fa-home"></i></a>
                </li>
                <li><a href='#'><span>Selayang Pandang</span></a>
                    <ul>
                        <li>
                            <a href='{{ route('sejarah')}}'><span>Sejarah</span></a>
                        </li>
                        <li>
                            <a href='{{ route('visi_misi')}}'><span>Visi Misi</span></a>
                        </li>
                        <li>
                            <a href='{{ route('wilayah_administrasi')}}'><span>Wilayah Adminisrasi</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href='#'><span>Kategori Berita</span></a>
                    <ul>
                        @foreach ($category_widget as $item)
                        <li>
                            <a href='{{ route('list.category', $item->slug )}}'><span>{{ $item->category }}</span></a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    @if(Auth::guard('web')->check())
                        <a href='{{ route('login')}}'> <i class="fa fa-user"></i> {{Auth::guard('web')->user()->name}} </a> 
                    @else
                        <a href='{{ route('login')}}'> Login </a>
                    @endif
                    
                </li>
            </ul>
        </div>
    </div>
</div>
