<li class="nav-item">
    <a href="{{ route('profil') }}" class="nav-link {{ request()->is('profil*') ? 'active' : '' }}">
        <i class="far fa-user nav-icon"></i>
        <p>Profil</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('mapel_user.index') }}" class="nav-link {{ request()->is('mapel-user*') ? 'active' : '' }}">
        <i class="fa fa-file nav-icon"></i>
        <p>Mata Pelajaran</p>
    </a>
</li>