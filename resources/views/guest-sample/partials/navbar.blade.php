<nav class="navbar navbar-expand-lg bg-white shadow">
    <div class="container">
        <a class="navbar-brand fw-bold text-info" href="{{ URL::to('/') }}">SPK Maut</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == '' ? 'active' : '' }}"
                        href="{{ URL::to('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'konsultasi' ? 'active' : '' }}"
                        href="{{ URL::to('konsultasi') }}">Konsultasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'tentang' ? 'active' : '' }}"
                        href="{{ URL::to('tentang') }}">Tentang Aplikasi</a>
                </li>
            </ul>
            <form class="d-flex" action="{{ URL::to('login') }}" method="GET">
                <button class="btn btn-info text-white fw-bold" type="submit">
                    <i class="fa-solid fa-arrow-right-to-bracket me-1"></i>
                    LOGIN
                </button>
            </form>
        </div>
    </div>
</nav>
