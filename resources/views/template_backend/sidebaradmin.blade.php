<li class="nav-item">
    <a href="{{ route('admin.profil.index') }}" class="nav-link {{ request()->is('admin/profil*') ? 'active' : '' }}">
        <i class="fa fa-user nav-icon"></i>
        <p>Profil</p>
    </a>
</li>
<li class="nav-item @if(!empty($dataMaster)) menu-open @endif">
    <a href="#" class="nav-link @if(!empty($dataMaster)) active @endif">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Data Master
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                <i class="fa fa-user nav-icon"></i>
                <p>Siswa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('guru.index') }}" class="nav-link {{ request()->is('admin/guru*') ? 'active' : '' }}">
                <i class="fa fa-user nav-icon"></i>
                <p>Guru</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('kelas.index') }}" class="nav-link {{ request()->is('admin/kelas*') ? 'active' : '' }}">
        <i class="far fa-map nav-icon"></i>
        <p>Kelas</p>
    </a>
</li>