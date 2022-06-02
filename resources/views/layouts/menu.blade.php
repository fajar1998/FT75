<ul class="navbar-nav">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
    </li>

    @if (auth()->user()->hak_akses == 1)
        <li class="nav-item">
            <a href="{{ route('listfilm.index') }}" class="nav-link">Film</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kategori.index') }}" class="nav-link">Kategori</a>
        </li>
    @endif

    @if (auth()->user()->hak_akses == 2)
        <li class="nav-item">
            <a href="{{ route('fav.index') }}" class="nav-link">Favorit Saya</a>
        </li>
    @endif

</ul>
